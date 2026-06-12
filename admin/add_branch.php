<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $stmt = $pdo->prepare("
        INSERT INTO branches
        (
            branch_name,
            branch_code,
            state,
            district,
            city,
            address,
            phone,
            email,
            status
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $_POST['branch_name'],
        $_POST['branch_code'],
        $_POST['state'],
        $_POST['district'],
        $_POST['city'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['status']
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
            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">Add Branch</h1>
            <p class="text-slate-500 text-sm mt-1">Initialize and index a new geographic node into the organizational system layout.</p>
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
                           placeholder="e.g., Headquarters Base" 
                           required 
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Branch Code *
                    </label>
                    <input type="text" 
                           name="branch_code" 
                           placeholder="e.g., BR-01" 
                           required 
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
                           placeholder="State" 
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        District
                    </label>
                    <input type="text" 
                           name="district" 
                           placeholder="District" 
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        City
                    </label>
                    <input type="text" 
                           name="city" 
                           placeholder="City" 
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Complete Mailing Address
                </label>
                <textarea name="address" 
                          rows="4" 
                          placeholder="Provide the physical street location information..." 
                          class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-3 text-sm font-normal text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75 leading-relaxed resize-y"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Phone 
                    </label>
                    <input type="text" 
                           name="phone" 
                           placeholder="+91 xxxxxxxxx" 
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-mono text-slate-700 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                        Email Address
                    </label>
                    <input type="email" 
                           name="email" 
                           placeholder="branch@organization.org" 
                           class="w-full bg-slate-50/50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-slate-400 focus:bg-white transition-all duration-75">
                </div>
            </div>

            <div class="pt-2">
                <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Initial Operational Status State
                </label>
                <div class="relative">
                    <select name="status" 
                            class="w-full sm:w-64 bg-slate-50/50 border border-slate-200 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-800 focus:outline-none focus:border-slate-400 focus:bg-white transition-all appearance-none cursor-pointer">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="branches.php" 
                   class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors whitespace-nowrap">
                    Discard Entry
                </a>
                <button type="submit" 
                        class="w-full sm:w-auto inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold tracking-wide uppercase px-6 py-3 rounded-lg transition-colors border border-slate-900 shadow-sm whitespace-nowrap">
                    Save Branch Entry
                </button>
            </div>

        </form>
    </div>

</div>

</div> </div> <?php require '../includes/footer.php'; ?>