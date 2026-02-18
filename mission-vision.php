<?php
$page_title = "Mission & Vision | Neel Foundation";
$active = "mission-vision";
include 'includes/header.php';
?>

<style>
    .gradient-hero-mission {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
    }
    .pillar-card:hover i {
        transform: translateY(-5px) scale(1.1);
    }
    .img-stack-effect::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border: 2px solid #3b82f6;
        border-radius: 3rem;
        top: 20px;
        left: 20px;
        z-index: -1;
    }
    /* Smooth floating animation for hero elements */
    .hero-float {
        animation: heroFloat 4s ease-in-out infinite;
    }
    @keyframes heroFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
</style>

<main class="bg-slate-50">
    <section class="py-28 lg:py-40 gradient-hero-mission text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
                <circle cx="50" cy="50" r="40" stroke="white" stroke-width="0.1" />
                <circle cx="50" cy="50" r="30" stroke="white" stroke-width="0.1" />
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.3em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full animate__animated animate__fadeInDown hero-float">
                Our Foundation
            </span>
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none animate__animated animate__fadeIn">
                Mission & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Vision</span>
            </h1>
            <p class="text-xl md:text-2xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                Our guiding principles and aspirations for a sustainable, empowered future.
            </p>
        </div>
    </section>

    <section class="py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 space-y-48">
            
            <div class="flex flex-col lg:flex-row items-center gap-20 animate-on-scroll" data-animate="animate__fadeInLeft">
                <div class="lg:w-1/2">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-blue-600 font-black text-6xl opacity-20 italic">01.</span>
                        <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
                        <span class="text-blue-600 font-bold uppercase tracking-widest text-sm">The Mission</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight">"To empower through <span class="text-blue-600">sustainable innovation</span>."</h2>
                    <p class="text-xl text-slate-600 leading-relaxed mb-10 italic border-l-4 border-blue-100 pl-6">
                        We strive to provide quality education, training, and support to individuals and communities, enabling them to achieve self-sufficiency.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-4 p-5 bg-white rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-all hover:-translate-y-1">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-blue-600"></i>
                            </div>
                            <span class="font-bold text-slate-800">Quality Education</span>
                        </div>
                        <div class="flex items-center gap-4 p-5 bg-white rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-all hover:-translate-y-1">
                            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-seedling text-emerald-600"></i>
                            </div>
                            <span class="font-bold text-slate-800">Sustainability</span>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 relative animate-on-scroll" data-animate="animate__fadeInRight">
                    <div class="img-stack-effect relative">
                        <div class="absolute -top-10 -right-10 w-72 h-72 bg-blue-400 rounded-full blur-[100px] opacity-20"></div>
                        <img src="images/mission.png" class="rounded-[3rem] shadow-2xl w-full h-[450px] object-cover relative z-10 hover:scale-[1.02] transition-transform duration-700" alt="Mission" onerror="this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1000'">
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row-reverse items-center gap-20 animate-on-scroll" data-animate="animate__fadeInRight">
                <div class="lg:w-1/2">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-emerald-500 font-black text-6xl opacity-20 italic">02.</span>
                        <div class="w-12 h-1 bg-emerald-500 rounded-full"></div>
                        <span class="text-emerald-500 font-bold uppercase tracking-widest text-sm">The Vision</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight">"Creating <span class="text-emerald-500">thrive-ready</span> model communities."</h2>
                    <p class="text-xl text-slate-600 leading-relaxed mb-10 italic border-l-4 border-emerald-100 pl-6">
                        Every individual should have access to quality education and the resources needed to reach their full potential in harmony with nature.
                    </p>
                    <div class="bg-emerald-500 p-8 rounded-[2.5rem] shadow-xl shadow-emerald-100 text-white relative overflow-hidden group hover:scale-[1.02] transition-transform duration-500">
                        <i class="fas fa-quote-right absolute top-4 right-8 text-6xl text-white/10 group-hover:scale-110 transition-transform"></i>
                        <h4 class="font-black text-xl mb-3">Excellence & Impact</h4>
                        <p class="text-emerald-50 opacity-90 leading-relaxed">Strive for measurable and lasting positive change in every community we touch, setting a global standard for blue-economy social models.</p>
                    </div>
                </div>
                <div class="lg:w-1/2 relative animate-on-scroll" data-animate="animate__fadeInLeft">
                    <div class="relative">
                        <div class="absolute -bottom-10 -left-10 w-72 h-72 bg-emerald-400 rounded-full blur-[100px] opacity-20"></div>
                        <img src="images/vision.png" class="rounded-[3rem] shadow-2xl w-full h-[450px] object-cover relative z-10 hover:scale-[1.02] transition-transform duration-700" alt="Vision" onerror="this.src='https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80&w=1000'">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="py-32 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20 animate-on-scroll" data-animate="animate__fadeInUp">
                <span class="text-blue-600 font-bold uppercase tracking-widest text-xs">The Neelkranti Ethos</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mt-4 tracking-tight">Our Core Pillars</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto mt-6 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 lg:gap-10">
                <?php 
                $vals = [
                    ['icon' => 'fa-handshake', 'col' => 'blue', 'label' => 'Integrity', 'delay' => '0.1s'],
                    ['icon' => 'fa-leaf', 'col' => 'emerald', 'label' => 'Nature', 'delay' => '0.2s'],
                    ['icon' => 'fa-users', 'col' => 'violet', 'label' => 'Unity', 'delay' => '0.3s'],
                    ['icon' => 'fa-lightbulb', 'col' => 'orange', 'label' => 'Innovation', 'delay' => '0.4s'],
                    ['icon' => 'fa-heart', 'col' => 'rose', 'label' => 'Empathy', 'delay' => '0.5s'],
                    ['icon' => 'fa-trophy', 'col' => 'indigo', 'label' => 'Quality', 'delay' => '0.6s']
                ];
                foreach ($vals as $v): ?>
                <div class="text-center group pillar-card animate-on-scroll" 
                     data-animate="animate__zoomIn" 
                     style="animation-delay: <?= $v['delay'] ?>;">
                    <div class="w-24 h-24 mx-auto bg-slate-50 rounded-[2rem] flex items-center justify-center mb-6 border border-slate-100 group-hover:bg-<?= $v['col'] ?>-600 transition-all duration-500 shadow-sm group-hover:shadow-xl group-hover:shadow-<?= $v['col'] ?>-200">
                        <i class="fas <?= $v['icon'] ?> text-<?= $v['col'] ?>-600 text-3xl group-hover:text-white transition-all duration-500"></i>
                    </div>
                    <span class="font-black text-slate-900 uppercase tracking-widest text-[10px]"><?= $v['label'] ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>