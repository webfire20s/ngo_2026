<?php
include 'includes/header.php';
include 'includes/db.php';

/* Fetch About content (single row only) */
$about = [];
$result = $conn->query("SELECT * FROM about_content ORDER BY id ASC LIMIT 1");
if ($result && $result->num_rows === 1) {
    $about = $result->fetch_assoc();
}


/* Fetch team members ) */

$team = $conn->query("SELECT * FROM team_members WHERE status=1 ORDER BY created_at ASC");

/* Fetch partners (single row only) */
$partners = $conn->query("SELECT * FROM partners WHERE status=1 ORDER BY created_at ASC");


/* Helper for safe output */
function e($value, $fallback = '') {
    return !empty($value) ? htmlspecialchars($value) : $fallback;
}

?>

<main>

<!-- Hero Section -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">
            <?= e($about['hero_title'], 'About Neelkranti Foundation') ?>
        </h1>
        <p class="text-xl max-w-3xl mx-auto">
            <?= e($about['hero_subtitle'], 'A dedicated organization working towards social welfare, sustainable development, and community empowerment.') ?>
        </p>
    </div>
</section>

<!-- About Content -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">
                    <?= e($about['story_heading'], 'Our Story') ?>
                </h2>

                <p class="text-gray-600 mb-4"><?= e($about['story_p1']) ?></p>
                <p class="text-gray-600 mb-4"><?= e($about['story_p2']) ?></p>
                <p class="text-gray-600 mb-6"><?= e($about['story_p3']) ?></p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">
                            <?= e($about['stat1_value'], '0') ?>
                        </div>
                        <div class="text-gray-600"><?= e($about['stat1_label']) ?></div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">
                            <?= e($about['stat2_value'], '0') ?>
                        </div>
                        <div class="text-gray-600"><?= e($about['stat2_label']) ?></div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-2">
                            <?= e($about['stat3_value'], '0') ?>
                        </div>
                        <div class="text-gray-600"><?= e($about['stat3_label']) ?></div>
                    </div>

                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-600 mb-2">
                            <?= e($about['stat4_value'], '0') ?>
                        </div>
                        <div class="text-gray-600"><?= e($about['stat4_label']) ?></div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <?php if (!empty($about['about_image1'])): ?>
                    <img src="<?= e($about['about_image1']) ?>" class="rounded-lg shadow-lg w-full" alt="About Image 1">
                <?php endif; ?>

                <?php if (!empty($about['about_image2'])): ?>
                    <img src="<?= e($about['about_image2']) ?>" class="rounded-lg shadow-lg w-full" alt="About Image 2">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Mission</h3>
                <p class="text-gray-600"><?= e($about['mission_text']) ?></p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Our Vision</h3>
                <p class="text-gray-600"><?= e($about['vision_text']) ?></p>
            </div>

        </div>
    </div>
</section>

<!-- TEAMS-->

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Our Leadership Team
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Meet the dedicated individuals who lead our mission
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php while ($row = $team->fetch_assoc()): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    
                    <?php if ($row['image']): ?>
                        <img src="uploads/team/<?= $row['image'] ?>"
                             class="w-full h-64 object-cover"
                             alt="<?= htmlspecialchars($row['name']) ?>">
                    <?php endif; ?>

                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            <?= htmlspecialchars($row['name']) ?>
                        </h3>

                        <p class="text-gray-600 mb-3">
                            <?= htmlspecialchars($row['designation']) ?>
                        </p>

                        <p class="text-gray-600 text-sm">
                            <?= nl2br(htmlspecialchars($row['bio'])) ?>
                        </p>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
</section>

<!-- Partners -->



<!-- Call to Action (UNCHANGED) -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Join Our Journey</h2>
        <p class="text-xl mb-8">
            Be part of our mission to create positive change in society.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="membership_apply.php" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold">
                Become a Member
            </a>
            <a href="contact.php" class="border-2 border-white px-8 py-3 rounded-full font-semibold">
                Contact Us
            </a>
        </div>
    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
