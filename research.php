<?php
$page_title = "Research | Neel Foundation";
$active = "research";

include 'includes/db.php';
include 'includes/header.php';

$researches = $conn->query(
    "SELECT * FROM research WHERE status = 1 ORDER BY id DESC"
);
?>


<!-- Main Content -->
    <main>
        <!-- Hero Section -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Research & Consultancy</h1>
        <p class="text-xl max-w-3xl mx-auto">
            Advancing knowledge and providing expert consultancy in fisheries and allied sciences
        </p>
    </div>
</section>

<!-- Research Areas -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Research Areas</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Our focus areas for research and development
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-blue-50 p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-fish text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Fisheries Research</h3>
                <p class="text-gray-600 text-center">
                    Advanced research in fish breeding, genetics, nutrition, and disease management for sustainable aquaculture
                </p>
            </div>
            
            <div class="bg-green-50 p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-water text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Aquaculture Systems</h3>
                <p class="text-gray-600 text-center">
                    Research on intensive and extensive aquaculture systems, recirculating systems, and integrated farming
                </p>
            </div>
            
            <div class="bg-purple-50 p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-flask text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Water Quality</h3>
                <p class="text-gray-600 text-center">
                    Studies on water quality parameters, pollution control, and environmental impact assessment
                </p>
            </div>
            
            <div class="bg-orange-50 p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-dna text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Fish Genetics</h3>
                <p class="text-gray-600 text-center">
                    Research on fish genetics, breeding programs, and development of improved strains
                </p>
            </div>
            
            <div class="bg-red-50 p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-utensils text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Fish Nutrition</h3>
                <p class="text-gray-600 text-center">
                    Studies on fish feed formulation, nutrition requirements, and alternative feed ingredients
                </p>
            </div>
            
            <div class="bg-indigo-50 p-8 rounded-lg shadow-lg hover-scale">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-virus text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Fish Health</h3>
                <p class="text-gray-600 text-center">
                    Research on fish diseases, immunology, and development of disease prevention strategies
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Research Assistance -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Research Assistance</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Supporting scholars and researchers in their academic journey
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">M.Phil & PhD Support</h3>
                <div class="space-y-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Research Guidance</h4>
                        <p class="text-gray-600">
                            Expert guidance for research methodology, experimental design, and data analysis in fisheries sciences
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Laboratory Facilities</h4>
                        <p class="text-gray-600">
                            Access to well-equipped laboratories for water quality analysis, fish health diagnosis, and feed testing
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Field Support</h4>
                        <p class="text-gray-600">
                            Assistance with field experiments, sample collection, and on-site research activities
                        </p>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Research Facilities</h3>
                <div class="space-y-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Modern Laboratory</h4>
                        <p class="text-gray-600">
                            State-of-the-art laboratory with advanced equipment for fisheries research
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Research Library</h4>
                        <p class="text-gray-600">
                            Extensive collection of books, journals, and research papers in fisheries and allied sciences
                        </p>
                    </div>
                    
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Computer Lab</h4>
                        <p class="text-gray-600">
                            Computing facilities with statistical software for data analysis and research work
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Publications -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Research Publications</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            Our contributions to scientific literature and knowledge dissemination
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while($research = $researches->fetch_assoc()): ?>
                <div class="bg-blue-50 p-8 rounded-lg shadow-lg hover-scale">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-flask text-white text-2xl"></i>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                        <?= htmlspecialchars($research['research_title']) ?>
                    </h3>

                    <p class="text-gray-600 text-center">
                        <?= nl2br(htmlspecialchars($research['research_description'])) ?>
                    </p>
                </div>
            <?php endwhile; ?>
        </div>

        
        <div class="text-center mt-12">
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-colors">
                View All Publications
            </a>
        </div>
    </div>
</section>

<!-- Consultancy Services -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Consultancy Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Expert consultancy services for fisheries and aquaculture industry
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-clipboard-check text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Project Feasibility</h3>
                <p class="text-gray-600 text-center">
                    Feasibility studies for new aquaculture projects including technical and economic analysis
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-cogs text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Technical Support</h3>
                <p class="text-gray-600 text-center">
                    Technical assistance for existing aquaculture operations and troubleshooting
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Business Planning</h3>
                <p class="text-gray-600 text-center">
                    Business plan development and market analysis for aquaculture ventures
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-graduation-cap text-orange-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Training Programs</h3>
                <p class="text-gray-600 text-center">
                    Customized training programs for industry professionals and entrepreneurs
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-certificate text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Certification</h3>
                <p class="text-gray-600 text-center">
                    Quality certification and compliance assistance for aquaculture products
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-globe text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Export Guidance</h3>
                <p class="text-gray-600 text-center">
                    Guidance for export procedures and international market requirements
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Ongoing Projects -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Ongoing Research Projects</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Current research initiatives contributing to scientific knowledge
            </p>
        </div>
        
        <div class="space-y-8">
            <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
                <div class="flex items-start">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-microscope text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Development of Low-Cost Fish Feed</h3>
                        <p class="text-gray-600 mb-4">
                            Research on developing cost-effective and nutritionally balanced fish feed using locally available ingredients
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div class="text-sm">
                                <span class="font-semibold text-gray-700">Duration:</span> 2023-2025
                            </div>
                            <div class="text-sm">
                                <span class="font-semibold text-gray-700">Funding:</span> ICAR
                            </div>
                            <div class="text-sm">
                                <span class="font-semibold text-gray-700">Status:</span> In Progress
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
                <div class="flex items-start">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mr-6 flex-shrink-0">
                        <i class="fas fa-dna text-green-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-3">Genetic Improvement in Carps</h3>
                        <p class="text-gray-600 mb-4">
                            Selective breeding program for genetic improvement of growth rate and disease resistance in Indian major carps
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div class="text-sm">
                                <span class="font-semibold text-gray-700">Duration:</span> 2022-2026
                            </div>
                            <div class="text-sm">
                                <span class="font-semibold text-gray-700">Funding:</span> DST
                            </div>
                            <div class="text-sm">
                                <span class="font-semibold text-gray-700">Status:</span> In Progress
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 gradient-bg text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Collaborate With Us</h2>
        <p class="text-xl mb-8">
            Join our research initiatives or seek our consultancy services for your aquaculture projects
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://neelkranti.webfiredegitech.com/contact" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3 rounded-full font-semibold transition-colors">
                Discuss Research Collaboration
            </a>
            <a href="https://neelkranti.webfiredegitech.com/contact" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-3 rounded-full font-semibold transition-colors">
                Request Consultancy Services
            </a>
        </div>
    </div>
</section>
    </main>


<?php include 'includes/footer.php'; ?>
