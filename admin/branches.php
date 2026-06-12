<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require '../includes/sidebar.php';

$stmt = $pdo->query("
    SELECT
        b.*,

        COUNT(DISTINCT u.id) AS total_members,

        COUNT(DISTINCT CASE
            WHEN m.status='active'
            THEN u.id
        END) AS active_members,

        COUNT(DISTINCT CASE
            WHEN m.status='expired'
            THEN u.id
        END) AS expired_members,

        bm.id AS manager_id,
        bm.name AS manager_name

    FROM branches b

    LEFT JOIN users u
        ON b.id = u.branch_id
        AND u.role='member'

    LEFT JOIN memberships m
        ON u.id = m.user_id

    LEFT JOIN users bm
        ON bm.branch_id = b.id
        AND bm.role='branch_manager'

    GROUP BY b.id

    ORDER BY b.id DESC
");

$branches = $stmt->fetchAll();
?>

<div class="space-y-6">

    <header class="pb-5 border-b border-slate-200 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Operational Distribution</span>
            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">Branch Management</h1>
            <p class="text-slate-500 text-sm mt-1">
                Manage and audit all system organization branches, metrics, and regional leadership.
            </p>
        </div>
        <div>
            <a href="add_branch.php" 
               class="inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold tracking-wide uppercase px-4 py-2.5 rounded-lg transition-colors border border-slate-900 shadow-sm whitespace-nowrap">
                + Add Branch
            </a>
        </div>
    </header>

    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse m-0">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-400 text-[11px] font-bold uppercase tracking-wider bg-slate-50/20">
                        <th class="px-5 py-3.5">Branch Name</th>
                        <th class="px-5 py-3.5 font-mono w-24">Code</th>
                        <th class="px-5 py-3.5">Regional Location</th>
                        <th class="px-5 py-3.5 w-36">Phone Matrix</th>
                        <th class="px-4 py-3.5 text-center w-24">Total</th>
                        <th class="px-4 py-3.5 text-center w-24">Active</th>
                        <th class="px-4 py-3.5 text-center w-24">Expired</th>
                        <th class="px-5 py-3.5 w-44">Regional Manager</th>
                        <th class="px-5 py-3.5 text-center w-28">Status</th>
                        <th class="px-5 py-3.5 text-right w-64">Actions Suite</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                    
                    <?php if(empty($branches)): ?>
                        <tr>
                            <td colspan="10" class="px-5 py-12 text-center text-slate-400 italic bg-slate-50/10">
                                No systemic organization distribution branches found in active database registries.
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach($branches as $b): ?>
                    <tr class="hover:bg-slate-50/50 transition-colors duration-75">
                        
                        <td class="px-5 py-4 font-semibold text-slate-900 whitespace-nowrap">
                            <?= htmlspecialchars($b['branch_name']) ?>
                        </td>

                        <td class="px-5 py-4 font-mono text-xs text-slate-500 whitespace-nowrap">
                            <?= htmlspecialchars($b['branch_code']) ?>
                        </td>

                        <td class="px-5 py-4 text-slate-600 whitespace-nowrap">
                            <?= htmlspecialchars($b['city']) ?>, <span class="text-xs text-slate-400 font-normal"><?= htmlspecialchars($b['district']) ?></span>
                        </td>

                        <td class="px-5 py-4 font-mono text-xs text-slate-500 whitespace-nowrap">
                            <?= htmlspecialchars($b['phone']) ?>
                        </td>

                        <td class="px-4 py-4 text-center font-mono font-bold text-slate-800 bg-slate-50/30">
                            <?= $b['total_members'] ?? 0 ?>
                        </td>

                        <td class="px-4 py-4 text-center font-mono font-bold text-emerald-600 bg-emerald-50/10">
                            <?= $b['active_members'] ?? 0 ?>
                        </td>

                        <td class="px-4 py-4 text-center font-mono font-bold text-rose-600 bg-rose-50/10">
                            <?= $b['expired_members'] ?? 0 ?>
                        </td>

                        <td class="px-5 py-4 whitespace-nowrap">
                            <?php if(!empty($b['manager_name'])): ?>
                                <span class="text-slate-800 font-semibold flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                    <?= htmlspecialchars($b['manager_name']) ?>
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center text-xs font-semibold px-2 py-0.5 rounded bg-amber-50 text-amber-700 border border-amber-200/50">
                                    Unassigned
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="px-5 py-4 text-center whitespace-nowrap">
                            <?php if($b['status'] == 'active'): ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded text-xs font-bold font-mono uppercase bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                    Active
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded text-xs font-bold font-mono uppercase bg-slate-100 text-slate-400 border border-slate-200/50">
                                    Inactive
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="px-5 py-4 whitespace-nowrap text-right text-xs space-x-1">
                            <a href="branch_members.php?branch_id=<?= $b['id'] ?>" 
                               class="inline-block text-slate-700 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 border border-slate-200 px-2 py-1 rounded font-bold tracking-wide uppercase transition-colors">
                                Members
                            </a>
                            <a href="assign_branch_manager.php?branch_id=<?= $b['id'] ?>" 
                               class="inline-block text-slate-700 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 border border-slate-200 px-2 py-1 rounded font-bold tracking-wide uppercase transition-colors">
                                Manager
                            </a>
                            <a href="edit_branch.php?id=<?= $b['id'] ?>" 
                               class="inline-block text-slate-700 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 border border-slate-200 px-2 py-1 rounded font-bold tracking-wide uppercase transition-colors">
                                Edit
                            </a>
                            <a href="delete_branch.php?id=<?= $b['id'] ?>" 
                               onclick="return confirm('Delete this branch?')" 
                               class="inline-block text-rose-600 hover:text-white hover:bg-rose-600 border border-rose-100 hover:border-rose-600 px-2.5 py-1 rounded font-bold tracking-wide uppercase transition-all shadow-xs">
                                Delete
                            </a>
                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

</div> </div> <?php require '../includes/footer.php'; ?>