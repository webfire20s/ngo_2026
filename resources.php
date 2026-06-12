<?php
require 'includes/db.php';
require 'includes/header.php';
require 'includes/navbar.php';


$search = trim($_GET['search'] ?? '');
$category = trim($_GET['category'] ?? '');

$query = "
    SELECT *
    FROM educational_materials
    WHERE is_public = 1
";

$params = [];

/* SEARCH */
if (!empty($search)) {

    $query .= "
        AND (
            title LIKE ?
            OR description LIKE ?
        )
    ";

    $params[] = "%{$search}%";
    $params[] = "%{$search}%";
}

/* CATEGORY */
if (!empty($category)) {

    $query .= "
        AND category = ?
    ";

    $params[] = $category;
}

$query .= "
    ORDER BY created_at DESC
";

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$materials = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* CATEGORIES */
$categories = $pdo->query("
    SELECT DISTINCT category
    FROM educational_materials
    WHERE is_public = 1
    ORDER BY category
")->fetchAll(PDO::FETCH_COLUMN);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">

    <!-- हेडर सेक्शन (Saffron Spiritual / Corporate Heading) -->
    <div class="text-center mb-16" data-aos="fade-up">
        <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-[#FF5722] bg-orange-50 px-4 py-1.5 rounded-full">॥ ज्ञानम् सर्वगुण प्रधानम् ॥</span>
        <h1 class="text-3xl md:text-5xl font-bold text-gray-900 brand-font mt-4 tracking-tight">
            ज्ञान और <span class="text-[#FF5722]">साहित्य केंद्र</span>
        </h1>
        <p class="text-gray-500 mt-4 text-sm md:text-base max-w-xl mx-auto font-medium leading-relaxed">
            शैक्षणिक संसाधन, प्रशिक्षण सामग्री, संगठन के आधिकारिक दस्तावेज, मार्गदर्शिकाएँ और राष्ट्रवादी विचार विमर्श।
        </p>
    </div>

    <!-- सर्च एवं फ़िल्टर फ़ॉर्म (Modernized Search Engine Area) -->
    <form method="GET" class="bg-gray-50 border border-gray-100 rounded-[2rem] p-6 mb-12 shadow-xs" data-aos="fade-up" data-aos-delay="100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="relative">
                <input
                    type="text"
                    name="search"
                    value="<?= htmlspecialchars($search) ?>"
                    placeholder="सामग्री खोजें (Search resources...)"
                    class="w-full bg-white border border-gray-200 rounded-full pl-6 pr-4 py-3.5 text-sm focus:ring-2 focus:ring-[#FF5722] focus:border-transparent transition-all outline-none font-medium text-gray-800"
                >
            </div>

            <div class="relative">
                <select
                    name="category"
                    class="w-full bg-white border border-gray-200 rounded-full px-6 py-3.5 text-sm focus:ring-2 focus:ring-[#FF5722] focus:border-transparent transition-all outline-none appearance-none cursor-pointer font-medium text-gray-800"
                >
                    <option value="">सभी श्रेणियाँ (All Categories)</option>
                    <?php foreach($categories as $cat): ?>
                        <option
                            value="<?= htmlspecialchars($cat) ?>"
                            <?= $category === $cat ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars($cat) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>

            <button class="w-full bg-[#111827] text-white rounded-full py-3.5 text-xs font-bold uppercase tracking-widest hover:bg-[#FF5722] transition-all duration-300 shadow-md shadow-gray-200 hover:shadow-orange-200">
                खोजें (Search)
            </button>

        </div>
    </form>

    <!-- खाली स्थिति संदेश (Empty State Handling) -->
    <?php if(empty($materials)): ?>
        <div class="bg-white rounded-3xl border-2 border-dashed border-gray-100 p-16 text-center" data-aos="fade-up">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <h3 class="text-lg font-bold text-gray-800 brand-font">कोई सामग्री नहीं मिली</h3>
            <p class="text-xs text-gray-400 mt-1 font-medium">कृपया कोई अन्य शब्द लिखकर खोजने का प्रयास करें।</p>
        </div>
    <?php endif; ?>

    <!-- सामग्री ग्रिड लिस्टिंग (Resources/Materials Grid Layout) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <?php foreach($materials as $m): ?>
            <div class="bg-white border border-gray-100 rounded-[2rem] p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between" data-aos="fade-up">
                
                <div>
                    <!-- श्रेणी टैग (Category Dynamic Label) -->
                    <div class="mb-4">
                        <span class="bg-orange-50 text-[#FF5722] px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                            <?= htmlspecialchars($m['category']) ?>
                        </span>
                    </div>

                    <!-- शीर्षक (Material Title) -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 leading-snug hover:text-[#FF5722] transition-colors duration-200">
                        <?= htmlspecialchars($m['title']) ?>
                    </h3>

                    <!-- विवरण (Description Snippet) -->
                    <?php if(!empty($m['description'])): ?>
                        <p class="text-gray-500 text-sm mb-4 leading-relaxed line-clamp-3 font-medium">
                            <?= nl2br(htmlspecialchars(substr($m['description'], 0, 180))) ?>...
                        </p>
                    <?php endif; ?>
                </div>

                <div>
                    <!-- डाउनलोड काउंटर स्टेटस बार -->
                    <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-5 flex items-center gap-2 border-t border-gray-50 pt-4">
                        <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                        कुल डाउनलोड: <span class="text-[#111827] font-extrabold"><?= (int)$m['downloads'] ?></span>
                    </div>

                    <!-- इंटरएक्टिव एक्शन बटन्स -->
                    <div class="flex flex-wrap gap-2.5">

                        <?php if(!empty($m['file_path'])): ?>
                            <a
                                href="download_material.php?id=<?= $m['id'] ?>"
                                class="flex-1 bg-[#111827] hover:bg-[#FF5722] text-white text-center px-4 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 shadow-sm"
                            >
                                डाउनलोड करें
                            </a>
                        <?php endif; ?>

                        <?php if(!empty($m['youtube_url'])): ?>
                            <a
                                href="<?= htmlspecialchars($m['youtube_url']) ?>"
                                target="_blank"
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white text-center px-4 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300 shadow-sm flex items-center justify-center gap-1.5"
                            >
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                वीडियो देखें
                            </a>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    </div>

</div>

<!-- अपडेटेड फुटर पाथ इंटीग्रेशन -->
<?php require 'includes/web_footer.php'; ?>