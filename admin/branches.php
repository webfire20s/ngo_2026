<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require '../includes/sidebar.php';

$stmt = $pdo->query("
    SELECT
        b.*,

        COUNT(m.id) AS total_members,

        SUM(
            CASE
                WHEN m.status='active'
                THEN 1
                ELSE 0
            END
        ) AS active_members,

        SUM(
            CASE
                WHEN m.status='expired'
                THEN 1
                ELSE 0
            END
        ) AS expired_members

    FROM branches b

    LEFT JOIN memberships m
        ON b.id = m.branch_id

    GROUP BY b.id

    ORDER BY b.id DESC
");

$branches = $stmt->fetchAll();
?>

<div class="max-w-7xl">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold">Branch Management</h1>
            <p class="text-gray-500">
                Manage all organization branches
            </p>
        </div>

        <a href="add_branch.php"
           class="bg-black text-white px-5 py-2 rounded">
            + Add Branch
        </a>
    </div>

    <div class="bg-white rounded-xl border overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Branch</th>
                    <th class="p-3 text-left">Code</th>
                    <th class="p-3 text-left">Location</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-center">Members</th>
                    <th class="p-3 text-center">Active</th>
                    <th class="p-3 text-center">Expired</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($branches as $b): ?>

            <tr class="border-t">

                <td class="p-3">
                    <?= htmlspecialchars($b['branch_name']) ?>
                </td>

                <td class="p-3">
                    <?= htmlspecialchars($b['branch_code']) ?>
                </td>

                <td class="p-3">
                    <?= htmlspecialchars($b['city']) ?>,
                    <?= htmlspecialchars($b['district']) ?>
                </td>

                <td class="p-3">
                    <?= htmlspecialchars($b['phone']) ?>
                </td>
                <td class="p-3 text-center">
                    <span class="font-semibold">
                        <?= $b['total_members'] ?? 0 ?>
                    </span>
                </td>

                <td class="p-3 text-center">
                    <span class="text-green-600 font-semibold">
                        <?= $b['active_members'] ?? 0 ?>
                    </span>
                </td>

                <td class="p-3 text-center">
                    <span class="text-red-600 font-semibold">
                        <?= $b['expired_members'] ?? 0 ?>
                    </span>
                </td>

                <td class="p-3">
                    <?php if($b['status']=='active'): ?>
                        <span class="text-green-600 font-semibold">
                            Active
                        </span>
                    <?php else: ?>
                        <span class="text-red-600 font-semibold">
                            Inactive
                        </span>
                    <?php endif; ?>
                </td>

                <td class="p-3 text-center">

                    <a href="branch_members.php?branch_id=<?= $b['id'] ?>"
                        class="text-green-600 mr-3">
                        Members
                    </a>

                    <a href="edit_branch.php?id=<?= $b['id'] ?>"
                        class="text-blue-600 mr-3">
                        Edit
                    </a>

                    <a href="delete_branch.php?id=<?= $b['id'] ?>"
                        onclick="return confirm('Delete this branch?')"
                        class="text-red-600">
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
</div>

<?php require '../includes/footer.php'; ?>