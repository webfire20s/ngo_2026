<?php
require 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

/* FETCH GALLERY */
$stmt = $pdo->query("
    SELECT *
    FROM gallery
    ORDER BY id DESC
");

$gallery = $stmt->fetchAll();
?>

<section class="pt-40 pb-16 bg-gradient-to-b from-orange-50/50 to-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center">
        <div data-aos="fade-up">
            <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">
                ॥ दृश्य गाथा - सेवा दर्शन ॥
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-4">
                चित्र वीथिका (Gallery)
            </h1>

            <div class="h-[3px] w-16 bg-[#FF5722] mx-auto mt-4"></div>
        </div>
    </div>
</section>

<section class="py-12 bg-white pb-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        <?php if(count($gallery) > 0): ?>

            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">

                <?php foreach($gallery as $index => $g): ?>
                    <div
                        class="relative group overflow-hidden bg-white border border-gray-100 rounded-3xl break-inside-avoid shadow-xs hover:shadow-xl hover:border-orange-100 transition-all duration-300"
                        data-aos="fade-up"
                        data-aos-delay="<?php echo ($index % 3) * 100; ?>"
                    >
                        <img
                            src="uploads/gallery/<?php echo htmlspecialchars($g['image']); ?>"
                            class="w-full h-auto object-cover block transition-all duration-700 group-hover:scale-105 opacity-95 group-hover:opacity-100"
                            alt="<?php echo htmlspecialchars($g['title']); ?>"
                        >

                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent p-6 pt-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-orange-400 mb-1">
                                सेवा प्रकल्प स्मृति
                            </span>
                            <p class="text-white text-base font-bold tracking-tight">
                                <?php echo htmlspecialchars($g['title']); ?>
                            </p>
                            <div class="h-[2px] w-8 bg-[#FF5722] mt-3 rounded-full"></div>
                        </div>

                    </div>
                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div
                class="rounded-3xl bg-gray-50 border border-dashed border-gray-200 p-20 text-center"
                data-aos="zoom-in"
            >
                <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">सूचना पट्ट</span>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight mb-3">
                    चित्र वीथिका शीघ्र उपलब्ध होगी
                </h2>
                <p class="text-gray-400 text-sm font-medium max-w-md mx-auto leading-relaxed">
                    हमारे सेवा प्रकल्पों, सांस्कृतिक उत्सवों और महत्वपूर्ण सनातनी आयोजनों की स्मृतियाँ शीघ्र ही इस पटल पर अद्यतित की जाएंगी।
                </p>
            </div>

        <?php endif; ?>

    </div>
</section>

<section class="py-24 bg-gray-950 text-center border-t border-gray-900 overflow-hidden rounded-t-[3rem] mx-4 md:mx-0">
    <div class="max-w-7xl mx-auto px-6 lg:px-12" data-aos="zoom-in">

        <h2 class="text-gray-400 text-2xl md:text-3xl font-medium tracking-tight mb-8">
            सांस्कृतिक राष्ट्रवाद और सामाजिक परिवर्तन के जीवंत क्षण।
        </h2>

        <div class="flex justify-center items-center gap-3">
            <div class="w-6 h-[1px] bg-white/10"></div>
            <div class="w-12 h-[2px] bg-[#FF5722] rounded-full"></div>
            <div class="w-6 h-[1px] bg-white/10"></div>
        </div>

    </div>
</section>

<?php include 'includes/web_footer.php'; ?>