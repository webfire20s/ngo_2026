<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<main>
<section class="py-20 gradient-bg text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Gallery</h1>
</section>

<section class="py-20 bg-white">
<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

<?php
$res = $conn->query("SELECT * FROM gallery ORDER BY id DESC");

if ($res->num_rows == 0):
?>
    <p class="text-gray-500 text-center col-span-3">
        No images available.
    </p>
<?php
endif;

while ($row = $res->fetch_assoc()):
?>
    <div class="bg-gray-50 rounded-lg shadow overflow-hidden">
        <img src="uploads/<?= $row['photo'] ?>"
             class="w-full h-64 object-cover">
        <div class="p-4 text-center font-semibold">
            <?= htmlspecialchars($row['title']) ?>
        </div>
    </div>
<?php endwhile; ?>

</div>
</section>
</main>

<?php include 'includes/footer.php'; ?>
