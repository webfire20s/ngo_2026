<?php
require 'middleware.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require 'sidebar.php';

/* GET BRANCH */
$stmt = $pdo->prepare("
    SELECT branch_id
    FROM users
    WHERE id=?
");

$stmt->execute([$_SESSION['user_id']]);

$user = $stmt->fetch();

$branch_id = $user['branch_id'] ?? 0;

/* COLLECTIONS */
$stmt = $pdo->prepare("
    SELECT
        t.id,
        t.transaction_id,
        t.amount,
        t.payment_method,
        t.status,
        t.created_at,
        u.name
    FROM transactions t

    JOIN users u
        ON t.user_id = u.id

    WHERE u.branch_id = ?

    ORDER BY t.id DESC
");

$stmt->execute([$branch_id]);

$collections = $stmt->fetchAll();

/* TOTAL COLLECTION */
$stmt = $pdo->prepare("
    SELECT COALESCE(SUM(t.amount),0)
    FROM transactions t

    JOIN users u
        ON t.user_id=u.id

    WHERE u.branch_id=?
    AND t.status='success'
");

$stmt->execute([$branch_id]);

$total_collection = $stmt->fetchColumn();
?>

<div class="space-y-6">

    <div class="border-b border-slate-200 pb-5">

        <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
            Financial Management
        </span>

        <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
            Branch Collections
        </h1>

        <p class="text-sm text-slate-500 mt-2">
            Total Collection:
            ₹<?= number_format($total_collection,2) ?>
        </p>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>
                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Member
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Transaction
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Amount
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Method
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Status
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Date
                        </th>
                    </tr>

                </thead>

                <tbody>

                <?php if(empty($collections)): ?>

                    <tr>
                        <td colspan="6"
                            class="px-6 py-8 text-center text-slate-400">
                            No collections found.
                        </td>
                    </tr>

                <?php else: ?>

                    <?php foreach($collections as $c): ?>

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4 font-medium">
                            <?= htmlspecialchars($c['name']) ?>
                        </td>

                        <td class="px-6 py-4 font-mono text-xs">
                            <?= htmlspecialchars($c['transaction_id']) ?>
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            ₹<?= number_format($c['amount'],2) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= strtoupper($c['payment_method']) ?>
                        </td>

                        <td class="px-6 py-4">

                            <?php if($c['status']=='success'): ?>

                                <span class="text-green-600 font-semibold">
                                    Success
                                </span>

                            <?php elseif($c['status']=='pending'): ?>

                                <span class="text-amber-600 font-semibold">
                                    Pending
                                </span>

                            <?php else: ?>

                                <span class="text-red-600 font-semibold">
                                    Failed
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="px-6 py-4">
                            <?= date('d M Y', strtotime($c['created_at'])) ?>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>
</div>

<?php require '../includes/footer.php'; ?>