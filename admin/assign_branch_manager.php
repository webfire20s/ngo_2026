<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require '../includes/sidebar.php';


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$branch_id = (int)($_GET['branch_id'] ?? 0);

if ($branch_id <= 0) {
    $_SESSION['error'] = "Invalid branch.";
    header("Location: branches.php");
    exit;
}

/* ==========================
   FETCH BRANCH
========================== */
$stmt = $pdo->prepare("
    SELECT *
    FROM branches
    WHERE id = ?
    LIMIT 1
");
$stmt->execute([$branch_id]);
$branch = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$branch) {
    $_SESSION['error'] = "Branch not found.";
    header("Location: branches.php");
    exit;
}

/* ==========================
   CURRENT MANAGER
========================== */
$stmt = $pdo->prepare("
    SELECT id,name,email,phone
    FROM users
    WHERE branch_id = ?
    AND role = 'branch_manager'
    LIMIT 1
");
$stmt->execute([$branch_id]);
$currentManager = $stmt->fetch(PDO::FETCH_ASSOC);

/* ==========================
   BRANCH USERS
========================== */
$stmt = $pdo->prepare("
    SELECT
        id,
        name,
        email,
        phone,
        role
    FROM users
    WHERE branch_id = ?
    AND role IN ('member','branch_manager')
    ORDER BY name ASC
");
$stmt->execute([$branch_id]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$success = "";
$error = "";

/* ==========================
   ASSIGN MANAGER
========================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $manager_id = (int)($_POST['manager_id'] ?? 0);

    if ($manager_id <= 0) {
        $error = "Please select a manager.";
    } else {

        $stmt = $pdo->prepare("
            SELECT id
            FROM users
            WHERE id = ?
            AND branch_id = ?
            LIMIT 1
        ");
        $stmt->execute([$manager_id, $branch_id]);

        if (!$stmt->fetch()) {

            $error = "Invalid user selected.";

        } else {

            try {

                $pdo->beginTransaction();

                // Demote existing manager
                $stmt = $pdo->prepare("
                    UPDATE users
                    SET role = 'member'
                    WHERE branch_id = ?
                    AND role = 'branch_manager'
                ");
                $stmt->execute([$branch_id]);

                // Promote selected user
                $stmt = $pdo->prepare("
                    UPDATE users
                    SET role = 'branch_manager'
                    WHERE id = ?
                ");
                $stmt->execute([$manager_id]);

                $pdo->commit();

                $success = "Branch manager updated successfully.";

                // Reload current manager
                $stmt = $pdo->prepare("
                    SELECT id,name,email,phone
                    FROM users
                    WHERE branch_id = ?
                    AND role = 'branch_manager'
                    LIMIT 1
                ");
                $stmt->execute([$branch_id]);
                $currentManager = $stmt->fetch(PDO::FETCH_ASSOC);

                // Reload user list
                $stmt = $pdo->prepare("
                    SELECT
                        id,
                        name,
                        email,
                        phone,
                        role
                    FROM users
                    WHERE branch_id = ?
                    AND role IN ('member','branch_manager')
                    ORDER BY name ASC
                ");
                $stmt->execute([$branch_id]);
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (Exception $e) {

                $pdo->rollBack();
                $error = "Something went wrong while assigning manager.";
            }
        }
    }
}
?>

<?php 
// Assuming required architecture layout headers are included above the snippet context:
// require '../includes/middleware_admin.php';
// require '../includes/db.php';
// require '../includes/admin_header.php';
// require '../includes/sidebar.php';
?>

<div class="max-w-4xl space-y-6">

    <header class="pb-5 border-b border-slate-200 flex items-end justify-between gap-4">
        <div>
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Operational Distribution</span>
            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">Assign Branch Manager</h1>
            <p class="text-slate-500 text-sm mt-1">
                <?= htmlspecialchars($branch['branch_name']) ?>
                <?php if(!empty($branch['branch_code'])): ?>
                    <span class="font-mono text-xs bg-slate-100 text-slate-600 px-1.5 py-0.5 rounded ml-1">(<?= htmlspecialchars($branch['branch_code']) ?>)</span>
                <?php endif; ?>
            </p>
        </div>
        <div>
            <a href="branches.php" class="text-xs font-bold tracking-wide uppercase text-slate-500 hover:text-slate-900 transition-colors">
                ← Return to Registry
            </a>
        </div>
    </header>

    <?php if (!empty($success)): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium flex items-center gap-2 shadow-sm animate-fade-in">
            <span class="text-base">✓</span> <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm font-medium flex items-center gap-2 shadow-sm animate-fade-in">
            <span class="text-base">✕</span> <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden p-6 sm:p-8">
        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400 pb-3 border-b border-slate-100 mb-5">
            Current Assignment Status
        </h2>

        <?php if ($currentManager): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-slate-50/50 border border-slate-100 rounded-xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Full Legal Name</p>
                    <p class="font-semibold text-slate-900 text-sm">
                        <?= htmlspecialchars($currentManager['name']) ?>
                    </p>
                </div>

                <div class="bg-slate-50/50 border border-slate-100 rounded-xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Email Address Reference</p>
                    <p class="font-mono text-xs text-slate-600 mt-0.5 truncate">
                        <?= htmlspecialchars($currentManager['email']) ?>
                    </p>
                </div>

                <div class="bg-slate-50/50 border border-slate-100 rounded-xl p-4">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1">Telephony Connection Point</p>
                    <p class="font-mono text-xs text-slate-600 mt-0.5">
                        <?= htmlspecialchars($currentManager['phone']) ?>
                    </p>
                </div>
            </div>
        <?php else: ?>
            <div class="inline-flex items-center gap-2 px-4 py-3 rounded-xl bg-amber-50 text-amber-800 border border-amber-200/60 text-sm font-medium">
                <span class="text-base leading-none">!</span> No regional operational leader assigned to this node location.
            </div>
        <?php endif; ?>
    </div>

    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden p-6 sm:p-8">
        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400 pb-3 border-b border-slate-100 mb-5">
            Modify Regional Leadership Assignment
        </h2>

        <form method="POST" class="space-y-6 m-0">

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Select Target Administrator Account
                </label>
                <div class="relative">
                    <select name="manager_id" 
                            required 
                            class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all appearance-none cursor-pointer">
                        <option value="">-- Select Branch User --</option>

                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user['id'] ?>" 
                                    <?= ($currentManager && $currentManager['id'] == $user['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($user['name']) ?> 
                                (<?= htmlspecialchars($user['email']) ?>)
                                <?php if($user['role'] === 'branch_manager'): ?>
                                    [Active Manager]
                                <?php endif; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="branches.php" 
                   class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors whitespace-nowrap">
                    Cancel Allocation
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors border border-slate-900 shadow-sm whitespace-nowrap">
                    Commit Assignment
                </button>
            </div>

        </form>
    </div>

</div>

</div> </div> <?php require '../includes/footer.php'; ?>