<?php
$page_title = "Achievements | Neel Foundation";
$active = "achievements";
include 'includes/header.php';
?>

<main class="bg-white">
    <section class="relative py-24 lg:py-32 overflow-hidden gradient-bg text-white">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">Our Achievements</h1>
            <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto font-light">
                Celebrating our milestones and the positive impact we've created together.
            </p>
        </div>
    </section>

    <section class="py-24 -mt-16 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-10 md:p-16 grid grid-cols-2 md:grid-cols-4 gap-8 border border-gray-100">
                <div class="text-center group">
                    <div class="text-5xl font-black text-blue-600 mb-2 group-hover:scale-110 transition-transform">500+</div>
                    <div class="text-gray-500 uppercase tracking-widest text-xs font-bold">Students Trained</div>
                </div>
                <div class="text-center group border-l border-gray-100">
                    <div class="text-5xl font-black text-green-600 mb-2 group-hover:scale-110 transition-transform">50+</div>
                    <div class="text-gray-500 uppercase tracking-widest text-xs font-bold">Programs Conducted</div>
                </div>
                <div class="text-center group border-l border-gray-100">
                    <div class="text-5xl font-black text-purple-600 mb-2 group-hover:scale-110 transition-transform">1000+</div>
                    <div class="text-gray-500 uppercase tracking-widest text-xs font-bold">Lives Impacted</div>
                </div>
                <div class="text-center group border-l border-gray-100">
                    <div class="text-5xl font-black text-orange-600 mb-2 group-hover:scale-110 transition-transform">15+</div>
                    <div class="text-gray-500 uppercase tracking-widest text-xs font-bold">Years of Service</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Major Milestones</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="space-y-10">
                <?php 
                $achievements = [
                    ['icon' => 'fa-trophy', 'col' => 'blue', 'year' => '2023', 'title' => 'National Recognition for Excellence in Fisheries Education', 'desc' => 'Awarded by the Ministry of Fisheries for outstanding contribution to fisheries education and training in 2023.', 'tags' => ['National Award', 'Education']],
                    ['icon' => 'fa-medal', 'col' => 'green', 'year' => 'Active', 'title' => '100+ Community Development Projects', 'desc' => 'Completed projects across 5 states, impacting more than 50,000 lives directly and indirectly.', 'tags' => ['Community', 'Impact']],
                    ['icon' => 'fa-award', 'col' => 'purple', 'year' => '2022', 'title' => 'Research Excellence Award', 'desc' => 'Received from the Indian Council of Agricultural Research (ICAR) for contributions to fisheries research.', 'tags' => ['Research', 'ICAR']],
                    ['icon' => 'fa-star', 'col' => 'orange', 'year' => 'Innovation', 'title' => 'Sustainable Aquaculture Practices', 'desc' => 'Developed innovative practices adopted by over 200 fish farmers nationwide.', 'tags' => ['Sustainability', 'Innovation']]
                ];
                foreach ($achievements as $a): ?>
                <div class="group bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col md:flex-row gap-8 items-start transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-<?= $a['col'] ?>-50 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:rotate-12 transition-transform">
                        <i class="fas <?= $a['icon'] ?> text-<?= $a['col'] ?>-600 text-3xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-xs font-black uppercase tracking-tighter text-<?= $a['col'] ?>-600 bg-<?= $a['col'] ?>-50 px-2 py-1 rounded"><?= $a['year'] ?></span>
                            <h3 class="text-2xl font-bold text-gray-900"><?= $a['title'] ?></h3>
                        </div>
                        <p class="text-gray-600 text-lg mb-4"><?= $a['desc'] ?></p>
                        <div class="flex gap-2">
                            <?php foreach ($a['tags'] as $tag): ?>
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase"><?= $tag ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Be Part of Our Success Story</h2>
            <div class="flex flex-wrap justify-center gap-4 mt-8">
                <a href="https://neelkranti.webfiredegitech.com/membership/apply" class="bg-white text-blue-600 px-10 py-4 rounded-full font-bold hover:bg-blue-50 transition-all">Join Our Community</a>
                <a href="https://neelkranti.webfiredegitech.com/donate" class="bg-green-500 text-white px-10 py-4 rounded-full font-bold hover:bg-green-600 transition-all">Support Mission</a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>