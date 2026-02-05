<?php include 'includes/header.php'; 
include 'includes/db.php';
?>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center text-white">
    <!-- Background image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/heroimage.png');"></div>
    
    <!-- Dark overlay for text readability -->
    <div class="absolute inset-0 bg-black opacity-50"></div>
    
    <!-- Text content -->
    <div class="relative z-10 text-center px-4">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-on-scroll">
            Welcome to Neelkranti Foundation
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto animate-on-scroll">
            Empowering communities through sustainable fish culture, research, and social welfare initiatives
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-on-scroll">
            <a href="https://neelkranti.webfiredegitech.com/membership/apply" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-colors hover-scale">
                Join Our Community
            </a>
            <a href="https://neelkranti.webfiredegitech.com/donate" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-semibold transition-colors hover-scale">
                Make a Donation
            </a>
        </div>
    </div>
    
    <!-- Scroll down arrow -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- About Preview -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">About Our Foundation</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dedicated to social welfare through sustainable development and community empowerment
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-hand-holding-heart text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Social Welfare</h3>
                <p class="text-gray-600 text-center">
                    Working towards upliftment of communities through various social initiatives and programs
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-fish text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Fish Culture</h3>
                <p class="text-gray-600 text-center">
                    Promoting sustainable aquaculture and fish farming practices for livelihood generation
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-microscope text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Research & Development</h3>
                <p class="text-gray-600 text-center">
                    Conducting research and providing consultancy in fisheries and allied sciences
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Featured Courses</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Skill development programs designed for sustainable livelihood
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg hover-scale">
                <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-fish text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Freshwater Fish Culture</h3>
                    <p class="text-gray-600 mb-4">Comprehensive training in modern fish farming techniques</p>
                    <a href="courses.php" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg hover-scale">
                <div class="h-48 bg-gradient-to-r from-green-500 to-green-600 flex items-center justify-center">
                    <i class="fas fa-seedling text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Fish Seed Production</h3>
                    <p class="text-gray-600 mb-4">Learn breeding and hatchery management techniques</p>
                    <a href="courses.php" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg hover-scale">
                <div class="h-48 bg-gradient-to-r from-purple-500 to-purple-600 flex items-center justify-center">
                    <i class="fas fa-flask text-white text-4xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Water Analysis</h3>
                    <p class="text-gray-600 mb-4">Water quality testing and management for aquaculture</p>
                    <a href="courses.php" class="text-blue-600 hover:text-blue-800 font-medium">Learn More →</a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="courses.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-colors">
                View All Courses
            </a>
        </div>
    </div>
</section>

<!-- Latest News & Notices    X-->
<!-- photos -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!--  <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Gallery</h2> -->
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Image 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="images/homeimage1.jpg" alt="Image 1" class="w-full h-48 object-cover">
            </div>
            
            <!-- Image 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="images/homeimage2.jpg" alt="Image 2" class="w-full h-48 object-cover">
            </div>
            
            <!-- Image 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="images/homeimage3.jpg" alt="Image 3" class="w-full h-48 object-cover">
            </div>
            
            <!-- Image 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="images/homeimage4.jpg" alt="Image 4" class="w-full h-48 object-cover">
            </div>
        </div>
    </div>
</section>


<!-- Upcoming Events -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Upcoming Events</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Join us for workshops, training programs, and community events
            </p>
        </div>
        
            <?php
            $events = $conn->query("
                SELECT title, event_date, description, photo, image 
                FROM events 
                ORDER BY created_at DESC 
                LIMIT 3
            ");

            if ($events && $events->num_rows > 0):
            ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php while ($event = $events->fetch_assoc()): ?>
                        <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                            
                            <?php if (!empty($event['photo']) || !empty($event['image'])): ?>
                                <img 
                                    src="uploads/events/<?=
                                        !empty($event['photo']) ? $event['photo'] : $event['image']
                                    ?>" 
                                    alt="<?= htmlspecialchars($event['title']) ?>"
                                    class="w-full h-48 object-cover"
                                >
                            <?php endif; ?>

                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                    <?= htmlspecialchars($event['title']) ?>
                                </h3>

                                <p class="text-sm text-blue-600 mb-2">
                                    <?= date('F d, Y', strtotime($event['event_date'])) ?>
                                </p>

                                <p class="text-gray-600 text-sm">
                                    <?= substr(strip_tags($event['description']), 0, 100) ?>...
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <i class="fas fa-calendar text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600">No upcoming events at the moment. Check back soon!</p>
                </div>
            <?php endif; ?>

                
        <div class="text-center mt-12">
            <a href="events.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-colors">
                View All Events
            </a>
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Gallery</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Glimpses of our activities and achievements
            </p>
        </div>
        
            <?php
            $gallery = $conn->query("
                SELECT title, photo 
                FROM gallery 
                ORDER BY created_at DESC 
                LIMIT 4
            ");

            if ($gallery && $gallery->num_rows > 0):
            ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <?php while ($img = $gallery->fetch_assoc()): ?>
                        <div class="rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                            <img 
                                src="uploads/gallery/<?= $img['photo'] ?>" 
                                alt="<?= htmlspecialchars($img['title']) ?>"
                                class="w-full h-48 object-cover"
                            >
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <i class="fas fa-images text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600">Gallery images will be available soon.</p>
                </div>
            <?php endif; ?>

                
        <div class="text-center mt-12">
            <a href="gallery.php" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-colors">
                View Full Gallery
            </a>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>
