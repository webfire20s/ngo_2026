<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="qbWYkVhl3FPRmSzlbMpitRAPzQ8wUEwPnWoAbLqp">
    <meta name="description" content="Neelkranti Foundation - NGO for social welfare, fish culture, research, and community development">
    <meta name="keywords" content="NGO, social welfare, fish culture, research, community development, Neelkranti Foundation">
    <meta name="author" content="Neelkranti Foundation">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Neelkranti Foundation - Social Welfare NGO">
    <meta property="og:description" content="Working towards social welfare through fish culture, research, and community development">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://neelkranti.webfiredegitech.com">
    <meta property="og:image" content="https://neelkranti.webfiredegitech.com/images/og-image.jpg">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Neelkranti Foundation">
    <meta name="twitter:description" content="Working towards social welfare through fish culture, research, and community development">
    <meta name="twitter:image" content="https://neelkranti.webfiredegitech.com/images/og-image.jpg">
    
    <title>Home - Neelkranti Foundation</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hover-scale {
            transition: transform 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        .scroll-smooth {
            scroll-behavior: smooth;
        }
        
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        
        .call-float {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 1000;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        .notice-scroll {
            animation: scroll-left 20s linear infinite;
        }
        
        @keyframes scroll-left {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body class="font-sans antialiased scroll-smooth">
    <!-- Notice Bar -->
            <div class="bg-red-600 text-white py-2 overflow-hidden">
            <div class="notice-scroll whitespace-nowrap">
                <span class="inline-block px-4">
                    📢 Important: New batch admissions open for Fish Culture Training - Contact us for details! | 
                    🎉 Achievement: Successfully trained 500+ students this year! | 
                    📅 Upcoming Event: Fish Farming Workshop on 15th March 2024
                </span>
            </div>
        </div>
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="index.php" class="flex-shrink-0 flex items-center">
                        <span class="text-xl font-bold text-gradient">Neelkranti Foundation</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Home</a>
                    
                    <!-- About Dropdown -->
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors flex items-center">
                            About Us <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <a href="about.php" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">About Us</a>
                            <a href="aims-objectives.php" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Aims & Objectives</a>
                            <a href="mission-vision.php" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Mission & Vision</a>
                            <a href="achievements.php" class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">Achievements</a>
                        </div>
                    </div>

                    
                    <a href="members.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Members</a>
                    <a href="membership_apply.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Apply Membership</a>
                    <a href="donation_apply.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Donate Now</a>
                    <a href="activities.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Activities</a>
                    <a href="courses.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Courses</a>
                    <a href="research.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Research</a>
                    <a href="products.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Products</a>
                    <a href="events.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Events</a>
                    <a href="gallery.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Gallery</a>
                    <a href="notices.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Notices</a>
                    <a href="contact.php" class="text-gray-700 hover:text-blue-600 px-2 py-2 rounded-md text-xs font-medium transition-colors">Contact</a>
                    
                    <!-- Language Switcher -->
                                    </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="index.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="about.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">About Us</a>
                <a href="aims-objectives.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Aims & Objectives</a>
                <a href="mission-vision.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Mission & Vision</a>
                <a href="achievements.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Achievements</a>
                <a href="members.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Members</a>
                <a href="membership_apply.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Apply Membership</a>
                <a href="donation_apply.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Donate Now</a>
                <a href="activities.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Activities</a>
                <a href="courses.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Courses</a>
                <a href="research.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Research</a>
                <a href="products.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Products</a>
                <a href="events.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Events</a>
                <a href="gallery.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Gallery</a>
                <a href="notices.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Notices</a>
                <a href="contact.php" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium">Contact</a>
            </div>
        </div>
    </nav>
