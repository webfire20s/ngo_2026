<?php
require 'middleware.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require 'sidebar.php';

/* GET BRANCH ID */
$stmt = $pdo->prepare("
    SELECT branch_id
    FROM users
    WHERE id=?
");

$stmt->execute([$_SESSION['user_id']]);

$user = $stmt->fetch();

$branch_id = $user['branch_id'] ?? 0;

/* FETCH BRANCH EXPENSES */
$stmt = $pdo->prepare("
    SELECT *
    FROM expenses
    WHERE branch_id=?
    ORDER BY id DESC
");

$stmt->execute([$branch_id]);

$expenses = $stmt->fetchAll();

/* TOTAL */
$stmt = $pdo->prepare("
    SELECT COALESCE(SUM(amount),0)
    FROM expenses
    WHERE branch_id=?
");

$stmt->execute([$branch_id]);

$total_expense = $stmt->fetchColumn();
?>

<div class="space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center border-b border-slate-200 pb-5">

        <div>
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
                Financial Management
            </span>

            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
                Branch Expenses
            </h1>

            <p class="text-sm text-slate-500 mt-2">
                Total Expense:
                ₹<?= number_format($total_expense,2) ?>
            </p>
        </div>

        <a href="add_expense.php"
           class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-3 rounded-lg text-sm font-medium transition">
            + Add Expense
        </a>

    </div>

    <!-- Expense Table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>
                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Category
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Amount
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Date
                        </th>

                        <th class="px-6 py-3 text-left text-xs uppercase">
                            Description
                        </th>
                    </tr>

                </thead>

                <tbody>

                <?php if(empty($expenses)): ?>

                    <tr>
                        <td colspan="4"
                            class="px-6 py-8 text-center text-slate-400">
                            No expenses found.
                        </td>
                    </tr>

                <?php else: ?>

                    <?php foreach($expenses as $e): ?>

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4">

                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                <?= htmlspecialchars($e['category']) ?>
                            </span>

                        </td>

                        <td class="px-6 py-4 font-semibold text-rose-600">
                            ₹<?= number_format($e['amount'],2) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= date('d M Y', strtotime($e['expense_date'])) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= htmlspecialchars($e['description']) ?>
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