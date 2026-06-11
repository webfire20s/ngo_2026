<?php
require 'middleware.php';
require '../includes/db.php';

/* CURRENT BRANCH MANAGER */
$stmt = $pdo->prepare("
    SELECT branch_id,name
    FROM users
    WHERE id=?
");

$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$branch_id = $user['branch_id'];

/* BRANCH DETAILS */
$stmt = $pdo->prepare("
    SELECT *
    FROM branches
    WHERE id=?
");

$stmt->execute([$branch_id]);
$branch = $stmt->fetch();

/* TOTAL MEMBERS */
$stmt = $pdo->prepare("
    SELECT COUNT(*) 
    FROM users
    WHERE branch_id=?
    AND role='member'
");

$stmt->execute([$branch_id]);
$total_members = $stmt->fetchColumn();

/* ACTIVE MEMBERSHIPS */
$stmt = $pdo->prepare("
    SELECT COUNT(*)
    FROM memberships m
    JOIN users u ON m.user_id=u.id
    WHERE u.branch_id=?
    AND m.status='active'
");

$stmt->execute([$branch_id]);
$active_members = $stmt->fetchColumn();

/* BRANCH EXPENSES */
$stmt = $pdo->prepare("
    SELECT COALESCE(SUM(amount),0)
    FROM expenses
    WHERE branch_id=?
");

$stmt->execute([$branch_id]);
$total_expense = $stmt->fetchColumn();

/* BRANCH COLLECTION */
$stmt = $pdo->prepare("
    SELECT COALESCE(SUM(t.amount),0)
    FROM transactions t
    JOIN users u ON t.user_id=u.id
    WHERE u.branch_id=?
    AND t.status='success'
");

$stmt->execute([$branch_id]);
$total_collection = $stmt->fetchColumn();
require '../includes/admin_header.php';
require 'sidebar.php';
?>

<div class="space-y-6">

    <!-- Header -->
    <header class="border-b border-slate-200 pb-5">
        <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
            Branch Management
        </span>

        <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
            <?= htmlspecialchars($branch['branch_name']) ?>
        </h1>

        <p class="text-sm text-slate-500 mt-2">
            Branch Dashboard Overview
        </p>
    </header>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-slate-400">
                Total Members
            </p>

            <h2 class="text-3xl font-bold text-slate-900 mt-3">
                <?= $total_members ?>
            </h2>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-slate-400">
                Active Memberships
            </p>

            <h2 class="text-3xl font-bold text-emerald-600 mt-3">
                <?= $active_members ?>
            </h2>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-slate-400">
                Total Collections
            </p>

            <h2 class="text-3xl font-bold text-blue-600 mt-3">
                ₹<?= number_format($total_collection,2) ?>
            </h2>
        </div>

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <p class="text-xs uppercase tracking-wider text-slate-400">
                Total Expenses
            </p>

            <h2 class="text-3xl font-bold text-rose-600 mt-3">
                ₹<?= number_format($total_expense,2) ?>
            </h2>
        </div>

    </div>

    <!-- Branch Details -->
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

        <div class="px-6 py-4 border-b border-slate-100">
            <h3 class="font-semibold text-slate-900">
                Branch Information
            </h3>
        </div>

        <div class="grid md:grid-cols-2 gap-6 p-6">

            <div>
                <p class="text-xs text-slate-400 uppercase mb-1">
                    Branch Code
                </p>

                <p class="font-medium">
                    <?= htmlspecialchars($branch['branch_code']) ?>
                </p>
            </div>

            <div>
                <p class="text-xs text-slate-400 uppercase mb-1">
                    Status
                </p>

                <p class="font-medium">
                    <?= ucfirst($branch['status']) ?>
                </p>
            </div>

            <div>
                <p class="text-xs text-slate-400 uppercase mb-1">
                    Location
                </p>

                <p class="font-medium">
                    <?= htmlspecialchars($branch['city']) ?>,
                    <?= htmlspecialchars($branch['district']) ?>
                </p>
            </div>

            <div>
                <p class="text-xs text-slate-400 uppercase mb-1">
                    Contact
                </p>

                <p class="font-medium">
                    <?= htmlspecialchars($branch['phone']) ?>
                </p>
            </div>

        </div>

    </div>

</div>

</div>
</div>

<?php require '../includes/footer.php'; ?>

