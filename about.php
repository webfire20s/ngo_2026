<?php
include 'includes/header.php';
include 'includes/db.php';

/* Fetch About content (single row only) */
$about = [];
$result = $conn->query("SELECT * FROM about_content ORDER BY id ASC LIMIT 1");
if ($result && $result->num_rows === 1) {
    $about = $result->fetch_assoc();
}

/* Fetch team members */
$team = $conn->query("SELECT * FROM team_members WHERE status=1 ORDER BY created_at ASC");

/* Fetch partners */
$partners = $conn->query("SELECT * FROM partners WHERE status=1 ORDER BY created_at ASC");

/* Helper for safe output */
function e($value, $fallback = '') {
    return !empty($value) ? htmlspecialchars($value) : $fallback;
}
?>

<main class="bg-white">

<section class="relative py-24 lg:py-32 overflow-hidden gradient-bg text-white">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 0 L100 0 L100 100 L0 100 Z" />
        </svg>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">
            <?= e($about['hero_title'], 'About Neelkranti Foundation') ?>
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-90 leading-relaxed font-light">
            <?= e($about['hero_subtitle'], 'A dedicated organization working towards social welfare, sustainable development, and community empowerment.') ?>
        </p>
    </div>
</section>

<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="order-2 lg:order-1">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-4 block">Our Journey</span>
                <h2 class="text-4xl font-bold text-gray-900 mb-8 leading-tight">
                    <?= e($about['story_heading'], 'Our Story') ?>
                </h2>

                <div class="space-y-4 text-gray-600 text-lg leading-relaxed mb-10">
                    <p><?= e($about['story_p1']) ?></p>
                    <p><?= e($about['story_p2']) ?></p>
                    <p><?= e($about['story_p3']) ?></p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <?php 
                    $stats = [
                        ['val' => 'stat1_value', 'lab' => 'stat1_label', 'col' => 'text-blue-600', 'bg' => 'bg-blue-50'],
                        ['val' => 'stat2_value', 'lab' => 'stat2_label', 'col' => 'text-green-600', 'bg' => 'bg-green-50'],
                        ['val' => 'stat3_value', 'lab' => 'stat3_label', 'col' => 'text-purple-600', 'bg' => 'bg-purple-50'],
                        ['val' => 'stat4_value', 'lab' => 'stat4_label', 'col' => 'text-orange-600', 'bg' => 'bg-orange-50'],
                    ];
                    foreach ($stats as $s): ?>
                    <div class="<?= $s['bg'] ?> p-6 rounded-2xl border border-transparent hover:border-gray-200 transition-all">
                        <div class="text-3xl font-black <?= $s['col'] ?> mb-1">
                            <?= e($about[$s['val']], '0') ?>
                        </div>
                        <div class="text-gray-500 font-medium uppercase text-xs tracking-wider">
                            <?= e($about[$s['lab']]) ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="order-1 lg:order-2 grid grid-cols-12 gap-4">
                <?php if (!empty($about['about_image1'])): ?>
                    <div class="col-span-8 pt-12">
                        <img src="<?= e($about['about_image1']) ?>" class="rounded-3xl shadow-2xl w-full object-cover h-64 lg:h-80 transform hover:scale-[1.02] transition-transform" alt="About Image 1">
                    </div>
                <?php endif; ?>
                <?php if (!empty($about['about_image2'])): ?>
                    <div class="col-span-8 col-start-5 -mt-16 lg:-mt-24">
                        <img src="<?= e($about['about_image2']) ?>" class="rounded-3xl shadow-2xl w-full object-cover h-64 lg:h-80 border-8 border-white transform hover:scale-[1.02] transition-transform" alt="About Image 2">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="group bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="w-14 h-14 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-600 text-lg leading-relaxed"><?= e($about['mission_text']) ?></p>
            </div>

            <div class="group bg-white p-10 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="w-14 h-14 bg-green-500 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h3>
                <p class="text-gray-600 text-lg leading-relaxed"><?= e($about['vision_text']) ?></p>
            </div>
        </div>
    </div>
</section>




<section class="py-20 gradient-bg text-white relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl font-bold mb-6">Want to make a difference?</h2>
        <p class="text-xl mb-10 opacity-90">Join the Neelkranti Foundation and help us empower communities across the nation.</p>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="membership_apply.php" class="bg-white text-blue-600 px-10 py-4 rounded-full font-bold shadow-lg hover:bg-blue-50 transition-colors">
                Become a Member
            </a>
            <a href="contact.php" class="border-2 border-white/30 backdrop-blur-sm px-10 py-4 rounded-full font-bold hover:bg-white/10 transition-all">
                Get in Touch
            </a>
        </div>
    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>