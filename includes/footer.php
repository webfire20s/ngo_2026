

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Organization Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                     <!--   <img src="https://neelkranti.webfiredegitech.com/images/logo-white.png" alt="Neelkranti Foundation" class="h-10 w-auto mr-3">-->
                        <span class="text-xl font-bold">Neelkranti Foundation</span>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Working towards social welfare through fish culture, research, and community development. 
                        Empowering communities with sustainable livelihood solutions.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="about.php" class="text-gray-300 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="membership/apply" class="text-gray-300 hover:text-white transition-colors">Apply for Membership</a></li>
                        <li><a href="courses.php" class="text-gray-300 hover:text-white transition-colors">Courses</a></li>
                        <li><a href="donate" class="text-gray-300 hover:text-white transition-colors">Donate</a></li>
                        <li><a href="gallery.php" class="text-gray-300 hover:text-white transition-colors">Gallery</a></li>
                        <li><a href="contact.php" class="text-gray-300 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Raviraj Park, Parbhani, Maharashtra  - 431491
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            +91 9284476047
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            ahirrao.sunil@gmail.com
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-globe mr-2"></i>
                            www.neelkrantifoundation.org.in
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-300">
                <p>&copy; 2026 Neelkranti Foundation. All rights reserved.</p>
                <div class="mt-2 space-x-4">
                    <a href="https://neelkranti.webfiredegitech.com/terms" class="hover:text-white transition-colors">Terms & Conditions</a>
                    <a href="https://neelkranti.webfiredegitech.com/privacy" class="hover:text-white transition-colors">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/911234567890?text=Hello%20Neelkranti%20Foundation%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services." 
       class="whatsapp-float bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition-colors float-animation" 
       target="_blank">
        <i class="fab fa-whatsapp text-xl"></i>
    </a>

    <!-- Call Button -->
    <a href="tel:+911234567890" 
       class="call-float bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600 transition-colors float-animation">
        <i class="fas fa-phone text-xl"></i>
    </a>

    <!-- Visitor Counter -->
    <div class="fixed bottom-4 right-4 bg-gray-800 text-white px-3 py-2 rounded-lg text-xs z-40">
        <i class="fas fa-eye mr-1"></i>
        Visitors: 0
    </div>

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