<?php
require 'middleware.php';
require '../includes/db.php';
require '../includes/functions.php';
require '../includes/admin_header.php';
require 'sidebar.php';

/*
|--------------------------------------------------------------------------
| Logged In Branch Manager
|--------------------------------------------------------------------------
*/

$stmt = $pdo->prepare("
    SELECT branch_id
    FROM users
    WHERE id=?
");
$stmt->execute([$_SESSION['user_id']]);

$manager = $stmt->fetch();

$branch_id = $manager['branch_id'] ?? 0;

/*
|--------------------------------------------------------------------------
| Expired Members Of This Branch
|--------------------------------------------------------------------------
*/

$stmt = $pdo->prepare("
    SELECT
        m.id AS membership_id,
        u.id AS user_id,
        u.name,
        u.email,
        d.title,
        d.fee
    FROM memberships m

    JOIN users u
        ON m.user_id = u.id

    JOIN designations d
        ON m.designation_id = d.id

    WHERE u.branch_id = ?
    AND m.status = 'expired'

    ORDER BY u.name ASC
");

$stmt->execute([$branch_id]);

$members = $stmt->fetchAll();

/*
|--------------------------------------------------------------------------
| Process Renewal
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verifyToken($_POST['csrf_token'])) {
        die("Invalid CSRF Token");
    }

    $membership_id = (int)$_POST['membership_id'];

    $stmt = $pdo->prepare("
        SELECT
            m.*,
            u.id AS user_id,
            u.branch_id,
            d.fee
        FROM memberships m

        JOIN users u
            ON m.user_id = u.id

        JOIN designations d
            ON m.designation_id = d.id

        WHERE m.id = ?
        LIMIT 1
    ");

    $stmt->execute([$membership_id]);

    $data = $stmt->fetch();

    if ($data && $data['branch_id'] == $branch_id) {

        try {

            $pdo->beginTransaction();

            $amount = $data['fee'];
            $user_id = $data['user_id'];

            /*
            |--------------------------------------------------------------------------
            | Transaction
            |--------------------------------------------------------------------------
            */

            $txn_id = 'TXN' . time();

            $stmt = $pdo->prepare("
                INSERT INTO transactions
                (
                    user_id,
                    type,
                    reference_id,
                    amount,
                    payment_method,
                    status,
                    transaction_id
                )
                VALUES
                (
                    ?,
                    'membership',
                    ?,
                    ?,
                    'cash',
                    'success',
                    ?
                )
            ");

            $stmt->execute([
                $user_id,
                $membership_id,
                $amount,
                $txn_id
            ]);

            /*
            |--------------------------------------------------------------------------
            | Activate Membership
            |--------------------------------------------------------------------------
            */

            $stmt = $pdo->prepare("
                UPDATE memberships
                SET
                    status='active',
                    expiry_date=DATE_ADD(CURDATE(), INTERVAL 1 YEAR)
                WHERE id=?
            ");

            $stmt->execute([$membership_id]);

            /*
            |--------------------------------------------------------------------------
            | Receipt
            |--------------------------------------------------------------------------
            */

            $receipt_no = 'RCPT' . time();

            $stmt = $pdo->prepare("
                INSERT INTO receipts
                (
                    user_id,
                    type,
                    reference_id,
                    receipt_no,
                    qr_code,
                    pdf_path
                )
                VALUES
                (
                    ?,
                    'membership',
                    ?,
                    ?,
                    '',
                    ''
                )
            ");

            $stmt->execute([
                $user_id,
                $membership_id,
                $receipt_no
            ]);

            /*
            |--------------------------------------------------------------------------
            | Log
            |--------------------------------------------------------------------------
            */

            logAdminAction(
                $pdo,
                $_SESSION['user_id'],
                "Branch Membership Renewal | User ID: {$user_id}"
            );

            $pdo->commit();

            echo '
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl mb-6">
                Membership renewed successfully.
            </div>';

        } catch (Exception $e) {

            $pdo->rollBack();

            echo '
            <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl mb-6">
                Error: '.$e->getMessage().'
            </div>';
        }

        /*
        |--------------------------------------------------------------------------
        | Refresh List
        |--------------------------------------------------------------------------
        */

        $stmt = $pdo->prepare("
            SELECT
                m.id AS membership_id,
                u.id AS user_id,
                u.name,
                u.email,
                d.title,
                d.fee
            FROM memberships m

            JOIN users u
                ON m.user_id = u.id

            JOIN designations d
                ON m.designation_id = d.id

            WHERE u.branch_id = ?
            AND m.status='expired'

            ORDER BY u.name ASC
        ");

        $stmt->execute([$branch_id]);

        $members = $stmt->fetchAll();
    }
}
?>

<div class="space-y-6">

    <div class="border-b border-slate-200 pb-5">
        <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
            Membership Desk
        </span>

        <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
            Renew Membership
        </h1>
    </div>

    <div class="max-w-2xl bg-white border border-slate-200 rounded-xl p-6 shadow-sm">

        <form method="POST" class="space-y-5">

            <input
                type="hidden"
                name="csrf_token"
                value="<?php echo generateToken(); ?>"
            >

            <div>

                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    Select Expired Member
                </label>

                <select
                    name="membership_id"
                    required
                    class="w-full border border-slate-200 rounded-lg px-4 py-3"
                >

                    <?php if(empty($members)): ?>

                        <option value="">
                            No expired members found
                        </option>

                    <?php else: ?>

                        <option value="">
                            Select Member
                        </option>

                        <?php foreach($members as $m): ?>

                            <option value="<?= $m['membership_id'] ?>">

                                <?= htmlspecialchars($m['name']) ?>
                                -
                                <?= htmlspecialchars($m['title']) ?>
                                -
                                ₹<?= number_format($m['fee'],2) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>

            </div>

            <button
                type="submit"
                <?php echo empty($members) ? 'disabled' : ''; ?>
                class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-3 rounded-lg text-sm font-medium"
            >
                Renew Membership
            </button>

        </form>

    </div>

</div>

</div>
</div>

<?php require '../includes/footer.php'; ?>