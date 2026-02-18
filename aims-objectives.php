<?php
$page_title = "Aims & Objectives | Neel Foundation";
$active = "aims-objectives";
include 'includes/header.php';
?>

<style>
    .obj-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .obj-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: currentColor;
        opacity: 0.3;
    }
    .obj-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.05);
    }
    .gradient-hero-aims {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    /* Pulse effect for the background icons */
    .bg-icon-pulse {
        animation: iconPulse 8s ease-in-out infinite;
    }
    @keyframes iconPulse {
        0%, 100% { transform: scale(1); opacity: 0.05; }
        50% { transform: scale(1.1); opacity: 0.1; }
    }
</style>

<main class="bg-slate-50">
    <section class="py-28 lg:py-40 gradient-hero-aims text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
        </div>
        <div class="absolute top-20 right-10 w-64 h-64 bg-blue-500/20 rounded-full blur-3xl animate-pulse"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.3em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full animate__animated animate__fadeInDown">
                Our Compass
            </span>
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none animate__animated animate__fadeIn">
                Aims & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Objectives</span>
            </h1>
            <p class="text-xl md:text-2xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                Defining our commitment to social welfare, scientific excellence, and sustainable community development.
            </p>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php 
                $aims = [
                    ['icon' => 'fa-graduation-cap', 'col' => 'blue', 'title' => 'Education & Training', 'text' => 'Quality skill development in fisheries, aquaculture, and allied sciences.', 'delay' => '0.1s'],
                    ['icon' => 'fa-users', 'col' => 'emerald', 'title' => 'Community Development', 'text' => 'Empowering through sustainable livelihood and social welfare initiatives.', 'delay' => '0.2s'],
                    ['icon' => 'fa-microscope', 'col' => 'violet', 'title' => 'Research & Innovation', 'text' => 'Promoting R&D in fisheries sectors for sustainable long-term growth.', 'delay' => '0.3s'],
                    ['icon' => 'fa-leaf', 'col' => 'orange', 'title' => 'Environmental Conservation', 'text' => 'Sustainable practices and conservation integrated into every activity.', 'delay' => '0.4s'],
                    ['icon' => 'fa-hand-holding-heart', 'col' => 'rose', 'title' => 'Social Welfare', 'text' => 'Uplifting marginalized communities and promoting social equality.', 'delay' => '0.5s'],
                    ['icon' => 'fa-briefcase', 'col' => 'indigo', 'title' => 'Employment Generation', 'text' => 'Creating opportunities through entrepreneurship and skill programs.', 'delay' => '0.6s']
                ];

                foreach ($aims as $aim): 
                    $c = $aim['col'];
                ?>
                <div class="obj-card group bg-white p-10 rounded-[2.5rem] border border-slate-100 text-<?= $c ?>-600 animate-on-scroll" 
                     data-animate="animate__fadeInUp" 
                     style="animation-delay: <?= $aim['delay'] ?>;">
                    
                    <div class="w-16 h-16 bg-<?= $c ?>-600 text-white rounded-2xl flex items-center justify-center mb-8 group-hover:rotate-[10deg] transition-transform duration-500 shadow-xl shadow-<?= $c ?>-100">
                        <i class="fas <?= $aim['icon'] ?> text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4 tracking-tight"><?= $aim['title'] ?></h3>
                    <p class="text-slate-600 leading-relaxed font-medium opacity-80"><?= $aim['text'] ?></p>
                    
                    <div class="mt-8 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300">
                        <i class="fas fa-arrow-right text-<?= $c ?>-500"></i>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-slate-900 text-white rounded-[4rem] p-8 lg:p-20 relative overflow-hidden shadow-[0_50px_100px_-20px_rgba(15,23,42,0.3)] animate-on-scroll" data-animate="animate__zoomIn">
                <i class="fas fa-anchor absolute -bottom-10 -left-10 text-[20rem] text-white/5 bg-icon-pulse pointer-events-none"></i>
                
                <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-blue-600/10 to-transparent pointer-events-none"></div>
                
                <div class="relative z-10">
                    <div class="text-center mb-20">
                        <span class="text-blue-400 font-bold uppercase tracking-[0.3em] text-xs">The Blue Blueprint</span>
                        <h2 class="text-4xl md:text-5xl font-black mt-4">Specific Objectives</h2>
                        <div class="w-24 h-1.5 bg-blue-500 mx-auto mt-6 rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
                        <div class="space-y-16">
                            <div class="group">
                                <h4 class="text-blue-400 font-black text-xl mb-8 flex items-center gap-4 group-hover:translate-x-2 transition-transform">
                                    <span class="w-10 h-10 rounded-full bg-blue-400/10 flex items-center justify-center text-sm italic">01</span>
                                    Fisheries Development
                                </h4>
                                <ul class="space-y-5">
                                    <?php $items = ["Scientific fish culture practices", "Modern aquaculture training", "Technical assistance for farmers"]; 
                                    foreach($items as $item): ?>
                                    <li class="flex items-center gap-4 p-4 rounded-2xl hover:bg-white/5 transition-colors border border-transparent hover:border-white/10 group/item">
                                        <i class="fas fa-circle-check text-blue-500 text-lg group-hover/item:scale-125 transition-transform"></i>
                                        <span class="text-slate-300 font-medium"><?= $item ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="group">
                                <h4 class="text-emerald-400 font-black text-xl mb-8 flex items-center gap-4 group-hover:translate-x-2 transition-transform">
                                    <span class="w-10 h-10 rounded-full bg-emerald-400/10 flex items-center justify-center text-sm italic">02</span>
                                    Skill Development
                                </h4>
                                <ul class="space-y-5">
                                    <?php $items = ["Vocational training programs", "Hands-on practical experience"]; 
                                    foreach($items as $item): ?>
                                    <li class="flex items-center gap-4 p-4 rounded-2xl hover:bg-white/5 transition-colors border border-transparent hover:border-white/10 group/item">
                                        <i class="fas fa-circle-check text-emerald-500 text-lg group-hover/item:scale-125 transition-transform"></i>
                                        <span class="text-slate-300 font-medium"><?= $item ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="space-y-16">
                            <div class="group">
                                <h4 class="text-violet-400 font-black text-xl mb-8 flex items-center gap-4 group-hover:translate-x-2 transition-transform">
                                    <span class="w-10 h-10 rounded-full bg-violet-400/10 flex items-center justify-center text-sm italic">03</span>
                                    Community Empowerment
                                </h4>
                                <ul class="space-y-5">
                                    <?php $items = ["Women empowerment programs", "Rural development activities"]; 
                                    foreach($items as $item): ?>
                                    <li class="flex items-center gap-4 p-4 rounded-2xl hover:bg-white/5 transition-colors border border-transparent hover:border-white/10 group/item">
                                        <i class="fas fa-circle-check text-violet-500 text-lg group-hover/item:scale-125 transition-transform"></i>
                                        <span class="text-slate-300 font-medium"><?= $item ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="group">
                                <h4 class="text-orange-400 font-black text-xl mb-8 flex items-center gap-4 group-hover:translate-x-2 transition-transform">
                                    <span class="w-10 h-10 rounded-full bg-orange-400/10 flex items-center justify-center text-sm italic">04</span>
                                    Environment
                                </h4>
                                <ul class="space-y-5">
                                    <?php $items = ["Biodiversity conservation", "Sustainable resource management"]; 
                                    foreach($items as $item): ?>
                                    <li class="flex items-center gap-4 p-4 rounded-2xl hover:bg-white/5 transition-colors border border-transparent hover:border-white/10 group/item">
                                        <i class="fas fa-circle-check text-orange-500 text-lg group-hover/item:scale-125 transition-transform"></i>
                                        <span class="text-slate-300 font-medium"><?= $item ?></span>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>