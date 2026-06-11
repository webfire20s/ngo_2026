<?php
require 'middleware.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require 'sidebar.php';

/* GET BRANCH ID OF LOGGED IN MANAGER */
$stmt = $pdo->prepare("
    SELECT branch_id
    FROM users
    WHERE id=?
");

$stmt->execute([$_SESSION['user_id']]);

$user = $stmt->fetch();

$branch_id = $user['branch_id'] ?? 0;

/* SAVE */
if($_SERVER['REQUEST_METHOD']=='POST'){

    $category = trim($_POST['category']);
    $amount = (float)$_POST['amount'];
    $expense_date = $_POST['expense_date'];
    $description = trim($_POST['description']);

    $stmt = $pdo->prepare("
        INSERT INTO expenses
        (
            branch_id,
            category,
            amount,
            expense_date,
            description
        )
        VALUES
        (
            ?, ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $branch_id,
        $category,
        $amount,
        $expense_date,
        $description
    ]);

    header("Location: expenses.php");
    exit;
}
?>

<div class="space-y-6">

    <div class="border-b border-slate-200 pb-5">

        <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
            Financial Management
        </span>

        <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
            Add Expense
        </h1>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6">

        <form method="POST" class="space-y-6">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    Category
                </label>

                <input type="text"
                       name="category"
                       required
                       class="w-full border border-slate-200 rounded-lg px-4 py-3">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    Amount
                </label>

                <input type="number"
                       step="0.01"
                       name="amount"
                       required
                       class="w-full border border-slate-200 rounded-lg px-4 py-3">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    Expense Date
                </label>

                <input type="date"
                       name="expense_date"
                       value="<?= date('Y-m-d') ?>"
                       required
                       class="w-full border border-slate-200 rounded-lg px-4 py-3">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full border border-slate-200 rounded-lg px-4 py-3"></textarea>
            </div>

            <div class="pt-4 border-t border-slate-100">

                <button type="submit"
                        class="bg-slate-900 hover:bg-slate-800 text-white px-6 py-3 rounded-lg">
                    Save Expense
                </button>

            </div>

        </form>

    </div>

</div>

</div>
</div>

<?php require '../includes/footer.php'; ?>