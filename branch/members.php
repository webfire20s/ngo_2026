<?php
require 'middleware.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require 'sidebar.php';

/*
|--------------------------------------------------------------------------
| Get Branch ID Of Logged In Manager
|--------------------------------------------------------------------------
*/

$stmt = $pdo->prepare("
    SELECT branch_id
    FROM users
    WHERE id=?
");

$stmt->execute([$_SESSION['user_id']]);

$user = $stmt->fetch();

$branch_id = $user['branch_id'] ?? 0;

/*
|--------------------------------------------------------------------------
| Fetch Members Of This Branch Only
|--------------------------------------------------------------------------
*/

$stmt = $pdo->prepare("
    SELECT
        u.id,
        u.name,
        u.email,
        u.phone,
        m.status,
        d.title AS designation
    FROM users u

    LEFT JOIN memberships m
        ON u.id = m.user_id

    LEFT JOIN designations d
        ON m.designation_id = d.id

    WHERE u.branch_id = ?
    AND u.role='member'

    ORDER BY u.name ASC
");

$stmt->execute([$branch_id]);

$members = $stmt->fetchAll();
$total_members = count($members);
?>

<div class="space-y-6">

    <div class="border-b border-slate-200 pb-5">
        <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
            Branch Directory
        </span>

        <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
            Branch Members
        </h1>

        <p class="text-sm text-slate-500 mt-2">
            Total Members: <?= $total_members ?>
        </p>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs uppercase">Phone</th>
                        <th class="px-6 py-3 text-left text-xs uppercase">Designation</th>
                        <th class="px-6 py-3 text-left text-xs uppercase">Status</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(empty($members)): ?>

                    <tr>
                        <td colspan="5"
                            class="px-6 py-8 text-center text-slate-400">
                            No members found.
                        </td>
                    </tr>

                <?php else: ?>

                    <?php foreach($members as $m): ?>

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4 font-medium">
                            <?= htmlspecialchars($m['name']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= htmlspecialchars($m['email']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= htmlspecialchars($m['phone']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= htmlspecialchars($m['designation']) ?>
                        </td>

                        <td class="px-6 py-4">

                            <?php if($m['status']=='active'): ?>

                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    Active
                                </span>

                            <?php elseif($m['status']=='expired'): ?>

                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                    Expired
                                </span>

                            <?php else: ?>

                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>

                            <?php endif; ?>

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