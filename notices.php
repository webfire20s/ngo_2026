<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<main>

<!-- HERO SECTION -->
<section class="py-20 gradient-bg text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Notices</h1>
    <p class="text-xl mt-4">Latest announcements & updates</p>
</section>

<!-- NOTICES LIST -->
<section class="py-20 bg-white">
<div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">

<?php
$res = $conn->query("SELECT * FROM notices ORDER BY id DESC");

if ($res->num_rows == 0):
?>
    <p class="text-center col-span-3 text-gray-600">
        No notices available.
    </p>
<?php
endif;

while ($row = $res->fetch_assoc()):
?>
    <div class="bg-gray-50 rounded-lg shadow-lg overflow-hidden">

        <?php if (!empty($row['photo'])) { ?>
            <img src="uploads/<?= htmlspecialchars($row['photo']) ?>"
                 class="w-full h-48 object-cover">
        <?php } ?>

        <div class="p-6">
            <h3 class="text-xl font-semibold mb-2">
                <?= htmlspecialchars($row['title']) ?>
            </h3>

            <p class="text-gray-600">
                <?= substr(strip_tags($row['description']), 0, 120) ?>...
            </p>

            <?php if (!empty($row['notice_date'])) { ?>
                <p class="text-sm text-gray-400 mt-4">
                    📅 <?= date("d M Y", strtotime($row['notice_date'])) ?>
                </p>
            <?php } ?>
        </div>
    </div>
<?php endwhile; ?>

</div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
