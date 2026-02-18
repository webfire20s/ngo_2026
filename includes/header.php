<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="qbWYkVhl3FPRmSzlbMpitRAPzQ8wUEwPnWoAbLqp">
    <meta name="description" content="Neelkranti Foundation - NGO for social welfare, fish culture, research, and community development">
    <meta name="keywords" content="NGO, social welfare, fish culture, research, community development, Neelkranti Foundation">
    <meta name="author" content="Neelkranti Foundation">
    
    <meta property="og:title" content="Neelkranti Foundation - Social Welfare NGO">
    <meta property="og:description" content="Working towards social welfare through fish culture, research, and community development">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://neelkranti.webfiredegitech.com">
    <meta property="og:image" content="https://neelkranti.webfiredegitech.com/images/og-image.jpg">
    
    <title><?php echo isset($page_title) ? $page_title : "Home - Neelkranti Foundation"; ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        .gradient-bg {
            background: radial-gradient(circle at top right, #1e40af, #0f172a);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Sticky Header Glassmorphism */
        .header-scrolled {
            @apply bg-white/80 backdrop-blur-md shadow-xl py-2;
        }

        .nav-link {
            @apply relative text-gray-700 hover:text-blue-600 transition-all duration-300 font-semibold text-[13px] tracking-tight;
        }

        .nav-link::after {
            content: '';
            @apply absolute bottom-[-4px] left-0 w-0 h-[2px] bg-blue-600 transition-all duration-300;
        }

        .nav-link:hover::after, .nav-link.active::after {
            @apply w-full;
        }

        @keyframes scroll-left {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        
        .notice-scroll {
            animation: scroll-left 25s linear infinite;
        }

        .dropdown-animate {
            transform-origin: top;
            animation: growDown 300ms ease-out forwards;
        }

        @keyframes growDown {
            0% { transform: scaleY(0) }
            80% { transform: scaleY(1.1) }
            100% { transform: scaleY(1) }
        }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50">

    <div class="bg-slate-900 text-white py-2.5 overflow-hidden border-b border-white/10 relative z-[60]">
        <div class="notice-scroll whitespace-nowrap flex items-center">
            <span class="inline-block px-8 text-sm font-medium">
                <span class="text-blue-400 font-bold mr-2">📢 ANNOUNCEMENT:</span> New batch admissions open for Fish Culture Training 2024!
                <span class="mx-10 text-slate-600">|</span>
                <span class="text-blue-400 font-bold mr-2">🎉 MILESTONE:</span> Successfully empowered 500+ rural entrepreneurs!
                <span class="mx-10 text-slate-600">|</span>
                <span class="text-blue-400 font-bold mr-2">📅 EVENT:</span> Sustainable Fish Farming Workshop on 15th March
            </span>
        </div>
    </div>
    
    <nav id="main-nav" class="bg-white border-b border-slate-100 sticky top-0 z-50 transition-all duration-500 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14">
                
                <div class="flex-shrink-0 flex items-center animate__animated animate__fadeInLeft">
                    <a href="index.php" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-transform">
                            <i class="fas fa-water text-xl"></i>
                        </div>
                        <span class="text-xl font-extrabold tracking-tighter text-slate-900 group-hover:text-blue-600 transition-colors">
                            NEELKRANTI<span class="text-blue-600">.</span>
                        </span>
                    </a>
                </div>
                
                <div class="hidden xl:flex items-center space-x-3 2xl:space-x-5 animate__animated animate__fadeInRight">
                    <a href="index.php" class="nav-link text-sm font-semibold <?= ($active == 'home') ? 'active text-blue-600' : 'text-slate-600' ?> hover:text-blue-600 transition-colors">Home</a>
                    
                    <div class="relative group">
                        <button class="nav-link text-sm font-semibold text-slate-600 flex items-center gap-1 group-hover:text-blue-600">
                            About <i class="fas fa-chevron-down text-[10px] transition-transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute top-full left-[-20px] mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 dropdown-animate p-2">
                            <a href="about.php" class="block px-4 py-3 text-sm font-medium text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-colors">Who We Are</a>
                            <a href="aims-objectives.php" class="block px-4 py-3 text-sm font-medium text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-colors">Aims & Objectives</a>
                            <a href="mission-vision.php" class="block px-4 py-3 text-sm font-medium text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-colors">Mission & Vision</a>
                            <a href="achievements.php" class="block px-4 py-3 text-sm font-medium text-slate-600 hover:bg-blue-50 hover:text-blue-600 rounded-xl transition-colors">Achievements</a>
                        </div>
                    </div>

                    <?php 
                    $nav_items = [
                        'members.php' => 'Members',
                        'membership_apply.php' => 'Apply',
                        'activities.php' => 'Activities',
                        'courses.php' => 'Courses',
                        'products.php' => 'Products',
                        'gallery.php' => 'Gallery',
                        'notices.php' => 'Notices',
                        'events.php' => 'Events',
                        'research.php' => 'Research',
                        'contact.php' => 'Contact'
                    ];
                    foreach($nav_items as $url => $label): 
                    ?>
                    <a href="<?= $url ?>" class="nav-link text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors"><?= $label ?></a>
                    <?php endforeach; ?>
                    
                    <a href="donation_apply.php" class="bg-blue-600 text-white px-4 py-2 rounded-xl text-[11px] font-black hover:bg-blue-700 transition-all hover:shadow-lg hover:shadow-blue-200 active:scale-95 whitespace-nowrap">
                        DONATE
                    </a>
                </div>
                
                <div class="xl:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-slate-900 hover:bg-slate-50 w-10 h-10 rounded-xl flex items-center justify-center transition-colors focus:outline-none">
                        <i class="fas fa-bars-staggered text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden xl:hidden bg-white border-t border-slate-100 overflow-y-auto max-h-[80vh]">
            <div class="px-4 pt-4 pb-8 space-y-1">
                <a href="index.php" class="block text-slate-900 font-bold px-4 py-3 rounded-xl hover:bg-blue-50">Home</a>
                
                <div class="px-4 py-2 text-xs font-black text-slate-400 uppercase tracking-widest">Organization</div>
                <a href="about.php" class="block text-slate-600 font-medium px-8 py-2">Who We Are</a>
                <a href="membership_apply.php" class="block text-slate-600 font-medium px-8 py-2">Apply for Membership</a>
                
                <div class="px-4 py-2 text-xs font-black text-slate-400 uppercase tracking-widest">Quick Links</div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="members.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Members</a>
                    <a href="activities.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Activities</a>
                    <a href="courses.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Courses</a>
                    <a href="products.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Products</a>
                    <a href="gallery.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Gallery</a>
                    <a href="notices.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Notices</a>
                    <a href="events.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Events</a>
                    <a href="research.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Research</a>
                    <a href="aims-objectives.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Aims & Objectives</a>
                    <a href="mission-vision.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Mission & Vision</a>
                    <a href="achievements.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Achievements</a>
                    <a href="contact.php" class="text-slate-600 font-medium px-4 py-2 hover:text-blue-600">Contact</a>
                </div>
                
                <div class="pt-6">
                    <a href="donation_apply.php" class="block w-full text-center bg-blue-600 text-white py-4 rounded-2xl font-black shadow-lg">SUPPORT OUR CAUSE</a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Header Scroll Effect
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('header-scrolled');
            } else {
                nav.classList.remove('header-scrolled');
            }
        });

        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');

            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                // Optional: Change icon when open
                const icon = btn.querySelector('i');
                if(menu.classList.contains('hidden')) {
                    icon.classList.replace('fa-xmark', 'fa-bars-staggered');
                } else {
                    icon.classList.replace('fa-bars-staggered', 'fa-xmark');
                }
            });
        });
    </script>