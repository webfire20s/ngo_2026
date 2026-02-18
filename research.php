<?php
$page_title = "Research | Neelkranti Foundation";
$active = "research";

include 'includes/db.php';
include 'includes/header.php';

// Logic preserved
$researches = $conn->query(
    "SELECT * FROM research WHERE status = 1 ORDER BY id DESC"
);
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    .research-card {
        @apply bg-white p-8 rounded-[2rem] border border-slate-100 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-100/50 hover:-translate-y-2;
    }
    .facility-pill {
        @apply flex items-start gap-4 p-6 bg-white rounded-3xl border border-slate-50 shadow-sm hover:shadow-md transition-all;
    }
    .project-badge {
        @apply px-4 py-1.5 rounded-full text-[11px] font-black uppercase tracking-widest border;
    }
</style>

<main class="bg-slate-50">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Scientific Excellence</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Research & <span class="text-blue-400">Consultancy</span></h1>
            <p class="text-xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed">
                Advancing the frontiers of aquatic science through rigorous methodology and innovative sustainable solutions.
            </p>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">Core Research Focus</h2>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="research-card">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-fish text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Fisheries Research</h3>
                    <p class="text-slate-500 leading-relaxed">Advanced research in fish breeding, genetics, and nutrition for high-yield sustainable aquaculture.</p>
                </div>
                
                <div class="research-card">
                    <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-water text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Aquaculture Systems</h3>
                    <p class="text-slate-500 leading-relaxed">Engineering recirculating (RAS) and integrated farming systems for resource optimization.</p>
                </div>
                
                <div class="research-card">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-flask text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Water Quality</h3>
                    <p class="text-slate-500 leading-relaxed">Environmental impact assessment and remediation studies for aquatic ecosystems.</p>
                </div>
                
                <div class="research-card">
                    <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-dna text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Fish Genetics</h3>
                    <p class="text-slate-500 leading-relaxed">Selective breeding programs to develop disease-resistant and fast-growing aquatic strains.</p>
                </div>
                
                <div class="research-card">
                    <div class="w-14 h-14 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-utensils text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Fish Nutrition</h3>
                    <p class="text-slate-500 leading-relaxed">Formulating cost-effective feeds using alternative proteins and bio-active supplements.</p>
                </div>
                
                <div class="research-card">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-shield-virus text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Fish Health</h3>
                    <p class="text-slate-500 leading-relaxed">Pioneering diagnostic methods and preventive strategies for aquatic disease management.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg width="100%" height="100%"><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5"/></pattern><rect width="100%" height="100%" fill="url(#grid)"/></svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <div>
                    <h3 class="text-3xl font-black mb-10 tracking-tight">Scholastic Support <br><span class="text-blue-400">M.Phil & PhD Programs</span></h3>
                    <div class="space-y-6">
                        <div class="bg-white/5 backdrop-blur-md p-8 rounded-3xl border border-white/10">
                            <h4 class="text-xl font-bold mb-2">Research Guidance</h4>
                            <p class="text-slate-400">Technical oversight for experimental design and high-level statistical data analysis.</p>
                        </div>
                        <div class="bg-white/5 backdrop-blur-md p-8 rounded-3xl border border-white/10">
                            <h4 class="text-xl font-bold mb-2">Laboratory Access</h4>
                            <p class="text-slate-400">Utilization of specialized equipment for histology, microbiology, and water chemistry.</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-3xl font-black mb-10 tracking-tight">Infrastructure <br><span class="text-blue-400">Research Ecosystem</span></h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-blue-600 p-8 rounded-3xl">
                            <i class="fas fa-microscope text-3xl mb-4"></i>
                            <h4 class="font-bold">Modern Lab</h4>
                            <p class="text-sm opacity-80 mt-2">ISO certified testing environments.</p>
                        </div>
                        <div class="bg-white/10 p-8 rounded-3xl border border-white/10">
                            <i class="fas fa-book text-3xl mb-4"></i>
                            <h4 class="font-bold">E-Library</h4>
                            <p class="text-sm opacity-60 mt-2">Access to global journal databases.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Scholarly Publications</h2>
                <p class="text-slate-500 mt-2">Knowledge shared with the global scientific community.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while($research = $researches->fetch_assoc()): ?>
                    <div class="group p-8 bg-slate-50 rounded-3xl hover:bg-blue-600 transition-all duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-blue-600 text-white group-hover:bg-white group-hover:text-blue-600 rounded-xl flex items-center justify-center transition-colors">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <span class="text-xs font-black uppercase tracking-widest text-slate-400 group-hover:text-white/80">Research Paper</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-white mb-4 line-clamp-2">
                            <?= htmlspecialchars($research['research_title']) ?>
                        </h3>
                        <p class="text-slate-500 group-hover:text-white/70 text-sm leading-relaxed mb-6">
                            <?= nl2br(htmlspecialchars($research['research_description'])) ?>
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-blue-600 group-hover:text-white font-bold text-sm">
                            Read Abstract <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white rounded-[3rem] p-12 lg:p-20 shadow-xl border border-slate-100">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">Consultancy Solutions</h2>
                    <p class="text-slate-500">Transforming research into profitable industrial outcomes.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="flex gap-6">
                        <div class="text-blue-600 text-2xl pt-1"><i class="fas fa-check-circle"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900 mb-2">Project Feasibility</h4>
                            <p class="text-sm text-slate-500">Techno-economic analysis for new ventures.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="text-blue-600 text-2xl pt-1"><i class="fas fa-check-circle"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900 mb-2">Technical Audit</h4>
                            <p class="text-sm text-slate-500">Troubleshooting and optimizing existing farms.</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="text-blue-600 text-2xl pt-1"><i class="fas fa-check-circle"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-900 mb-2">Market Analysis</h4>
                            <p class="text-sm text-slate-500">Strategic planning and export-ready guidance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-black text-slate-900 mb-12 tracking-tight">Active Research Portfolios</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100 group">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                        <span class="project-badge bg-blue-100 text-blue-600 border-blue-200">Bio-Feed Innovation</span>
                        <span class="text-xs font-bold text-slate-400 italic">ID: NF-RES-2023-04</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-blue-600 transition-colors">Development of Low-Cost Fish Feed</h3>
                    <p class="text-slate-500 mb-8 leading-relaxed">Pioneering nutritionally balanced feed using indigenous industrial by-products to reduce production costs by 30%.</p>
                    <div class="flex flex-wrap gap-8 pt-6 border-t border-slate-200">
                        <div><p class="text-[10px] font-black uppercase text-slate-400 mb-1">Duration</p><p class="font-bold text-sm">2023 - 2025</p></div>
                        <div><p class="text-[10px] font-black uppercase text-slate-400 mb-1">Funding Body</p><p class="font-bold text-sm">ICAR Supported</p></div>
                        <div><p class="text-[10px] font-black uppercase text-slate-400 mb-1">Status</p><p class="text-emerald-600 font-bold text-sm flex items-center gap-1"><span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span> Active</p></div>
                    </div>
                </div>

                <div class="bg-slate-50 p-10 rounded-[2.5rem] border border-slate-100 group">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                        <span class="project-badge bg-purple-100 text-purple-600 border-purple-200">Genomics</span>
                        <span class="text-xs font-bold text-slate-400 italic">ID: NF-RES-2022-09</span>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-blue-600 transition-colors">Genetic Improvement in Carps</h3>
                    <p class="text-slate-500 mb-8 leading-relaxed">Selective breeding program for enhancing growth phenotypes and immune resistance in Indian Major Carps.</p>
                    <div class="flex flex-wrap gap-8 pt-6 border-t border-slate-200">
                        <div><p class="text-[10px] font-black uppercase text-slate-400 mb-1">Duration</p><p class="font-bold text-sm">2022 - 2026</p></div>
                        <div><p class="text-[10px] font-black uppercase text-slate-400 mb-1">Funding Body</p><p class="font-bold text-sm">DST Commissioned</p></div>
                        <div><p class="text-[10px] font-black uppercase text-slate-400 mb-1">Status</p><p class="text-emerald-600 font-bold text-sm flex items-center gap-1"><span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span> Phase III</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-blue-600 rounded-[3rem] p-12 md:p-20 text-center text-white shadow-2xl shadow-blue-200">
                <h2 class="text-4xl md:text-5xl font-black mb-8 tracking-tighter">Initiate Collaboration</h2>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="contact.php" class="bg-white text-blue-600 px-10 py-5 rounded-2xl font-black hover:bg-slate-100 transition-all">Research Inquiry</a>
                    <a href="contact.php" class="bg-slate-900 text-white px-10 py-5 rounded-2xl font-black hover:bg-black transition-all">Request Consultancy</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>