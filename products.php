<?php
$page_title = "Products | Neelkranti Foundation";
$active = "products";

include 'includes/db.php';
include 'includes/header.php';

// Logic preserved: Fetching active products
$products = $conn->query("SELECT * FROM products WHERE status = 1 ORDER BY id DESC");
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

    .product-card {
        @apply bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-100/50 hover:-translate-y-2;
    }
    
    .price-tag {
        @apply inline-flex items-center bg-emerald-50 text-emerald-700 px-4 py-2 rounded-xl font-black text-lg border border-emerald-100;
    }

    .step-card {
        @apply bg-white p-8 rounded-[2.5rem] border border-slate-100 relative transition-all duration-300 hover:border-blue-200;
    }

    /* Subtle float for the decorative icons */
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(12deg); }
        50% { transform: translateY(-10px) rotate(15deg); }
    }
    .group:hover .fa-fish {
        animation: float 3s ease-in-out infinite;
    }
</style>

<main class="bg-slate-50">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10 reveal active">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Sustainable Harvest</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Premium <span class="text-blue-400">Products</span></h1>
            <p class="text-xl opacity-80 max-w-3xl mx-auto font-light leading-relaxed">
                Farm-fresh fish and value-added aquatic products harvested using globally recognized sustainable aquaculture practices.
            </p>
        </div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] animate-pulse"></div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">Available Selection</h2>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php if($products->num_rows > 0): ?>
                <?php 
                $delay = 0;
                while($product = $products->fetch_assoc()): 
                ?>
                    <div class="product-card group reveal" style="transition-delay: <?= $delay ?>s">
                        <div class="h-64 bg-slate-100 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/10 to-indigo-600/10 group-hover:opacity-100 transition-opacity opacity-0"></div>
                            <i class="fas fa-fish text-slate-200 text-9xl absolute -right-4 -bottom-4 rotate-12 group-hover:text-blue-100 transition-colors"></i>
                            <div class="w-20 h-20 bg-white rounded-3xl shadow-xl flex items-center justify-center relative z-10 border border-slate-50 transition-transform duration-500 group-hover:scale-110">
                                <i class="fas fa-shopping-basket text-blue-600 text-3xl"></i>
                            </div>
                            <div class="absolute top-6 right-6">
                                <span class="bg-white/90 backdrop-blur-md text-slate-900 px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-sm">
                                    Fresh Harvest
                                </span>
                            </div>
                        </div>

                        <div class="p-10">
                            <h3 class="text-2xl font-black text-slate-900 mb-4 tracking-tight leading-tight group-hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($product['product_title']) ?>
                            </h3>

                            <p class="text-slate-500 mb-8 line-clamp-3 leading-relaxed">
                                <?= nl2br(htmlspecialchars($product['product_description'])) ?>
                            </p>

                            <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                                <div class="price-tag">
                                    <span class="text-xs mr-1 opacity-60">Starting at</span>
                                    <?= htmlspecialchars($product['price']) ?>
                                </div>
                                <a href="https://wa.me/919284476047" class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-emerald-500 transition-all duration-300 hover:scale-110">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php 
                $delay += 0.1;
                endwhile; 
                ?>
            <?php else: ?>
                <div class="col-span-full py-20 text-center reveal">
                    <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-box-open text-slate-300 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-400 tracking-tight">Updating our seasonal inventory...</h3>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-20 reveal">
                <h2 class="text-4xl font-black tracking-tighter mb-4">Quality & Safety Standards</h2>
                <p class="text-slate-400">Our farm-to-fork commitment ensures zero compromise on freshness.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="text-center group reveal" style="transition-delay: 0.1s">
                    <div class="w-20 h-20 bg-blue-600/20 text-blue-400 rounded-[2rem] border border-blue-600/30 flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Certified Quality</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Meets stringent food safety certifications and protocols.</p>
                </div>

                <div class="text-center group reveal" style="transition-delay: 0.2s">
                    <div class="w-20 h-20 bg-emerald-600/20 text-emerald-400 rounded-[2rem] border border-emerald-600/30 flex items-center justify-center mx-auto mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-leaf text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Organic Growth</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Sustainable farming without antibiotics or harmful chemicals.</p>
                </div>

                <div class="text-center group reveal" style="transition-delay: 0.3s">
                    <div class="w-20 h-20 bg-purple-600/20 text-purple-400 rounded-[2rem] border border-purple-600/30 flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-snowflake text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Cold Chain</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Strict temperature control from harvest to your doorstep.</p>
                </div>

                <div class="text-center group reveal" style="transition-delay: 0.4s">
                    <div class="w-20 h-20 bg-orange-600/20 text-orange-400 rounded-[2rem] border border-orange-600/30 flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-600 group-hover:text-white transition-all duration-500">
                        <i class="fas fa-truck text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fresh Delivery</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Optimized logistics for ultra-fast delivery turnaround.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-20 reveal">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">How to Order</h2>
                <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                <div class="hidden lg:block absolute top-1/2 left-0 w-full h-0.5 bg-slate-100 -translate-y-12"></div>
                
                <div class="step-card group z-10 reveal" style="transition-delay: 0.1s">
                    <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl group-hover:bg-blue-600 transition-colors">1</div>
                    <h4 class="font-black text-slate-900 mb-2 uppercase tracking-tight">Select</h4>
                    <p class="text-sm text-slate-500">Browse our range of fresh and processed fish products.</p>
                </div>

                <div class="step-card group z-10 reveal" style="transition-delay: 0.2s">
                    <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl group-hover:bg-blue-600 transition-colors">2</div>
                    <h4 class="font-black text-slate-900 mb-2 uppercase tracking-tight">Order</h4>
                    <p class="text-sm text-slate-500">Share your requirements via Call or WhatsApp.</p>
                </div>

                <div class="step-card group z-10 reveal" style="transition-delay: 0.3s">
                    <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl group-hover:bg-blue-600 transition-colors">3</div>
                    <h4 class="font-black text-slate-900 mb-2 uppercase tracking-tight">Confirm</h4>
                    <p class="text-sm text-slate-500">Instant confirmation with secure payment options.</p>
                </div>

                <div class="step-card group z-10 reveal" style="transition-delay: 0.4s">
                    <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center mb-6 font-black text-xl group-hover:bg-blue-600 transition-colors">4</div>
                    <h4 class="font-black text-slate-900 mb-2 uppercase tracking-tight">Delivery</h4>
                    <p class="text-sm text-slate-500">Receive farm-fresh products at your doorstep.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-blue-600 rounded-[3.5rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl reveal">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-[100px] -mr-32 -mt-32"></div>
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter leading-tight">Order Fresh <br> Produce Today</h2>
                
                <div class="flex flex-col sm:flex-row justify-center gap-6 relative z-10">
                    <a href="tel:+919284476047" class="bg-slate-900 text-white px-10 py-5 rounded-2xl font-black hover:bg-black transition-all flex items-center justify-center gap-3 hover:scale-105">
                        <i class="fas fa-phone"></i> +91 9284476047
                    </a>
                    <a href="https://wa.me/919284476047" class="bg-emerald-500 text-white px-10 py-5 rounded-2xl font-black hover:bg-emerald-600 transition-all flex items-center justify-center gap-3 hover:scale-105">
                        <i class="fab fa-whatsapp"></i> WhatsApp Order
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Once it has revealed, we don't need to observe it anymore
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
});
</script>

<?php include 'includes/footer.php'; ?>