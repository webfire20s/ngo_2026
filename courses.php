<?php
$page_title = "Courses | Neelkranti Foundation";
$active = "courses";

include 'includes/db.php';
include 'includes/header.php';

// Logic preserved: Fetching active courses
$courses = $conn->query("SELECT * FROM courses WHERE status = 1 ORDER BY id DESC");
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    
    /* Animation Base Classes */
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    .hover-scale {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hover-scale:hover {
        transform: translateY(-12px);
    }
    .course-card {
        @apply bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-100/50;
    }
    .category-btn {
        @apply px-8 py-3 rounded-2xl font-bold transition-all duration-300 border-2;
    }
    .category-btn.active {
        @apply bg-blue-600 border-blue-600 text-white shadow-lg shadow-blue-200;
    }
    .category-btn.inactive {
        @apply bg-white border-slate-100 text-slate-500 hover:border-blue-200 hover:text-blue-600;
    }
</style>

<main class="bg-slate-50">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10 reveal active">
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Skill <span class="text-blue-400">Development</span></h1>
            <p class="text-xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed">
                Comprehensive training programs designed for sustainable livelihood and specialized skill development in fisheries and allied sectors.
            </p>
        </div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-[120px] -ml-48 -mt-48"></div>
    </section>

    <section class="py-16 bg-white border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4 reveal">
                <button class="category-btn active" data-category="all">All Programs</button>
                <button class="category-btn inactive" data-category="fisheries">Fisheries</button>
                <button class="category-btn inactive" data-category="aquaculture">Aquaculture</button>
                <button class="category-btn inactive" data-category="allied">Allied Sciences</button>
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10" id="courses-container">
                <?php if($courses->num_rows > 0): ?>
                    <?php 
                    $delay = 0;
                    while($course = $courses->fetch_assoc()): 
                    ?>
                    <div class="course-card hover-scale reveal" 
                         data-category="<?= strtolower($course['category']) ?>"
                         style="transition-delay: <?= $delay ?>s">
                        
                        <div class="h-56 bg-gradient-to-br from-blue-600 to-indigo-700 flex flex-col items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 opacity-10">
                                <svg width="100%" height="100%"><pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1" fill="white"/></pattern><rect width="100%" height="100%" fill="url(#pattern)"/></svg>
                            </div>
                            <i class="fas fa-book-open text-white/20 text-8xl absolute -right-4 -bottom-4"></i>
                            <div class="w-20 h-20 bg-white/10 backdrop-blur-md rounded-3xl flex items-center justify-center mb-4 border border-white/20 relative z-10">
                                <i class="fas fa-graduation-cap text-white text-3xl"></i>
                            </div>
                            <span class="bg-white/20 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1.5 rounded-full border border-white/20 relative z-10">
                                <?= htmlspecialchars($course['category']) ?>
                            </span>
                        </div>

                        <div class="p-10">
                            <h3 class="text-2xl font-black text-slate-900 mb-4 leading-tight">
                                <?= htmlspecialchars($course['course_title']) ?>
                            </h3>
                            <p class="text-slate-500 mb-8 line-clamp-3 leading-relaxed">
                                <?= nl2br(htmlspecialchars($course['course_description'])) ?>
                            </p>

                            <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                                <div class="flex flex-col">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Availability</span>
                                    <span class="text-emerald-600 font-bold text-sm flex items-center gap-2">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> Open for Admission
                                    </span>
                                </div>
                                <button onclick="window.location.href='contact.php'" class="bg-slate-900 hover:bg-blue-600 text-white w-12 h-12 rounded-2xl flex items-center justify-center transition-all duration-300 group">
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $delay += 0.1; // Increment delay for staggered entrance
                    endwhile; 
                    ?>
                <?php else: ?>
                    <div class="col-span-full py-20 text-center reveal">
                        <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-slate-300 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-400">No courses found currently.</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20 reveal">
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter mb-4">Why Train With Us?</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">We provide the ecosystem required to turn learning into a sustainable career.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="group reveal" style="transition-delay: 0.1s">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-certificate text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Certified Training</h3>
                    <p class="text-slate-500 leading-relaxed">Government recognized certificates upon successful completion of curriculum.</p>
                </div>
                
                <div class="group reveal" style="transition-delay: 0.2s">
                    <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-hands-helping text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Practical Exposure</h3>
                    <p class="text-slate-500 leading-relaxed">Hands-on training with real-world projects and direct field implementation visits.</p>
                </div>
                
                <div class="group reveal" style="transition-delay: 0.3s">
                    <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-briefcase text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Job Assistance</h3>
                    <p class="text-slate-500 leading-relaxed">Placement support and business incubation guidance for budding entrepreneurs.</p>
                </div>
                </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-slate-900 rounded-[3.5rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl reveal">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-[100px] -mr-32 -mt-32"></div>
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter leading-tight">Ready to Advance Your <br> Professional Skills?</h2>
                <div class="flex flex-col sm:flex-row justify-center gap-6 relative z-10">
                    <a href="membership_apply.php" class="bg-blue-600 text-white px-10 py-5 rounded-2xl font-black hover:bg-blue-700 hover:scale-105 transition-all shadow-xl shadow-blue-900/20">
                        Apply for Admission
                    </a>
                    <a href="contact.php" class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-10 py-5 rounded-2xl font-black hover:bg-white/20 transition-all">
                        Request Callback
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Filter Logic & Reveal Intersection Observer
document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Intersection Observer for scroll animations
    const observerOptions = { threshold: 0.1 };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    // 2. Filter Logic
    document.querySelectorAll('.category-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Update Buttons
            document.querySelectorAll('.category-btn').forEach(b => {
                b.classList.remove('active');
                b.classList.add('inactive');
            });
            btn.classList.add('active');
            btn.classList.remove('inactive');

            const category = btn.getAttribute('data-category');
            const cards = document.querySelectorAll('.course-card');

            cards.forEach(card => {
                // We reset animations when filtering to allow cards to re-animate
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                    setTimeout(() => { 
                        card.style.opacity = '1'; 
                        card.style.transform = 'translateY(0) scale(1)'; 
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px) scale(0.95)';
                    setTimeout(() => { card.style.display = 'none'; }, 300);
                }
            });
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>