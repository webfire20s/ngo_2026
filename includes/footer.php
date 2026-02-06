

    <!-- Footer -->
    <!-- NEW Modern Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Branding -->
                <div class="col-span-1 lg:col-span-1">
                    <h3 class="text-2xl font-bold text-white mb-6">Neelkranti <span class="text-blue-500">Foundation</span></h3>
                    <p class="leading-relaxed mb-8">
                        Revolutionizing social welfare and aquaculture through sustainable practices and dedicated community research. 
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-400 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div>
                    <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Organization</h4>
                    <ul class="space-y-4">
                        <li><a href="about.php" class="hover:text-blue-400 transition-colors">About History</a></li>
                        <li><a href="aims-objectives.php" class="hover:text-blue-400 transition-colors">Aims & Goals</a></li>
                        <li><a href="activities.php" class="hover:text-blue-400 transition-colors">Ongoing Activities</a></li>
                        <li><a href="research.php" class="hover:text-blue-400 transition-colors">Research Wing</a></li>
                        <li><a href="events.php" class="hover:text-blue-400 transition-colors">Upcoming Events</a></li>
                    </ul>
                </div>

                <!-- Support Links -->
                <div>
                    <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Engagement</h4>
                    <ul class="space-y-4">
                        <li><a href="membership_apply.php" class="hover:text-blue-400 transition-colors">Join Community</a></li>
                        <li><a href="courses.php" class="hover:text-blue-400 transition-colors">Training Courses</a></li>
                        <li><a href="donation_apply.php" class="hover:text-blue-400 transition-colors">Donation Portal</a></li>
                        <li><a href="gallery.php" class="hover:text-blue-400 transition-colors">Gallery Center</a></li>
                        <li><a href="notices.php" class="hover:text-blue-400 transition-colors">Latest Notices</a></li>
                    </ul>
                </div>

                <!-- Reach Out -->
                <div>
                    <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Get in Touch</h4>
                    <ul class="space-y-5">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt text-blue-500 mt-1"></i>
                            <span>Raviraj Park, Parbhani,<br>Maharashtra - 431491</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-phone-alt text-blue-500"></i>
                            <span>+91 9284476047</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-blue-500"></i>
                            <span class="break-all text-sm">ahirrao.sunil@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                <p>&copy; 2026 <span class="text-white font-bold">Neelkranti Foundation</span>. All Rights Reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white">Terms of Use</a>
                    <a href="#" class="hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-white">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/919284476047?text=Hello%20Neelkranti%20Foundation%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services." 
       class="whatsapp-float bg-green-500 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform active:scale-95" 
       target="_blank">
        <i class="fab fa-whatsapp text-xl"></i>
    </a>

    <!-- Call Button -->
    <a href="tel:+919284476047" 
       class="call-float bg-blue-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform active:scale-95">
        <i class="fas fa-phone text-xl"></i>
    </a>

    <!-- Visitor Counter 
    <div class="fixed bottom-4 right-4 bg-gray-800 text-white px-3 py-2 rounded-lg text-xs z-40">
        <i class="fas fa-eye mr-1"></i>
        Visitors: 0
    </div>
    -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation to elements
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });
    </script>

    <script>
    // Add animation classes when elements come into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
</script>
</body>
</html>