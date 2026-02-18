<?php
$page_title = "Achievements | Neel Foundation";
$active = "achievements";
include 'includes/header.php';
?>

<style>
    .gradient-hero-achievements {
        background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
    }
    .achievement-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .achievement-card:hover {
        transform: translateX(10px);
    }
    .stat-glow {
        text-shadow: 0 0 20px rgba(37, 99, 235, 0.2);
    }
    /* Shimmer effect for buttons */
    .shimmer {
        position: relative;
        overflow: hidden;
    }
    .shimmer::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }
    @keyframes shimmer {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }
</style>

<main class="bg-slate-50">
    <section class="relative py-28 lg:py-40 overflow-hidden gradient-hero-achievements text-white">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.3em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full animate__animated animate__fadeInDown">
                Our Track Record
            </span>
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none text-balance animate__animated animate__fadeIn">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Achievements</span>
            </h1>
            <p class="text-xl md:text-2xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed animate__animated animate__fadeInUp animate__delay-1s">
                Celebrating our milestones and the measurable positive impact we have created for the community.
            </p>
        </div>
    </section>

    <section class="py-12 -mt-20 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/95 backdrop-blur-md rounded-[3rem] shadow-2xl p-10 md:p-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 border border-white/50 animate-on-scroll" data-animate="animate__fadeInUp">
                
                <div class="text-center group">
                    <div class="text-5xl font-black text-blue-600 mb-3 group-hover:scale-110 transition-transform stat-glow">500+</div>
                    <div class="text-slate-500 uppercase tracking-widest text-[10px] font-black">Students Trained</div>
                </div>
                
                <div class="text-center group border-slate-100 md:border-l">
                    <div class="text-5xl font-black text-emerald-600 mb-3 group-hover:scale-110 transition-transform">50+</div>
                    <div class="text-slate-500 uppercase tracking-widest text-[10px] font-black">Programs Conducted</div>
                </div>
                
                <div class="text-center group border-slate-100 md:border-l">
                    <div class="text-5xl font-black text-violet-600 mb-3 group-hover:scale-110 transition-transform">1000+</div>
                    <div class="text-slate-500 uppercase tracking-widest text-[10px] font-black">Lives Impacted</div>
                </div>
                
                <div class="text-center group border-slate-100 md:border-l">
                    <div class="text-5xl font-black text-amber-600 mb-3 group-hover:scale-110 transition-transform">15+</div>
                    <div class="text-slate-500 uppercase tracking-widest text-[10px] font-black">Years of Service</div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50 overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20 animate-on-scroll" data-animate="animate__fadeInUp">
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-4 tracking-tight">Major Milestones</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="space-y-12 relative">
                <div class="absolute left-12 top-0 bottom-0 w-px bg-slate-200 hidden md:block"></div>

                <?php 
                $achievements = [
                    ['icon' => 'fa-trophy', 'col' => 'blue', 'year' => '2023', 'title' => 'National Recognition for Excellence', 'desc' => 'Awarded by the Ministry of Fisheries for outstanding contribution to fisheries education and training.', 'tags' => ['National Award', 'Education'], 'delay' => '0.1s'],
                    ['icon' => 'fa-medal', 'col' => 'emerald', 'year' => 'Active', 'title' => '100+ Community Projects', 'desc' => 'Completed projects across 5 states, impacting more than 50,000 lives directly and indirectly.', 'tags' => ['Community', 'Impact'], 'delay' => '0.2s'],
                    ['icon' => 'fa-award', 'col' => 'violet', 'year' => '2022', 'title' => 'Research Excellence Award', 'desc' => 'Received from the Indian Council of Agricultural Research (ICAR) for contributions to fisheries research.', 'tags' => ['Research', 'ICAR'], 'delay' => '0.3s'],
                    ['icon' => 'fa-star', 'col' => 'amber', 'year' => 'Innovation', 'title' => 'Sustainable Aquaculture', 'desc' => 'Developed innovative practices adopted by over 200 fish farmers nationwide.', 'tags' => ['Sustainability', 'Innovation'], 'delay' => '0.4s']
                ];
                
                foreach ($achievements as $a): 
                    $c = $a['col'];
                ?>
                <div class="achievement-card group bg-white p-8 md:p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100 flex flex-col md:flex-row gap-10 items-center relative z-10 animate-on-scroll" 
                     data-animate="animate__fadeInLeft" 
                     style="animation-delay: <?= $a['delay'] ?>;">
                    
                    <div class="w-20 h-20 bg-<?= $c ?>-600 text-white rounded-[1.5rem] flex items-center justify-center flex-shrink-0 group-hover:rotate-6 transition-transform shadow-lg shadow-<?= $c ?>-200">
                        <i class="fas <?= $a['icon'] ?> text-3xl"></i>
                    </div>
                    
                    <div class="flex-grow">
                        <div class="flex flex-wrap items-center gap-4 mb-4">
                            <span class="text-[10px] font-black uppercase tracking-widest text-white bg-<?= $c ?>-600 px-3 py-1.5 rounded-lg"><?= $a['year'] ?></span>
                            <h3 class="text-2xl font-black text-slate-900 tracking-tight group-hover:text-blue-700 transition-colors"><?= $a['title'] ?></h3>
                        </div>
                        <p class="text-slate-600 text-lg leading-relaxed mb-6 italic border-l-2 border-slate-100 pl-4"><?= $a['desc'] ?></p>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach ($a['tags'] as $tag): ?>
                                <span class="bg-slate-50 text-slate-500 text-[10px] font-black px-4 py-1.5 rounded-xl border border-slate-100 uppercase tracking-tighter hover:bg-<?= $c ?>-50 transition-colors"><?= $tag ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="gradient-hero-achievements rounded-[4rem] p-12 md:p-24 text-center relative overflow-hidden shadow-2xl animate-on-scroll" data-animate="animate__zoomIn">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
                
                <div class="relative z-10">
                    <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">Be Part of Our Success Story</h2>
                    <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto leading-relaxed">Your support enables us to reach more communities and set new records in sustainable development.</p>
                    
                    <div class="flex flex-wrap justify-center gap-6">
                        <a href="membership_apply.php" class="shimmer bg-white text-blue-900 px-12 py-5 rounded-2xl font-black shadow-xl hover:scale-105 transition-all duration-300">
                            Join Our Community
                        </a>
                        <a href="donation_apply.php" class="bg-emerald-500 text-white px-12 py-5 rounded-2xl font-black shadow-xl hover:bg-emerald-600 hover:scale-105 transition-all duration-300">
                            Support Mission
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>