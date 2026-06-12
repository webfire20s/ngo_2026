<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';


$id = (int)($_GET['id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT *
    FROM branches
    WHERE id=?
");
$stmt->execute([$id]);

$branch = $stmt->fetch();

if(!$branch){
    echo "<div class='p-6'>Branch not found.</div>";
    require '../includes/footer.php';
    exit;
}

/* UPDATE */
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $branch_name = trim($_POST['branch_name']);
    $branch_code = trim($_POST['branch_code']);

    $state    = trim($_POST['state']);
    $district = trim($_POST['district']);
    $city     = trim($_POST['city']);

    $address  = trim($_POST['address']);

    $phone    = trim($_POST['phone']);
    $email    = trim($_POST['email']);

    $status   = $_POST['status'];

    $stmt = $pdo->prepare("
        UPDATE branches
        SET
            branch_name=?,
            branch_code=?,
            state=?,
            district=?,
            city=?,
            address=?,
            phone=?,
            email=?,
            status=?
        WHERE id=?
    ");

    $stmt->execute([
        $branch_name,
        $branch_code,
        $state,
        $district,
        $city,
        $address,
        $phone,
        $email,
        $status,
        $id
    ]);

    header("Location: branches.php");
    exit;
}
require '../includes/admin_header.php';
require '../includes/sidebar.php';  
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
            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">Edit Branch</h1>
        </div>
        <div>
            <a href="branches.php" class="text-xs font-bold tracking-wide uppercase text-slate-500 hover:text-slate-900 transition-colors">
                ← Return to Registry
            </a>
        </div>
    </header>

    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden p-6 sm:p-8">
        <form method="POST" class="space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Branch Name *
                    </label>
                    <input type="text" 
                           name="branch_name" 
                           required 
                           value="<?= htmlspecialchars($branch['branch_name']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Branch Code *
                    </label>
                    <input type="text" 
                           name="branch_code" 
                           required 
                           value="<?= htmlspecialchars($branch['branch_code']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono text-slate-700 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        State
                    </label>
                    <input type="text" 
                           name="state" 
                           value="<?= htmlspecialchars($branch['state']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        District
                    </label>
                    <input type="text" 
                           name="district" 
                           value="<?= htmlspecialchars($branch['district']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        City
                    </label>
                    <input type="text" 
                           name="city" 
                           value="<?= htmlspecialchars($branch['city']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Phone Matrix
                    </label>
                    <input type="text" 
                           name="phone" 
                           value="<?= htmlspecialchars($branch['phone']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono text-slate-700 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Email Address
                    </label>
                    <input type="email" 
                           name="email" 
                           value="<?= htmlspecialchars($branch['email']) ?>"
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Complete Mailing Address
                </label>
                <textarea name="address" 
                          rows="4" 
                          class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-normal text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75 leading-relaxed resize-y"><?= htmlspecialchars($branch['address']) ?></textarea>
            </div>

            <div class="pt-2">
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Operational Status State
                </label>
                <div class="relative">
                    <select name="status" 
                            class="w-full sm:w-64 bg-slate-50/50 border border-slate-200 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all appearance-none cursor-pointer">
                        <option value="active" <?= $branch['status']=='active' ? 'selected' : '' ?>>Active</option>
                        <option value="inactive" <?= $branch['status']=='inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="branches.php" 
                   class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors whitespace-nowrap">
                    Cancel Updates
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors border border-slate-900 shadow-sm whitespace-nowrap">
                    Update Branch Registry
                </button>
            </div>

        </form>
    </div>

</div>

</div> </div> <?php require '../includes/footer.php'; ?>