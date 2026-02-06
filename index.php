<?php include 'includes/header.php'; 
include 'includes/db.php';
?>

    <!-- Main Content -->
    <main>
        <!-- Modern Hero Section -->
        <section class="relative min-h-[90vh] flex items-center overflow-hidden bg-slate-900">
            <div class="absolute inset-0 z-0">
                <img src="images/heroimage.png" alt="Fish Culture" class="w-full h-full object-cover opacity-60 scale-105" onerror="this.src='https://images.unsplash.com/photo-1522071823991-b5ae77248b43?auto=format&fit=crop&q=80&w=2000'">
                <div class="absolute inset-0 image-overlay-gradient"></div>
            </div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full fade-in">
                        Empowering Communities
                    </span>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-tight fade-in">
                        Driving the <span class="text-blue-500">Blue Revolution</span> through Innovation.
                    </h1>
                    <p class="text-lg md:text-xl text-slate-300 mb-10 leading-relaxed fade-in">
                        Neelkranti Foundation is dedicated to social welfare through sustainable fish culture, scientific research, and professional community development programs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-5 fade-in">
                        <a href="membership_apply.php" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-600/30 hover:bg-blue-700 transition-all text-center">
                            Get Started Today
                        </a>
                        <a href="donate" class="px-8 py-4 bg-white/10 text-white font-bold rounded-xl backdrop-blur-md border border-white/20 hover:bg-white/20 transition-all text-center">
                            Support Our Cause
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Impact Statistics -->
        <section class="py-12 bg-white relative z-20">
            <div class="max-w-7xl mx-auto px-4 -mt-24">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 text-center stat-card fade-in">
                        <div class="text-4xl font-extrabold text-blue-600 mb-2">500+</div>
                        <p class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Students Trained</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 text-center stat-card fade-in">
                        <div class="text-4xl font-extrabold text-green-600 mb-2">12+</div>
                        <p class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Ongoing Projects</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 text-center stat-card fade-in">
                        <div class="text-4xl font-extrabold text-orange-500 mb-2">25+</div>
                        <p class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Expert Researchers</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/60 text-center stat-card fade-in">
                        <div class="text-4xl font-extrabold text-purple-600 mb-2">10k+</div>
                        <p class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Beneficiaries</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission & About Section -->
        <section class="py-24 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 fade-in">
                        <h2 class="text-sm font-black text-blue-600 uppercase tracking-widest mb-4">About Foundation</h2>
                        <h3 class="text-4xl font-extrabold text-slate-900 mb-6 leading-snug">Empowering the underprivileged with sustainable aquaculture.</h3>
                        <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                            Neelkranti Foundation bridges the gap between traditional knowledge and modern scientific fisheries. We provide end-to-end support for rural youth to build career opportunities in fish farming.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-hand-holding-heart text-blue-600"></i>
                                </div>
                                <span class="font-bold text-slate-800">Social Upliftment</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-microscope text-green-600"></i>
                                </div>
                                <span class="font-bold text-slate-800">R&D Facilities</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 relative fade-in">
                        <div class="relative z-10 rounded-[2rem] overflow-hidden shadow-2xl">
                            <img src="images/homeimage1.jpg" alt="About" class="w-full h-[500px] object-cover" onerror="this.src='https://images.unsplash.com/photo-1534951009808-dfd006139796?auto=format&fit=crop&q=80&w=1000'">
                        </div>
                        <div class="absolute -bottom-6 -left-6 w-48 h-48 bg-blue-600 rounded-3xl z-0 -rotate-6"></div>
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-green-500 rounded-full z-0 opacity-20"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Programs/Courses Section -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 fade-in">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-4">Our Core Programs</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">Expert-led training modules designed to transform you into a professional aqua-entrepreneur.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-scale group fade-in">
                        <div class="h-56 bg-gradient-to-br from-blue-500 to-blue-700 relative flex items-center justify-center overflow-hidden">
                            <i class="fas fa-fish text-white text-7xl opacity-30 group-hover:scale-125 transition-transform duration-500"></i>
                            <div class="absolute bottom-4 left-6 text-white font-bold text-xl">Freshwater Culture</div>
                        </div>
                        <div class="p-8">
                            <p class="text-slate-600 mb-6">Master the techniques of pond preparation, stocking, and harvesting for freshwater fish species.</p>
                            <a href="courses.php" class="inline-flex items-center font-bold text-blue-600 hover:gap-3 transition-all">
                                Course Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-scale group fade-in">
                        <div class="h-56 bg-gradient-to-br from-green-500 to-green-700 relative flex items-center justify-center overflow-hidden">
                            <i class="fas fa-seedling text-white text-7xl opacity-30 group-hover:scale-125 transition-transform duration-500"></i>
                            <div class="absolute bottom-4 left-6 text-white font-bold text-xl">Seed Production</div>
                        </div>
                        <div class="p-8">
                            <p class="text-slate-600 mb-6">In-depth training on breeding, hatchery management, and nursery techniques for quality fish seeds.</p>
                            <a href="courses.php" class="inline-flex items-center font-bold text-blue-600 hover:gap-3 transition-all">
                                Course Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover-scale group fade-in">
                        <div class="h-56 bg-gradient-to-br from-purple-500 to-purple-700 relative flex items-center justify-center overflow-hidden">
                            <i class="fas fa-flask text-white text-7xl opacity-30 group-hover:scale-125 transition-transform duration-500"></i>
                            <div class="absolute bottom-4 left-6 text-white font-bold text-xl">Water Analysis</div>
                        </div>
                        <div class="p-8">
                            <p class="text-slate-600 mb-6">Scientific water testing and management essential for maintaining high-yield aquaculture ecosystems.</p>
                            <a href="courses.php" class="inline-flex items-center font-bold text-blue-600 hover:gap-3 transition-all">
                                Course Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visual Gallery -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-12 fade-in">
                    <div>
                        <h2 class="text-4xl font-extrabold text-slate-900">Project Highlights</h2>
                        <p class="text-slate-500 mt-2 italic">A glimpse into our ground-level activities</p>
                    </div>
                    <a href="gallery.php" class="hidden md:block px-6 py-2 border-2 border-slate-900 font-bold rounded-lg hover:bg-slate-900 hover:text-white transition-all">View All Work</a>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="rounded-3xl overflow-hidden h-72 group relative fade-in">
                        <img src="images/homeimage1.jpg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded-lg font-bold">Field Visit</span>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden h-72 group relative fade-in">
                        <img src="images/homeimage2.jpg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded-lg font-bold">Training Hub</span>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden h-72 group relative fade-in">
                        <img src="images/homeimage3.jpg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded-lg font-bold">Research Lab</span>
                        </div>
                    </div>
                    <div class="rounded-3xl overflow-hidden h-72 group relative fade-in">
                        <img src="images/homeimage4.jpg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white border border-white px-4 py-2 rounded-lg font-bold">Harvesting</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-blue-600 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl shadow-blue-500/40">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="relative z-10 fade-in">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">Ready to make a difference?</h2>
                        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">Whether you want to learn, collaborate, or donate, your involvement helps us drive sustainable growth in fisheries.</p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="membership_apply.php" class="px-10 py-4 bg-white text-blue-600 font-black rounded-2xl hover:bg-blue-50 transition-all">Join As Member</a>
                            <a href="contact.php" class="px-10 py-4 bg-blue-900/40 text-white font-bold rounded-2xl border border-white/20 hover:bg-blue-900/60 transition-all">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


<?php include 'includes/footer.php'; ?>
