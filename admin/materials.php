<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';
require '../includes/header.php';
require '../includes/sidebar.php';

$stmt = $pdo->query("
    SELECT
        em.*,
        u.name AS created_by_name
    FROM educational_materials em
    LEFT JOIN users u
        ON em.created_by = u.id
    ORDER BY em.id DESC
");

$materials = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="space-y-6">

    <header class="pb-5 border-b border-slate-200 flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Resource Hub</span>
            <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">Knowledge Center</h1>
            <p class="text-slate-500 text-sm mt-1">
                Manage educational materials, documents, and public resources.
            </p>
        </div>
        <div>
            <a href="add_material.php" 
               class="inline-flex items-center justify-center bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold tracking-wide uppercase px-4 py-2.5 rounded-lg transition-colors border border-slate-900 shadow-sm whitespace-nowrap">
                + Add Material
            </a>
        </div>
    </header>

    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse m-0">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-400 text-[11px] font-bold uppercase tracking-wider bg-slate-50/20">
                        <th class="px-6 py-3.5">Material Title & Summary</th>
                        <th class="px-6 py-3.5 w-44">Category</th>
                        <th class="px-6 py-3.5 w-32">Resource Type</th>
                        <th class="px-6 py-3.5 w-28 text-center">Downloads</th>
                        <th class="px-6 py-3.5 w-32 text-center">State Visibility</th>
                        <th class="px-6 py-3.5 w-36 text-center">Created Date</th>
                        <th class="px-6 py-3.5 w-40 text-right">Actions Matrix</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">

                    <?php if(empty($materials)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-400 italic bg-slate-50/10">
                                No system educational materials or public documents initialized within this workspace.
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach($materials as $m): ?>
                        <tr class="hover:bg-slate-50/50 transition-colors duration-75">
                            
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-900">
                                    <?= htmlspecialchars($m['title']) ?>
                                </div>
                                <?php if(!empty($m['description'])): ?>
                                    <div class="text-xs text-slate-400 font-normal mt-0.5 max-w-xl line-clamp-1">
                                        <?= htmlspecialchars(substr($m['description'], 0, 80)) ?>...
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-slate-600 font-medium bg-slate-100/80 px-2.5 py-1 rounded-md border border-slate-200/30 text-xs">
                                    <?= htmlspecialchars($m['category']) ?>
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-xs font-mono">
                                <?php if(!empty($m['youtube_url'])): ?>
                                    <span class="text-rose-700 bg-rose-50 px-2 py-0.5 rounded border border-rose-100 font-semibold uppercase tracking-wide">
                                        Video
                                    </span>
                                <?php else: ?>
                                    <span class="text-slate-700 bg-slate-50 px-2 py-0.5 rounded border border-slate-200/60 font-semibold uppercase tracking-wide">
                                        <?= strtoupper($m['file_type']) ?>
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="px-6 py-4 text-center font-mono font-bold text-slate-600">
                                <?= (int)$m['downloads'] ?>
                            </td>

                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <?php if($m['is_public']): ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded text-xs font-bold font-mono uppercase bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                        Public
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded text-xs font-bold font-mono uppercase bg-slate-100 text-slate-400 border border-slate-200/50">
                                        Private
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="px-6 py-4 text-center font-mono text-xs text-slate-400 whitespace-nowrap">
                                <?= date('d M Y', strtotime($m['created_at'])) ?>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-xs space-x-1">
                                <a href="edit_material.php?id=<?= $m['id'] ?>" 
                                   class="inline-block text-slate-700 hover:text-slate-900 bg-slate-50 hover:bg-slate-100 border border-slate-200 px-2.5 py-1 rounded font-bold tracking-wide uppercase transition-colors">
                                    Edit
                                </a>
                                <a href="delete_material.php?id=<?= $m['id'] ?>" 
                                   onclick="return confirm('Delete this material?')" 
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