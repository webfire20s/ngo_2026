<?php
require 'includes/db.php';

$stmt = $pdo->query("
    SELECT u.name,u.profile_photo, m.referral_code, d.title
    FROM users u
    JOIN memberships m ON u.id = m.user_id
    JOIN designations d ON m.designation_id = d.id
    WHERE m.status = 'active'
    ORDER BY u.name ASC
");

$members = $stmt->fetchAll();

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="pt-40 pb-16 bg-gradient-to-b from-orange-50/50 to-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center">
        <div data-aos="fade-up">
            <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">॥ संघे शक्तिः कलियुगे ॥</span>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-4">हमारे सदस्य (Our Members)</h1>
            <div class="h-[3px] w-16 bg-[#FF5722] mx-auto mt-4"></div>
        </div>
    </div>
</section>

<section class="py-12 bg-white pb-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php foreach ($members as $m): ?>
            <div class="group bg-white p-8 rounded-3xl border border-gray-100 hover:border-orange-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between h-full" data-aos="fade-up">
                
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <?php if(!empty($m['profile_photo'])): ?>

                            <div class="w-16 h-16 rounded-2xl overflow-hidden border border-gray-100 shadow-xs flex-shrink-0">
                                <img
                                    src="uploads/profile_photos/<?php echo htmlspecialchars($m['profile_photo']); ?>"
                                    alt="<?php echo htmlspecialchars($m['name']); ?>"
                                    class="w-full h-full object-cover"
                                >
                            </div>

                        <?php else: ?>

                            <div class="w-16 h-16 bg-orange-50 rounded-2xl border border-orange-100 flex items-center justify-center text-xl font-bold text-[#FF5722]">
                                <?php echo strtoupper(substr(htmlspecialchars($m['name']),0,1)); ?>
                            </div>

                        <?php endif; ?>
                        
                        <span class="text-[10px] uppercase tracking-wider font-bold px-3 py-1 bg-gray-50 border border-gray-100 text-gray-500 rounded-full">
                            ID: <?php echo $m['referral_code']; ?>
                        </span>
                    </div>

                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-[#FF5722] transition-colors duration-300">
                            <?php echo htmlspecialchars($m['name']); ?>
                        </h3>
                        <div class="flex items-center gap-2">
                            <div class="h-[1px] w-3 bg-[#FF5722]"></div>
                            <p class="text-xs uppercase tracking-wider font-bold text-gray-400">
                                <?php echo htmlspecialchars($m['title']); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t border-gray-50 flex justify-end">
                    <svg class="w-5 h-5 text-gray-300 group-hover:text-[#FF5722] transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <?php if (empty($members)): ?>
        <div class="text-center py-24 bg-gray-50 rounded-3xl border border-dashed border-gray-200">
            <p class="text-gray-400 uppercase tracking-wider text-xs font-bold">कोई सक्रिय सदस्य उपलब्ध नहीं हैं (No active members found)</p>
        </div>
        <?php endif; ?>

    </div>
</section>

<section class="py-20 bg-[#FF5722] text-white rounded-3xl mx-6 lg:mx-12 mb-10 shadow-md">
    <div class="max-w-7xl mx-auto px-8 lg:px-12">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-10">
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight mb-2">क्या आप हमारी समिति से जुड़ना चाहते हैं?</h2>
                <p class="text-xs text-orange-100/80 font-medium max-w-xl leading-relaxed">सनातन मूल्यों की पुनर्स्थापना और सामाजिक सशक्तिकरण के हमारे साझा सेवा प्रकल्पों का हिस्सा बनें। आज ही सदस्यता हेतु अपना आवेदन जमा करें।</p>
            </div>
            <a href="register.php" class="w-full lg:w-auto flex-shrink-0">
                <button class="w-full lg:w-auto bg-gray-900 text-white px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-white hover:text-gray-900 transition-colors shadow-sm">
                    सदस्यता के लिए आवेदन करें
                </button>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/web_footer.php'; ?>