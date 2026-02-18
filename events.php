<?php
$page_title = "Events & Activities | Neelkranti Foundation";
$active = "events";

include 'includes/db.php';
include 'includes/header.php';
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    .event-card {
        @apply bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-100/50 hover:-translate-y-2;
    }
    .date-badge {
        @apply absolute top-6 left-6 bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl text-center shadow-lg z-10;
    }
</style>

<main class="bg-slate-50 min-h-screen">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Community & Impact</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Our <span class="text-blue-400">Events</span></h1>
            <p class="text-xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed">
                Explore our latest workshops, seminars, and field activities dedicated to empowering the fisheries sector.
            </p>
        </div>
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-[50px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C49.1,15.46,105.56,27.31,161.07,38.39,228,51.7,294.5,61.46,321.39,56.44Z" fill="#f8fafc"></path>
            </svg>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <?php
            $res = $conn->query("SELECT * FROM events ORDER BY id DESC");
            if ($res->num_rows == 0):
            ?>
                <div class="text-center py-20 bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-times text-slate-300 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-400">No events scheduled at the moment.</h3>
                    <p class="text-slate-500 mt-2">Check back soon for upcoming programs and training sessions.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <?php while ($row = $res->fetch_assoc()): ?>
                        <article class="event-card group">
                            <div class="relative h-72 overflow-hidden bg-slate-200">
                                <?php if ($row['photo']): ?>
                                    <img src="uploads/<?= $row['photo'] ?>" 
                                         alt="<?= htmlspecialchars($row['title']) ?>" 
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center bg-slate-100">
                                        <i class="fas fa-image text-slate-300 text-5xl"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="absolute bottom-6 left-6">
                                    <span class="bg-blue-600 text-white px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg">
                                        Program
                                    </span>
                                </div>
                            </div>

                            <div class="p-10">
                                <h3 class="text-2xl font-black text-slate-900 mb-4 tracking-tight leading-tight group-hover:text-blue-600 transition-colors">
                                    <?= htmlspecialchars($row['title']) ?>
                                </h3>
                                
                                <p class="text-slate-500 mb-8 leading-relaxed line-clamp-3">
                                    <?= substr(strip_tags($row['description']), 0, 150) ?>...
                                </p>

                                <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                                    <a href="#" class="inline-flex items-center gap-2 text-blue-600 font-bold text-sm group/link">
                                        View Details 
                                        <i class="fas fa-arrow-right text-xs transition-transform group-hover/link:translate-x-1"></i>
                                    </a>
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200"></div>
                                        <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-300"></div>
                                        <div class="w-8 h-8 rounded-full border-2 border-white bg-blue-100 flex items-center justify-center">
                                            <span class="text-[10px] font-bold text-blue-600">+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="pb-24">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-slate-900 rounded-[3.5rem] p-12 md:p-16 text-center text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <h2 class="text-3xl md:text-4xl font-black mb-6 tracking-tighter leading-tight">Want to stay updated <br> on future events?</h2>
                <p class="text-slate-400 mb-8 max-w-xl mx-auto">Follow our social media channels or contact us to be added to our announcement broadcast list.</p>
                
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="contact.php" class="bg-blue-600 text-white px-8 py-4 rounded-2xl font-black hover:bg-blue-700 transition-all flex items-center gap-2">
                        <i class="fas fa-envelope"></i> Contact Us
                    </a>
                    <a href="#" class="bg-white/10 text-white border border-white/20 backdrop-blur-md px-8 py-4 rounded-2xl font-black hover:bg-white/20 transition-all flex items-center gap-2">
                        <i class="fab fa-facebook-f"></i> Follow Activity
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>