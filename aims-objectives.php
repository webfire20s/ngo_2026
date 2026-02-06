<?php
$page_title = "Aims & Objectives | Neel Foundation";
$active = "aims-objectives";
include 'includes/header.php';
?>

<main class="bg-white">
    <section class="py-24 lg:py-32 gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6">Aims & Objectives</h1>
            <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto font-light">
                Our commitment to social welfare and sustainable development.
            </p>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                $aims = [
                    ['icon' => 'fa-graduation-cap', 'col' => 'blue', 'title' => 'Education & Training', 'text' => 'Quality skill development in fisheries, aquaculture, and allied sciences.'],
                    ['icon' => 'fa-users', 'col' => 'green', 'title' => 'Community Development', 'text' => 'Empowering through sustainable livelihood and social welfare initiatives.'],
                    ['icon' => 'fa-microscope', 'col' => 'purple', 'title' => 'Research & Innovation', 'text' => 'Promoting R&D in fisheries sectors for sustainable long-term growth.'],
                    ['icon' => 'fa-leaf', 'col' => 'orange', 'title' => 'Environmental Conservation', 'text' => 'Sustainable practices and conservation integrated into every activity.'],
                    ['icon' => 'fa-hand-holding-heart', 'col' => 'red', 'title' => 'Social Welfare', 'text' => 'Uplifting marginalized communities and promoting social equality.'],
                    ['icon' => 'fa-briefcase', 'col' => 'indigo', 'title' => 'Employment Generation', 'text' => 'Creating opportunities through entrepreneurship and skill programs.']
                ];
                foreach ($aims as $aim): ?>
                <div class="group bg-<?= $aim['col'] ?>-50/50 p-10 rounded-3xl border border-transparent hover:border-<?= $aim['col'] ?>-200 transition-all duration-300">
                    <div class="w-14 h-14 bg-<?= $aim['col'] ?>-600 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:-rotate-6 transition-transform shadow-lg shadow-<?= $aim['col'] ?>-200">
                        <i class="fas <?= $aim['icon'] ?> text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4"><?= $aim['title'] ?></h3>
                    <p class="text-gray-600 leading-relaxed"><?= $aim['text'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-900 text-white rounded-[4rem] mx-4 mb-24 shadow-2xl">
        <div class="max-w-7xl mx-auto px-8 lg:px-16">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Specific Objectives</h2>
                <p class="text-blue-400 font-bold uppercase tracking-widest text-sm">Strategic Roadmap</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="space-y-12">
                    <div>
                        <h4 class="text-blue-400 font-bold mb-6 flex items-center gap-3"><span class="w-8 h-px bg-blue-400"></span> Fisheries Development</h4>
                        <ul class="space-y-4 opacity-80">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-blue-500 mt-1"></i> Scientific fish culture practices</li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-blue-500 mt-1"></i> Modern aquaculture training</li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-blue-500 mt-1"></i> Technical assistance for farmers</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-green-400 font-bold mb-6 flex items-center gap-3"><span class="w-8 h-px bg-green-400"></span> Skill Development</h4>
                        <ul class="space-y-4 opacity-80">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-green-500 mt-1"></i> Vocational training programs</li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-green-500 mt-1"></i> Hands-on practical experience</li>
                        </ul>
                    </div>
                </div>
                <div class="space-y-12">
                    <div>
                        <h4 class="text-purple-400 font-bold mb-6 flex items-center gap-3"><span class="w-8 h-px bg-purple-400"></span> Community Empowerment</h4>
                        <ul class="space-y-4 opacity-80">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-purple-500 mt-1"></i> Women empowerment programs</li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-purple-500 mt-1"></i> Rural development activities</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-orange-400 font-bold mb-6 flex items-center gap-3"><span class="w-8 h-px bg-orange-400"></span> Environment</h4>
                        <ul class="space-y-4 opacity-80">
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-orange-500 mt-1"></i> Biodiversity conservation</li>
                            <li class="flex items-start gap-3"><i class="fas fa-check-circle text-orange-500 mt-1"></i> Sustainable resource management</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>