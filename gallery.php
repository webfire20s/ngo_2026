<?php
$page_title = "Gallery | Neelkranti Foundation";
$active = "gallery";

include 'includes/db.php';
include 'includes/header.php';
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }

    /* Animation Base Classes */
    .reveal {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
        transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform, opacity;
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .gallery-item {
        @apply relative overflow-hidden rounded-[2rem] bg-slate-200 aspect-square group cursor-pointer border border-slate-100;
    }
    .gallery-overlay {
        @apply absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8;
    }

    /* Wave animation for the hero divider */
    @keyframes wave-flow {
        0% { transform: translateX(0); }
        50% { transform: translateX(-25%); }
        100% { transform: translateX(0); }
    }
    .hero-wave {
        animation: wave-flow 20s ease-in-out infinite;
    }
</style>

<main class="bg-slate-50 min-h-screen">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden text-center">
        <div class="max-w-7xl mx-auto px-4 relative z-10 reveal active">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Visual Journey</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Our <span class="text-blue-400">Gallery</span></h1>
            <p class="text-xl opacity-80 max-w-2xl mx-auto font-light leading-relaxed">
                Capturing moments of innovation, community engagement, and sustainable progress in the blue economy.
            </p>
        </div>
        
        <div class="absolute bottom-0 left-0 w-[200%] overflow-hidden leading-none hero-wave">
            <svg class="relative block w-full h-[40px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C49.1,15.46,105.56,27.31,161.07,38.39,228,51.7,294.5,61.46,321.39,56.44Z" fill="#f8fafc"></path>
            </svg>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            <?php
            $res = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
            if ($res->num_rows == 0):
            ?>
                <div class="col-span-full text-center py-20 bg-white rounded-[3rem] border-2 border-dashed border-slate-200 reveal">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                        <i class="fas fa-images text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-400">Your visual story starts here.</h3>
                    <p class="text-slate-500 mt-2">No images have been uploaded yet.</p>
                </div>
            <?php
            endif;

            $delay = 0;
            while ($row = $res->fetch_assoc()):
            ?>
                <div class="gallery-item group reveal" style="transition-delay: <?= $delay ?>s">
                    <img src="uploads/gallery/<?= $row['photo'] ?>" 
                         alt="<?= htmlspecialchars($row['title']) ?>"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    
                    <div class="gallery-overlay">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <span class="text-blue-400 text-[10px] font-black uppercase tracking-[0.2em] mb-2 block">Neelkranti Impact</span>
                            <h3 class="text-white text-xl font-bold tracking-tight">
                                <?= htmlspecialchars($row['title']) ?>
                            </h3>
                            <div class="mt-4 flex gap-2">
                                <span class="w-8 h-1 bg-blue-500 rounded-full transition-all duration-500 group-hover:w-16"></span>
                                <span class="w-2 h-1 bg-white/30 rounded-full"></span>
                            </div>
                        </div>
                    </div>

                    <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-x-4 group-hover:translate-x-0">
                        <div class="w-10 h-10 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/20 hover:bg-white hover:text-blue-600 transition-colors">
                            <i class="fas fa-expand-alt text-sm"></i>
                        </div>
                    </div>
                </div>
            <?php 
                $delay += 0.05; // Tight delay for a smooth cascading effect
                if($delay > 0.3) $delay = 0; // Reset delay periodically for massive grids
            endwhile; 
            ?>

            </div>
        </div>
    </section>

    <section class="pb-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="bg-white p-12 rounded-[3.5rem] shadow-sm border border-slate-100 inline-block w-full reveal">
                <h2 class="text-2xl font-black text-slate-900 mb-4 tracking-tight">Witness the Revolution Firsthand</h2>
                <p class="text-slate-500 mb-8 max-w-xl mx-auto text-sm leading-relaxed">
                    Our gallery is updated weekly with field visits, laboratory breakthroughs, and community training sessions. Stay connected via our social channels.
                </p>
                <div class="flex justify-center gap-6">
                    <a href="#" class="w-12 h-12 rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:scale-110 hover:-rotate-6 transition-all duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-blue-400 hover:text-white hover:scale-110 hover:-rotate-6 transition-all duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-12 h-12 rounded-2xl bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-rose-500 hover:text-white hover:scale-110 hover:rotate-6 transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
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