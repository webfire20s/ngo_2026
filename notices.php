<?php
$page_title = "Official Notices | Neelkranti Foundation";
$active = "notices";

include 'includes/header.php';
include 'includes/db.php';
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    .notice-card {
        @apply bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-100/50 hover:-translate-y-2 flex flex-col;
    }
    .date-tag {
        @apply inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-xl text-xs font-bold uppercase tracking-wider mb-4;
    }
</style>

<main class="bg-slate-50 min-h-screen">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Official Bulletin</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Latest <span class="text-blue-400">Notices</span></h1>
            <p class="text-xl opacity-80 max-w-2xl mx-auto font-light leading-relaxed">
                Stay informed with the latest administrative updates, regulatory changes, and community announcements.
            </p>
        </div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-blue-500/10 blur-[120px] rounded-full"></div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            <?php
            // Logic preserved
            $res = $conn->query("SELECT * FROM notices ORDER BY id DESC");

            if ($res->num_rows == 0):
            ?>
                <div class="col-span-full text-center py-24 bg-white rounded-[3.5rem] border-2 border-dashed border-slate-200">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                        <i class="fas fa-bullhorn text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-400 tracking-tight">No active notices at this time.</h3>
                    <p class="text-slate-500 mt-2">Check back soon for more updates from Neelkranti Foundation.</p>
                </div>
            <?php
            endif;

            while ($row = $res->fetch_assoc()):
            ?>
                <article class="notice-card group">
                    <?php if (!empty($row['photo'])): ?>
                        <div class="relative h-56 overflow-hidden">
                            <img src="uploads/<?= htmlspecialchars($row['photo']) ?>"
                                 alt="<?= htmlspecialchars($row['title']) ?>"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent"></div>
                        </div>
                    <?php else: ?>
                        <div class="h-4 bg-blue-600 w-full"></div>
                    <?php endif; ?>

                    <div class="p-10 flex flex-col flex-grow">
                        <?php if (!empty($row['notice_date'])): ?>
                            <div class="date-tag">
                                <i class="far fa-calendar-alt"></i>
                                <?= date("d M Y", strtotime($row['notice_date'])) ?>
                            </div>
                        <?php endif; ?>

                        <h3 class="text-2xl font-black text-slate-900 mb-4 tracking-tight leading-tight group-hover:text-blue-600 transition-colors">
                            <?= htmlspecialchars($row['title']) ?>
                        </h3>

                        <p class="text-slate-500 leading-relaxed mb-8 flex-grow">
                            <?= substr(strip_tags($row['description']), 0, 140) ?>...
                        </p>

                        <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                            <a href="#" class="text-slate-900 font-bold text-sm uppercase tracking-widest flex items-center gap-2 group/link">
                                Read More
                                <i class="fas fa-chevron-right text-[10px] transition-transform group-hover/link:translate-x-1"></i>
                            </a>
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                <i class="fas fa-info text-[10px]"></i>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>

            </div>
        </div>
    </section>

    <section class="pb-24">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-blue-50 rounded-[2.5rem] p-10 flex flex-col md:flex-row items-center gap-8 border border-blue-100">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white flex-shrink-0 shadow-xl shadow-blue-200">
                    <i class="fas fa-question-circle text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-xl font-black text-slate-900 mb-1">Questions about a notice?</h4>
                    <p class="text-slate-500 text-sm">Our administrative team is available Monday to Friday, 10 AM to 6 PM for clarifications.</p>
                </div>
                <a href="contact.php" class="whitespace-nowrap px-8 py-4 bg-white text-slate-900 font-bold rounded-2xl border border-slate-200 hover:bg-slate-900 hover:text-white transition-all">
                    Contact Admin
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>