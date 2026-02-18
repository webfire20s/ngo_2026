<?php 
include 'includes/header.php'; 
include 'includes/db.php';
?>

    <main class="bg-slate-50">
        <section class="relative min-h-[95vh] flex items-center overflow-hidden bg-slate-950">
            <div class="absolute inset-0 z-0">
                <img src="images/heroimage.png" alt="Fish Culture" 
                     class="w-full h-full object-cover opacity-50 animate-[kenburns_20s_ease_infinite]" 
                     onerror="this.src='https://images.unsplash.com/photo-1522071823991-b5ae77248b43?auto=format&fit=crop&q=80&w=2000'">
                <div class="absolute inset-0" style="background: linear-gradient(90deg, rgba(2,6,23,1) 0%, rgba(2,6,23,0.7) 50%, rgba(2,6,23,0.2) 100%);"></div>
            </div>
            
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.2em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/30 rounded-full animate__animated animate__fadeInDown">
                        Empowering Communities
                    </span>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-[1.1] tracking-tight animate__animated animate__fadeInLeft">
                        Driving the <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Blue Revolution</span>
                    </h1>
                    <p class="text-lg md:text-xl text-slate-300 mb-10 leading-relaxed max-w-2xl border-l-4 border-blue-600 pl-6 animate__animated animate__fadeInLeft animate__delay-1s">
                        Neelkranti Foundation is dedicated to social welfare through sustainable fish culture, scientific research, and professional community development programs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-5 animate__animated animate__fadeInUp animate__delay-1s">
                        <a href="membership_apply.php" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-xl shadow-[0_10px_20px_-5px_rgba(37,99,235,0.4)] hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300 text-center">
                            Get Started Today
                        </a>
                        <a href="donation_apply.php" class="px-8 py-4 bg-white/5 text-white font-bold rounded-xl backdrop-blur-md border border-white/20 hover:bg-white/10 hover:-translate-y-1 transition-all duration-300 text-center">
                            Support Our Cause
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 bg-transparent relative z-20">
            <div class="max-w-7xl mx-auto px-4 -mt-24">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white/95 backdrop-blur-sm p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] text-center group hover:bg-blue-600 transition-all duration-500 animate-on-scroll">
                        <div class="text-4xl font-extrabold text-blue-600 mb-2 group-hover:text-white transition-colors">500+</div>
                        <p class="text-slate-500 font-bold uppercase text-xs tracking-widest group-hover:text-blue-100">Students Trained</p>
                    </div>
                    <div class="bg-white/95 backdrop-blur-sm p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] text-center group hover:bg-green-600 transition-all duration-500 animate-on-scroll animate__delay-1s">
                        <div class="text-4xl font-extrabold text-green-600 mb-2 group-hover:text-white transition-colors">12+</div>
                        <p class="text-slate-500 font-bold uppercase text-xs tracking-widest group-hover:text-green-100">Ongoing Projects</p>
                    </div>
                    <div class="bg-white/95 backdrop-blur-sm p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] text-center group hover:bg-orange-500 transition-all duration-500 animate-on-scroll animate__delay-2s">
                        <div class="text-4xl font-extrabold text-orange-500 mb-2 group-hover:text-white transition-colors">25+</div>
                        <p class="text-slate-500 font-bold uppercase text-xs tracking-widest group-hover:text-orange-100">Expert Researchers</p>
                    </div>
                    <div class="bg-white/95 backdrop-blur-sm p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] text-center group hover:bg-purple-600 transition-all duration-500 animate-on-scroll animate__delay-3s">
                        <div class="text-4xl font-extrabold text-purple-600 mb-2 group-hover:text-white transition-colors">10k+</div>
                        <p class="text-slate-500 font-bold uppercase text-xs tracking-widest group-hover:text-purple-100">Beneficiaries</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <div class="lg:w-1/2 animate-on-scroll" data-animate="animate__fadeInLeft">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-10 h-[2px] bg-blue-600"></div>
                            <h2 class="text-sm font-black text-blue-600 uppercase tracking-widest">About Foundation</h2>
                        </div>
                        <h3 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">Empowering the underprivileged with sustainable aquaculture.</h3>
                        <p class="text-lg text-slate-600 mb-8 leading-relaxed italic border-l-4 border-slate-100 pl-4">
                            "Neelkranti Foundation bridges the gap between traditional knowledge and modern scientific fisheries."
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 hover:bg-blue-50 transition-all duration-300 hover:scale-105 group">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 group-hover:rotate-12 transition-transform">
                                    <i class="fas fa-hand-holding-heart text-white"></i>
                                </div>
                                <span class="font-bold text-slate-800">Social Upliftment</span>
                            </div>
                            <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-50 hover:bg-green-50 transition-all duration-300 hover:scale-105 group">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shadow-lg shadow-green-200 group-hover:rotate-12 transition-transform">
                                    <i class="fas fa-microscope text-white"></i>
                                </div>
                                <span class="font-bold text-slate-800">R&D Facilities</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 relative group animate-on-scroll" data-animate="animate__fadeInRight">
                        <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]">
                            <img src="images/homeimage1.jpg" alt="About" class="w-full h-[550px] object-cover" onerror="this.src='https://images.unsplash.com/photo-1534951009808-dfd006139796?auto=format&fit=crop&q=80&w=1000'">
                        </div>
                        <div class="absolute -bottom-6 -left-6 w-48 h-48 bg-blue-600 rounded-[3rem] z-0 -rotate-6 opacity-20 group-hover:rotate-0 transition-transform duration-700"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] border border-slate-100 rounded-full z-0 pointer-events-none animate-[ping_10s_linear_infinite] opacity-30"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-slate-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16 animate-on-scroll">
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Our Core Programs</h2>
                    <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group border border-white animate-on-scroll" data-animate="animate__fadeInUp">
                        <div class="h-64 bg-slate-900 relative flex items-center justify-center overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1524704654690-b56c05c78a00?auto=format&fit=crop&q=80" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent"></div>
                            <i class="fas fa-fish text-white text-6xl relative z-10 group-hover:rotate-12 transition-transform"></i>
                            <div class="absolute bottom-6 left-6 text-white z-10">
                                <span class="text-xs font-bold uppercase tracking-widest text-blue-300">Aquaculture</span>
                                <div class="text-2xl font-bold">Freshwater Culture</div>
                            </div>
                        </div>
                        <div class="p-8">
                            <p class="text-slate-600 mb-8 leading-relaxed">Master techniques of pond preparation and harvesting for freshwater fish species.</p>
                            <a href="courses.php" class="inline-flex items-center font-bold text-blue-600 group-hover:translate-x-2 transition-transform">
                                Course Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group border border-white animate-on-scroll" data-animate="animate__fadeInUp" style="animation-delay: 0.2s;">
                        <div class="h-64 bg-slate-900 relative flex items-center justify-center overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1591130219388-ae3d1c17431b?auto=format&fit=crop&q=80" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 to-transparent"></div>
                            <i class="fas fa-seedling text-white text-6xl relative z-10 group-hover:rotate-12 transition-transform"></i>
                            <div class="absolute bottom-6 left-6 text-white z-10">
                                <span class="text-xs font-bold uppercase tracking-widest text-green-300">Production</span>
                                <div class="text-2xl font-bold">Seed Production</div>
                            </div>
                        </div>
                        <div class="p-8">
                            <p class="text-slate-600 mb-8 leading-relaxed">In-depth training on breeding and hatchery management for quality fish seeds.</p>
                            <a href="courses.php" class="inline-flex items-center font-bold text-blue-600 group-hover:translate-x-2 transition-transform">
                                Course Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 group border border-white animate-on-scroll" data-animate="animate__fadeInUp" style="animation-delay: 0.4s;">
                        <div class="h-64 bg-slate-900 relative flex items-center justify-center overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1532094349884-543bb1198343?auto=format&fit=crop&q=80" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent"></div>
                            <i class="fas fa-flask text-white text-6xl relative z-10 group-hover:rotate-12 transition-transform"></i>
                            <div class="absolute bottom-6 left-6 text-white z-10">
                                <span class="text-xs font-bold uppercase tracking-widest text-purple-300">Science</span>
                                <div class="text-2xl font-bold">Water Analysis</div>
                            </div>
                        </div>
                        <div class="p-8">
                            <p class="text-slate-600 mb-8 leading-relaxed">Scientific water testing and management essential for high-yield ecosystems.</p>
                            <a href="courses.php" class="inline-flex items-center font-bold text-blue-600 group-hover:translate-x-2 transition-transform">
                                Course Details <i class="fas fa-arrow-right ml-2 text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white animate-on-scroll">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-br from-blue-700 via-blue-600 to-blue-800 rounded-[4rem] p-12 md:p-24 text-center relative overflow-hidden shadow-2xl shadow-blue-900/20">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl animate-pulse"></div>
                    <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl animate-pulse"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-8 tracking-tight">Ready to make a difference?</h2>
                        <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto leading-relaxed font-medium">
                            Whether you want to learn, collaborate, or donate, your involvement helps us drive sustainable growth.
                        </p>
                        <div class="flex flex-wrap justify-center gap-6">
                            <a href="membership_apply.php" class="px-12 py-5 bg-white text-blue-700 font-black rounded-2xl hover:shadow-2xl hover:scale-105 transition-all duration-300 shadow-xl">Join As Member</a>
                            <a href="contact.php" class="px-12 py-5 bg-blue-900/30 text-white font-bold rounded-2xl border border-white/30 hover:bg-blue-900/50 transition-all duration-300">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <style>
        /* Custom Keyframes for Hero Image */
        @keyframes kenburns {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>

<?php include 'includes/footer.php'; ?>