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

<style>
    .gradient-bg-pro {
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
    }
    .text-balance {
        text-wrap: balance;
    }
    .image-mask {
        mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
    }
    .float-anim {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    /* Subtle text shine effect */
    .shine-text {
        background: linear-gradient(to right, #fff 20%, #93c5fd 40%, #93c5fd 60%, #fff 80%);
        background-size: 200% auto;
        color: #fff;
        background-clip: text;
        text-fill-color: transparent;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 5s linear infinite;
    }
    @keyframes shine {
        to { background-position: 200% center; }
    }
</style>

<main class="bg-slate-50">

<section class="relative py-28 lg:py-40 overflow-hidden gradient-bg-pro text-white">
    <div class="absolute inset-0 opacity-20">
        <svg class="w-full h-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" stroke="white" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#grid)" />
        </svg>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-blue-200 uppercase bg-white/10 border border-white/20 rounded-full animate__animated animate__fadeInDown">
            Established for Excellence
        </span>
        <h1 class="text-5xl md:text-8xl font-black mb-8 tracking-tighter text-balance leading-none shine-text animate__animated animate__fadeIn">
            <?= e($about['hero_title'], 'About Neelkranti Foundation') ?>
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-blue-100 leading-relaxed font-light animate__animated animate__fadeInUp animate__delay-1s">
            <?= e($about['hero_subtitle'], 'A dedicated organization working towards social welfare, sustainable development, and community empowerment.') ?>
        </p>
    </div>
</section>

<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <div class="order-2 lg:order-1 animate-on-scroll" data-animate="animate__fadeInLeft">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-[2px] bg-blue-600"></div>
                    <span class="text-blue-600 font-black uppercase tracking-widest text-xs">Our Legacy</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">
                    <?= e($about['story_heading'], 'Our Story') ?>
                </h2>

                <div class="space-y-6 text-slate-600 text-lg leading-relaxed mb-12 border-l-4 border-slate-100 pl-6 italic">
                    <p><?= e($about['story_p1']) ?></p>
                    <p><?= e($about['story_p2']) ?></p>
                    <p><?= e($about['story_p3']) ?></p>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <?php 
                    $stats = [
                        ['val' => 'stat1_value', 'lab' => 'stat1_label', 'col' => 'text-blue-600', 'bg' => 'bg-blue-50', 'delay' => '0s'],
                        ['val' => 'stat2_value', 'lab' => 'stat2_label', 'col' => 'text-emerald-600', 'bg' => 'bg-emerald-50', 'delay' => '0.1s'],
                        ['val' => 'stat3_value', 'lab' => 'stat3_label', 'col' => 'text-violet-600', 'bg' => 'bg-violet-50', 'delay' => '0.2s'],
                        ['val' => 'stat4_value', 'lab' => 'stat4_label', 'col' => 'text-amber-600', 'bg' => 'bg-amber-50', 'delay' => '0.3s'],
                    ];
                    foreach ($stats as $s): ?>
                    <div class="<?= $s['bg'] ?> p-8 rounded-3xl group hover:-translate-y-2 hover:shadow-xl transition-all duration-300 animate-on-scroll" 
                         style="animation-delay: <?= $s['delay'] ?>;">
                        <div class="text-4xl font-black <?= $s['col'] ?> mb-2 group-hover:scale-110 transition-transform inline-block">
                            <?= e($about[$s['val']], '0') ?>
                        </div>
                        <div class="text-slate-500 font-bold uppercase text-[10px] tracking-[0.2em]">
                            <?= e($about[$s['lab']]) ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="order-1 lg:order-2 relative px-6 animate-on-scroll" data-animate="animate__fadeInRight">
                <div class="relative z-10">
                    <?php if (!empty($about['about_image1'])): ?>
                        <div class="relative rounded-[3rem] overflow-hidden shadow-2xl float-anim">
                            <img src="<?= e($about['about_image1']) ?>" class="w-full object-cover h-[450px] transition-transform duration-700 hover:scale-105" alt="About Image 1">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent"></div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($about['about_image2'])): ?>
                        <div class="absolute -bottom-12 -right-6 w-2/3 rounded-[2rem] overflow-hidden shadow-2xl border-[10px] border-white hidden md:block hover:rotate-2 transition-transform duration-500">
                            <img src="<?= e($about['about_image2']) ?>" class="w-full object-cover h-64" alt="About Image 2">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[110%] h-[110%] border-2 border-dashed border-slate-200 rounded-full z-0 animate-[spin_20s_linear_infinite]"></div>
            </div>
        </div>
    </div>
</section>

<section class="py-32 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="group bg-white p-12 rounded-[3rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 relative overflow-hidden animate-on-scroll" data-animate="animate__fadeInUp">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-[5rem] -z-0 transition-transform group-hover:scale-125 group-hover:bg-blue-100"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-200 group-hover:rotate-12 transition-transform">
                        <i class="fas fa-bullseye text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-black text-slate-900 mb-6 tracking-tight">Our Mission</h3>
                    <p class="text-slate-600 text-lg leading-relaxed"><?= e($about['mission_text']) ?></p>
                </div>
            </div>

            <div class="group bg-white p-12 rounded-[3rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 relative overflow-hidden animate-on-scroll" data-animate="animate__fadeInUp" style="animation-delay: 0.2s;">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-bl-[5rem] -z-0 transition-transform group-hover:scale-125 group-hover:bg-emerald-100"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-emerald-500 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-emerald-200 group-hover:rotate-12 transition-transform">
                        <i class="fas fa-eye text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-black text-slate-900 mb-6 tracking-tight">Our Vision</h3>
                    <p class="text-slate-600 text-lg leading-relaxed"><?= e($about['vision_text']) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 animate-on-scroll" data-animate="animate__zoomIn">
        <div class="gradient-bg-pro rounded-[4rem] p-12 md:p-24 text-center relative overflow-hidden shadow-2xl">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="relative z-10">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter">Ready to make a difference?</h2>
                <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto leading-relaxed">Join the Neelkranti Foundation and help us empower communities across the nation through innovation and sustainability.</p>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="membership_apply.php" class="bg-white text-blue-700 px-12 py-5 rounded-2xl font-black shadow-xl hover:scale-105 transition-all duration-300">
                        Become a Member
                    </a>
                    <a href="contact.php" class="border-2 border-white/30 backdrop-blur-md px-12 py-5 rounded-2xl font-bold text-white hover:bg-white/10 transition-all">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>