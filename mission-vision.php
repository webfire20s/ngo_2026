<?php
$page_title = "Mission & Vision | Neel Foundation";
$active = "mission-vision";
include 'includes/header.php';
?>

<main class="bg-white">
    <section class="py-24 gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight">Mission & Vision</h1>
            <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto font-light">
                Our guiding principles and aspirations for a better future.
            </p>
        </div>
    </section>

    <section class="py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 space-y-32">
            
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <div class="w-16 h-1 bg-blue-600 mb-8"></div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 italic">"To empower through sustainable innovation."</h2>
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        We strive to provide quality education, training, and support to individuals and communities, enabling them to achieve self-sufficiency.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            <span class="font-bold text-gray-800">Quality Education</span>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            <span class="font-bold text-gray-800">Sustainability</span>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
                    <img src="https://neelkranti.webfiredegitech.com/images/mission-1.jpg" class="rounded-[3rem] shadow-2xl w-full object-cover z-10 relative transform rotate-2" alt="Mission">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row-reverse items-center gap-16">
                <div class="lg:w-1/2">
                    <div class="w-16 h-1 bg-green-500 mb-8"></div>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 italic">"Creating thrive-ready model communities."</h2>
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        Every individual should have access to quality education and the resources needed to reach their full potential in harmony with nature.
                    </p>
                    <div class="space-y-4">
                        <div class="bg-green-50 p-6 rounded-3xl border border-green-100">
                            <h4 class="font-bold text-green-800 mb-2">Excellence & Impact</h4>
                            <p class="text-green-700/80 text-sm">Strive for measurable and lasting positive change in every community we touch.</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <div class="absolute -bottom-10 -left-10 w-64 h-64 bg-green-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
                    <img src="https://neelkranti.webfiredegitech.com/images/vision-1.jpg" class="rounded-[3rem] shadow-2xl w-full object-cover z-10 relative transform -rotate-2" alt="Vision">
                </div>
            </div>

        </div>
    </section>

    <section class="py-24 bg-gray-50 border-y border-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900">Our Core Pillars</h2>
                <p class="text-gray-500 mt-2">The principles guiding every decision.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                <?php 
                $vals = [
                    ['icon' => 'fa-handshake', 'col' => 'blue', 'label' => 'Integrity'],
                    ['icon' => 'fa-leaf', 'col' => 'green', 'label' => 'Nature'],
                    ['icon' => 'fa-users', 'col' => 'purple', 'label' => 'Unity'],
                    ['icon' => 'fa-lightbulb', 'col' => 'orange', 'label' => 'Innovation'],
                    ['icon' => 'fa-heart', 'col' => 'red', 'label' => 'Empathy'],
                    ['icon' => 'fa-trophy', 'col' => 'indigo', 'label' => 'Quality']
                ];
                foreach ($vals as $v): ?>
                <div class="text-center group">
                    <div class="w-20 h-20 mx-auto bg-white rounded-full shadow-sm group-hover:shadow-xl transition-all flex items-center justify-center mb-4 border border-gray-100 group-hover:border-<?= $v['col'] ?>-500">
                        <i class="fas <?= $v['icon'] ?> text-<?= $v['col'] ?>-500 text-2xl group-hover:scale-125 transition-transform"></i>
                    </div>
                    <span class="font-bold text-gray-800 uppercase tracking-tighter text-xs"><?= $v['label'] ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>