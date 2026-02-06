<?php
$page_title = "Courses | Neel Foundation";
$active = "courses";

include 'includes/db.php';
include 'includes/header.php';

$courses = $conn->query("SELECT * FROM courses WHERE status = 1 ORDER BY id DESC");
?>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Skill Development Courses</h1>
        <p class="text-xl max-w-3xl mx-auto">
            Comprehensive training programs designed for sustainable livelihood and skill development in fisheries and allied sectors
        </p>
    </div>
</section>

<!-- Course Categories -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Course Categories</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Choose from our wide range of specialized courses
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <button class="category-btn bg-blue-600 text-white px-6 py-3 rounded-full font-medium transition-colors" data-category="all">
                All Courses
            </button>
            <button class="category-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300 transition-colors" data-category="fisheries">
                Fisheries
            </button>
            <button class="category-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300 transition-colors" data-category="aquaculture">
                Aquaculture
            </button>
            <button class="category-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-300 transition-colors" data-category="allied">
                Allied Sciences
            </button>
        </div>
    </div>
</section>

<!-- Courses Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="courses-container">
            <?php while($course = $courses->fetch_assoc()): ?>
            <div class="course-card bg-white rounded-lg shadow-lg overflow-hidden hover-scale"
                data-category="<?= strtolower($course['category']) ?>">

                <div class="h-48 bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center">
                    <i class="fas fa-book text-white text-4xl"></i>
                </div>

                <div class="p-6">
                    <div class="flex items-center mb-3">
                    </div>

                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        <?= htmlspecialchars($course['course_title']) ?>
                    </h3>

                    <p class="text-gray-600 mb-4">
                        <?= nl2br(htmlspecialchars($course['course_description'])) ?>
                    </p>

                    <div class="flex justify-between items-center">
                    
                    <button 
                        type="button"
                        onclick="window.location.href='contact.php'"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-medium transition-colors">
                        Enroll Now
                    </button>

                </div>
            </div>
        </div>
        <?php endwhile; ?>


        </div>
    </div>
</section>

<!-- Training Benefits -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Why Choose Our Training Programs?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We provide comprehensive training with practical exposure and industry relevance
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-certificate text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Certified Training</h3>
                <p class="text-gray-600">Government recognized certificates upon successful completion of courses</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hands-helping text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Practical Exposure</h3>
                <p class="text-gray-600">Hands-on training with real-world projects and field visits</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-briefcase text-purple-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Job Assistance</h3>
                <p class="text-gray-600">Placement support and entrepreneurship guidance for successful careers</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-orange-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Expert Faculty</h3>
                <p class="text-gray-600">Learn from experienced professionals and industry experts</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-book-open text-red-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Study Materials</h3>
                <p class="text-gray-600">Comprehensive study materials and reference guides provided</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-rupee-sign text-indigo-600 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Affordable Fees</h3>
                <p class="text-gray-600">Reasonable course fees with flexible payment options</p>
            </div>
        </div>
    </div>
</section>
<!-- Call to Action -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Journey?</h2>
        <p class="text-xl mb-8">
            Join our training programs and gain the skills needed for a successful career in fisheries and allied sectors.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="membership_apply.php" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-full font-semibold transition-colors">
                Apply for Admission
            </a>
            <a href="contact.php" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-3 rounded-full font-semibold transition-colors">
                Get More Information
            </a>
        </div>
    </div>
</section>

    </main>
    


<?php include 'includes/footer.php'; ?>
