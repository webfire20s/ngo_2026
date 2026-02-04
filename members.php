<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<main>

<!-- HERO -->
<section class="py-20 gradient-bg text-white text-center">
    <h1 class="text-4xl md:text-5xl font-bold">Our Members</h1>
</section>

<!-- MEMBERS LIST -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php
            $result = $conn->query("SELECT * FROM members ORDER BY id DESC");

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                <div class="bg-gray-50 rounded-lg shadow-lg overflow-hidden text-center">
                    <img src="uploads/<?= htmlspecialchars($row['photo']); ?>"
                         class="w-full h-64 object-cover"
                         alt="<?= htmlspecialchars($row['name']); ?>">

                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            <?= htmlspecialchars($row['name']); ?>
                        </h3>
                        <p class="text-gray-600 mt-2">
                            <?= htmlspecialchars($row['designation']); ?>
                        </p>
                    </div>
                </div>

            <?php
                endwhile;
            else:
            ?>
                <p class="col-span-3 text-center text-gray-500">
                    No members available at the moment.
                </p>
            <?php endif; ?>

        </div>

    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
