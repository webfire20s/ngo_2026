<?php
require '../includes/middleware_admin.php';
require '../includes/db.php';
require '../includes/admin_header.php';
require '../includes/sidebar.php';

$branch_id = (int)($_GET['branch_id'] ?? 0);

/* FETCH BRANCHES WITH MEMBER COUNTS */
$branches = $pdo->query("
    SELECT
        b.*,
        COUNT(m.id) AS total_members
    FROM branches b
    LEFT JOIN memberships m
        ON b.id = m.branch_id
    GROUP BY b.id
    ORDER BY b.branch_name ASC
")->fetchAll();

$members = [];
$current_branch = null;

if($branch_id){

    $stmt = $pdo->prepare("
        SELECT
            b.branch_name,

            u.name,
            u.email,
            u.phone,

            d.title,

            m.status,
            m.join_date,
            m.expiry_date,
            m.referral_code

        FROM memberships m

        JOIN users u
            ON m.user_id = u.id

        LEFT JOIN designations d
            ON m.designation_id = d.id

        LEFT JOIN branches b
            ON m.branch_id = b.id

        WHERE m.branch_id = ?

        ORDER BY u.name ASC
    ");

    $stmt->execute([$branch_id]);

    $members = $stmt->fetchAll();

    if(!empty($members)){
        $current_branch = $members[0]['branch_name'];
    }
}
?>

<div class="space-y-6">

    <!-- Header -->
    <header class="border-b border-slate-200 pb-5">
        <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">
            Branch Registry
        </span>

        <h1 class="text-3xl font-light tracking-tight text-slate-900 mt-1">
            Branch Members
        </h1>
    </header>

    <!-- Branch Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        <?php foreach($branches as $branch): ?>

        <a href="?branch_id=<?php echo $branch['id']; ?>"
           class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-slate-300 transition">

            <div class="flex justify-between items-start">

                <div>
                    <h3 class="font-semibold text-slate-900">
                        <?php echo htmlspecialchars($branch['branch_name']); ?>
                    </h3>

                    <p class="text-xs text-slate-400 mt-1">
                        <?php echo htmlspecialchars($branch['city']); ?>
                    </p>
                </div>

                <span class="text-xs font-bold bg-slate-100 px-2 py-1 rounded">
                    <?php echo $branch['total_members']; ?>
                </span>

            </div>

        </a>

        <?php endforeach; ?>

    </div>

    <?php if($branch_id): ?>

    <!-- Members Table -->
    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">

        <div class="px-6 py-4 border-b border-slate-100">
            <h2 class="font-semibold text-slate-900">
                <?php echo htmlspecialchars($current_branch); ?>
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>
                    <tr class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">

                        <th class="text-left px-6 py-3">Name</th>
                        <th class="text-left px-6 py-3">Designation</th>
                        <th class="text-left px-6 py-3">Referral Code</th>
                        <th class="text-left px-6 py-3">Join Date</th>
                        <th class="text-left px-6 py-3">Expiry Date</th>
                        <th class="text-left px-6 py-3">Status</th>

                    </tr>
                </thead>

                <tbody>

                    <?php if(empty($members)): ?>

                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-400">
                            No members found.
                        </td>
                    </tr>

                    <?php else: ?>

                    <?php foreach($members as $member): ?>

                    <tr class="border-t border-slate-100 hover:bg-slate-50">

                        <td class="px-6 py-4">
                            <div class="font-medium text-slate-900">
                                <?php echo htmlspecialchars($member['name']); ?>
                            </div>

                            <div class="text-xs text-slate-400">
                                <?php echo htmlspecialchars($member['email']); ?>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <?php echo htmlspecialchars($member['title']); ?>
                        </td>

                        <td class="px-6 py-4 font-mono text-xs">
                            <?php echo htmlspecialchars($member['referral_code']); ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php echo $member['join_date']; ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php echo $member['expiry_date']; ?>
                        </td>

                        <td class="px-6 py-4">

                            <?php
                            $color = match($member['status']) {
                                'active' => 'bg-emerald-100 text-emerald-700',
                                'expired' => 'bg-rose-100 text-rose-700',
                                default => 'bg-slate-100 text-slate-700'
                            };
                            ?>

                            <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $color; ?>">
                                <?php echo ucfirst($member['status']); ?>
                            </span>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <?php endif; ?>

</div>

</div>
</div>

<?php require '../includes/footer.php'; ?>