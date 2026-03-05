<?php
$page_title = "Awards | Neelkranti Foundation";
$active = "awards";

include 'includes/header.php';
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }

    /* Enhanced Animation Classes */
    .reveal {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
        transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform, opacity;
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* Award Card - Balanced Grid Fix */
    .award-card {
        @apply bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 transition-all duration-500 relative flex flex-col h-full;
    }
    .award-card:hover {
        @apply -translate-y-4 shadow-[0_30px_60px_-15px_rgba(30,64,175,0.2)] border-blue-200;
    }
    
    /* Decorative Golden Badge */
    .award-badge {
        @apply absolute top-6 right-6 z-20 w-12 h-12 bg-amber-400/20 backdrop-blur-md rounded-full flex items-center justify-center text-amber-600 border border-amber-400/30 transition-transform duration-500;
    }
    .award-card:hover .award-badge {
        @apply rotate-[360deg] scale-110 bg-amber-400 text-white;
    }

    /* Floating animation for icons */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .float-icon {
        animation: float 4s ease-in-out infinite;
    }

    /* Content push to bottom fix */
    .card-body {
        @apply p-10 flex flex-col flex-grow;
    }
    .card-footer {
        @apply mt-auto pt-6;
    }
</style>

<main class="bg-slate-50 overflow-hidden">

    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-full opacity-10">
            <svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,149.3C672,149,768,203,864,213.3C960,224,1056,192,1152,165.3C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 text-center relative z-10 reveal active">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">National Recognition</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">
                Neelkranti <span class="text-blue-400">Awards</span>
            </h1>
            <p class="text-xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed">
                Honouring the pioneers, innovators, and silent heroes of the blue revolution. We recognize exceptional contributions to fisheries, community welfare, and aquatic conservation.
            </p>
        </div>
    </section>

    <section class="py-20 -mt-16 relative z-20 reveal">
        <div class="max-w-7xl mx-auto px-4 tracking-tighter">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-200/50 reveal">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-file-signature text-xl"></i>
                    </div>
                    <h4 class="font-black text-slate-900 mb-2">Nomination</h4>
                    <p class="text-sm text-slate-500">Candidates can self-nominate or be recommended by peers and institutions.</p>
                </div>
                <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-200/50 reveal" style="transition-delay: 0.1s">
                    <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-search text-xl"></i>
                    </div>
                    <h4 class="font-black text-slate-900 mb-2">Verification</h4>
                    <p class="text-sm text-slate-500">Our expert committee reviews the impact and sustainability of the work submitted.</p>
                </div>
                <div class="bg-white p-8 rounded-[2rem] shadow-xl shadow-slate-200/50 reveal" style="transition-delay: 0.2s">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-trophy text-xl"></i>
                    </div>
                    <h4 class="font-black text-slate-900 mb-2">Conferment</h4>
                    <p class="text-sm text-slate-500">Awards are presented during our annual foundation ceremony with national honors.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">

            <div class="text-center mb-20 reveal">
                <h2 class="text-4xl md:text-6xl font-black text-slate-900 mb-6 tracking-tighter italic">
                    Award <span class="text-blue-600">Categories</span>
                </h2>
                <div class="flex justify-center items-center gap-3 mb-8">
                    <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-amber-400 rounded-full animate-ping"></div>
                    <div class="w-12 h-1 bg-blue-600 rounded-full"></div>
                </div>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg font-medium leading-relaxed">
                    Recognizing excellence across the blue economy—from grassroots conservation to high-tech industrial innovation.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

                <?php
                $awards = [
                    ["Fisheries Social Welfare", "Aadarsh Matsya Samaj Ratna", "fa-hands-helping"],
                    ["Fisheries Education", "Aadarsh Matsya Shikshan Ratna", "fa-book-open"],
                    ["Best Fish Farmer", "Aadarshya Matsya Shetkari Ratna", "fa-water"],
                    ["Best Fisheries Organizer", "Aadarsh Matsya Sanghatan Ratna", "fa-users"],
                    ["Fisheries Industries", "Aadarsh Matsya Udyog Ratna", "fa-industry"],
                    ["Water Conservation", "Aadarsh Jal Ratna", "fa-tint"],
                    ["Fish Conservation", "Aadarsh Matsya Samvardhan Ratna", "fa-fish"],
                    ["Fish Co-operatives", "Aadarshya Matsya Sahkar Ratna", "fa-handshake"],
                    ["Best Fisheries Students", "Aadarshya Matsya Shishya Ratna", "fa-user-graduate"],
                    ["Best Fisheries Teacher", "Aadarsh Matsya Guru", "fa-chalkboard-teacher"],
                    ["Best Fisheries Researcher", "Aadarshya Matsya Sanshodhak Ratna", "fa-microscope"],
                    ["Best Fisheries College", "Aadarshya Matsya Gurukul", "fa-university"],
                    ["Fisheries Women Empowerment", "Aadarsh Matsya Shakti Kanya", "fa-female"]
                ];

                $delay = 0.05;
                foreach ($awards as $award):
                ?>

                <div class="award-card group reveal h-full flex flex-col bg-white rounded-[2.5rem] border border-slate-200/60 shadow-sm hover:shadow-2xl hover:shadow-blue-500/10 transition-all duration-500 overflow-hidden" 
                    style="transition-delay:<?= $delay ?>s">
                    
                    <div class="relative h-52 overflow-hidden bg-slate-900">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/90 to-indigo-900 group-hover:scale-110 transition-transform duration-700"></div>
                        
                        <div class="absolute -top-20 -right-20 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl group-hover:bg-blue-400/40 transition-colors"></div>

                        <div class="relative z-10 h-full flex flex-col items-center justify-center p-6">
                            <div class="float-icon bg-white/10 backdrop-blur-md border border-white/20 w-24 h-24 rounded-3xl flex items-center justify-center shadow-2xl">
                                <i class="fas <?= $award[2] ?> text-4xl text-white group-hover:scale-110 transition-transform"></i>
                            </div>
                            <div class="mt-4 inline-flex items-center gap-1.5 px-3 py-1 bg-amber-400/90 rounded-full shadow-lg shadow-amber-900/20">
                                <i class="fas fa-certificate text-[10px] text-amber-900"></i>
                                <span class="text-[10px] font-black text-amber-950 uppercase tracking-tighter">Foundation Excellence</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-10 flex flex-col flex-grow">
                        <div class="mb-4">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-lg">
                                <?= $award[0] ?>
                            </span>
                        </div>

                        <h3 class="text-2xl font-black text-slate-900 mb-6 leading-tight flex-grow group-hover:text-blue-600 transition-colors">
                            <?= $award[1] ?>
                        </h3>

                        <div class="pt-6 border-t border-slate-100 mt-auto">
                            <a href="contact.php" class="flex items-center justify-between w-full group/btn">
                                <span class="font-black text-slate-900 group-hover/btn:text-blue-600 transition-colors">Nominate Now</span>
                                <div class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center group-hover/btn:bg-blue-600 group-hover/btn:rotate-[360deg] transition-all duration-500 shadow-lg shadow-slate-200">
                                    <i class="fas fa-arrow-right text-sm"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                $delay += 0.05;
                // Prevent too much delay on lower cards
                if ($delay > 0.4) $delay = 0.1;
                endforeach;
                ?>

            </div>
        </div>
    </section>

    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 text-center relative z-10 reveal">
            <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 px-4 py-2 rounded-full text-xs font-black mb-6">
                <i class="fas fa-bullhorn"></i> NOMINATIONS OPEN
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-slate-900 mb-8 tracking-tighter">
                Know Someone <br><span class="text-blue-600">Making Waves?</span>
            </h2>

            <p class="text-slate-500 max-w-2xl mx-auto mb-10 text-lg">
                If you know an individual or organization making remarkable contributions to fisheries and community development, encourage them to submit their profile today.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="contact.php" class="bg-slate-900 text-white px-10 py-5 rounded-2xl font-black hover:bg-blue-600 transition-all shadow-xl hover:-translate-y-1">
                    Submit Application
                </a>
                <a href="tel:+919284476047" class="bg-white text-slate-900 border border-slate-200 px-10 py-5 rounded-2xl font-black hover:bg-slate-50 transition-all shadow-sm">
                    Inquire via Call
                </a>
            </div>
        </div>
        
        <i class="fas fa-award absolute -bottom-20 -right-20 text-[20rem] text-slate-100 -rotate-12 opacity-50"></i>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
</script>

<?php include 'includes/footer.php'; ?>