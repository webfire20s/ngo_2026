<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<main>

<section class="py-20 gradient-bg text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Our Events</h1>
    <p class="text-xl mt-4">Latest programs & activities</p>
</section>

<section class="py-20 bg-white">
<div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">

<?php
$res = $conn->query("SELECT * FROM events ORDER BY id DESC");
if ($res->num_rows == 0):
?>
    <p class="text-center col-span-3 text-gray-600">No events available.</p>
<?php
endif;

while ($row = $res->fetch_assoc()):
?>
<div class="bg-gray-50 rounded-lg shadow-lg overflow-hidden">
    <?php if ($row['photo']) { ?>
        <img src="uploads/<?= $row['photo'] ?>" class="w-full h-48 object-cover">
    <?php } ?>

    <div class="p-6">
        <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($row['title']) ?></h3>
        <p class="text-gray-600">
            <?= substr(strip_tags($row['description']), 0, 120) ?>...
        </p>
    </div>
</div>
<?php endwhile; ?>

</div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
