<?php

require 'includes/db.php';

/* MAIN MENUS */
$stmt = $pdo->prepare("
    SELECT *
    FROM menus
    WHERE menu_type='main'
    AND status=1
    ORDER BY sort_order ASC
");

$stmt->execute();

$nav_items = [];

while($row = $stmt->fetch()){
    $nav_items[$row['menu_link']] = $row['menu_name'];
}

/* DROPDOWN MENUS */
$stmt = $pdo->prepare("
    SELECT *
    FROM menus
    WHERE menu_type='dropdown'
    AND status=1
    ORDER BY sort_order ASC
");

$stmt->execute();

$dropdown_items = [];

while($row = $stmt->fetch()){
    $dropdown_items[$row['menu_link']] = $row['menu_name'];
}

?>

<style>
    /* गूगल विजेट के डिफॉल्ट बॉर्डर और फ्रेम को क्लीन करने के लिए */
    .goog-te-gadget-simple {
        background-color: transparent !important;
        border: 1px solid #e5e7eb !important;
        padding: 4px 12px !important;
        border-radius: 9999px !important;
        cursor: pointer !important;
        display: inline-flex !important;
        align-items: center !important;
    }
    .goog-te-gadget-img { display: none !important; }
    .goog-te-menu-value span { color: #374151 !important; font-size: 12px !important; font-weight: 600 !important; }
    
    /* मोबाइल व्यू के लिए वाइट थीम ओवरराइड */
    .mobile-translate .goog-te-gadget-simple {
        background-color: rgba(255, 255, 255, 0.15) !important;
        border: 1px solid rgba(255, 255, 255, 0.25) !important;
    }
    .mobile-translate .goog-te-menu-value span { color: #ffffff !important; }
    
    /* टॉप बार बैनर छुपाने के लिए */
    .goog-te-banner-frame.skiptranslate, .goog-te-balloon-frame { display: none !important; }
    body { top: 0px !important; }
</style>

<div class="fixed top-0 w-full z-[100] bg-white shadow-sm">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 hidden md:block">
        <div class="flex justify-between items-center h-24 border-b border-gray-100">
            
            <div class="flex-shrink-0 flex items-center">
                <a href="index.php" class="text-2xl font-bold tracking-tight text-gray-900 brand-font flex items-center gap-3">
                    <img src="assets/logo.jpg" alt="विश्व हिंदू महासंघ" class="w-12 h-12 object-contain rounded-full shadow-md">
                    
                    <div>
                        <span class="block text-xl leading-tight font-extrabold uppercase tracking-tight text-gray-900">आर्यवर्त विश्व सनातन बिकास परिषद</span>
                        <span class="block text-[10px] text-gray-400 tracking-widest uppercase font-bold">॥ यतो धर्मस्ततो जयः ॥</span>
                    </div>
                </a>
            </div>

            <div class="flex items-center space-x-6">
                
                <div class="flex items-center">
                    <div id="google_translate_desktop" class="inline-block align-middle"></div>
                </div>
                
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-[#FF5722] bg-orange-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0l-7.5-4.615a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[9px] font-bold tracking-wider text-gray-400 uppercase">ईमेल संपर्क</span>
                        <a href="mailto:vishwakhindumahasanghmrt@gmail.com" class="text-xs font-semibold text-gray-700 hover:text-[#FF5722]">vishwakhindumahasanghmrt@gmail.com</a>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-[#FF5722] bg-orange-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-6 18.75h12"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-[9px] font-bold tracking-wider text-gray-400 uppercase">दूरभाष संपर्क</span>
                        <a href="tel:9784555289" class="text-xs font-bold text-gray-700 hover:text-[#FF5722]">9784555289</a>
                    </div>
                </div>

                <a href="register.php" class="bg-[#FF5722] text-white px-5 py-2.5 rounded-full text-xs font-bold hover:bg-gray-900 transition-colors duration-300 shadow-sm">
                    सदस्यता पंजीकरण
                </a>
            </div>
        </div>
    </div>

    <nav class="bg-[#FF5722] border-b border-orange-600 rounded-b-2xl md:rounded-none">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14">
                
                <div class="flex-shrink-0 flex items-center md:hidden">
                    <a href="index.php" class="text-base font-bold text-white brand-font flex items-center gap-2">
                        <img src="assets/logo.jpg" alt="विश्व हिंदू महासंघ" class="w-7 h-7 object-contain bg-white rounded-full p-0.5">
                        आर्यवर्त विश्व सनातन बिकास परिषद
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        मुख्य पृष्ठ 
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>

                    <div class="relative group/dropdown py-2">
                        <button type="button" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 flex items-center gap-1.5 focus:outline-none">
                            <span>हमारे परिचय </span>
                            <svg class="w-3 h-3 text-orange-200 group-hover/dropdown:text-black transition-transform duration-300 group-hover/dropdown:rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                            </svg>
                        </button>
                        
                        <div class="absolute left-0 mt-2 w-52 bg-white border border-gray-100 rounded-2xl shadow-xl opacity-0 invisible translate-y-2 group-hover/dropdown:opacity-100 group-hover/dropdown:visible group-hover/dropdown:translate-y-0 transition-all duration-200 overflow-hidden py-1.5 z-50">
                            <?php foreach($dropdown_items as $file => $name): ?>
                            <a href="<?php echo $file; ?>" class="block px-5 py-2.5 text-[13px] font-medium text-gray-700 hover:text-white hover:bg-[#FF5722] transition-colors">
                                <?php echo $name; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    

                    <a href="donate.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        हमारे अभियान
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                    <a href="donate.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        सहयोग राशि
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                    <a href="notices.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        सदस्य
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                    <a href="notices.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        सूचना पट्ट
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                    <a href="gallery.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        चित्र वीथिका
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                    <a href="contact.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        संपर्क सूत्र
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                    <a href="resources.php" class="px-4 py-2 text-[14px] font-bold text-white hover:text-black transition-colors duration-300 relative group">
                        साहित्य केंद्र
                        <span class="absolute bottom-1 left-4 right-4 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 rounded-full"></span>
                    </a>
                </div>

                <div class="hidden md:flex items-center">
                    <a href="donate.php" class="bg-white text-[#FF5722] px-5 py-1.5 rounded-full text-[12px] font-bold hover:bg-orange-50 transition shadow-xs">
                        सहयोग करें
                    </a>
                </div>

                <div class="md:hidden flex items-center gap-3">
                    <div id="google_translate_mobile" class="mobile-translate scale-90 origin-right"></div>
                    
                    <button id="mobile-menu-toggle" type="button" class="p-2 text-white hover:text-black focus:outline-none" aria-label="Toggle Navigation Menu">
                        <svg class="w-6 h-6 transition-transform duration-300" id="hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-orange-600 bg-[#FF5722] max-h-[calc(100vh-3.5rem)] overflow-y-auto rounded-b-2xl shadow-inner">
            <div class="px-4 pt-2 pb-6 space-y-1">
                
                <a href="index.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">मुख्य पृष्ठ</a>
                
                <div class="space-y-1">
                    <button id="mobile-dropdown-toggle" type="button" class="w-full flex justify-between items-center px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors focus:outline-none">
                        <span>हमारे बारे में</span>
                        <svg id="mobile-dropdown-arrow" class="w-3 h-3 text-orange-200 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                        </svg>
                    </button>
                    <div id="mobile-dropdown-container" class="hidden pl-4 bg-orange-700/30 rounded-xl space-y-1 py-1">
                        <?php foreach($dropdown_items as $file => $name): ?>
                        <a href="<?php echo $file; ?>" class="block px-4 py-2 text-[13px] font-medium text-orange-50 hover:text-white transition-colors">
                            <?php echo $name; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                


                <a href="campaigns.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    हमारे अभियान
                </a>
                <a href="donate.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    सहयोग राशि
                </a>
                <a href="members.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    सदस्य
                </a>
                <a href="notices.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    सूचना पट्ट
                </a>
                <a href="gallery.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    चित्र वीथिका
                </a>
                <a href="contact.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    संपर्क सूत्र
                </a>
                <a href="resources.php" class="block px-4 py-2.5 rounded-xl text-[14px] font-bold text-white hover:bg-orange-600 transition-colors">
                    साहित्य केंद्र
                </a>

                <div class="pt-4 px-2">
                    <a href="register.php" class="block w-full bg-white text-[#FF5722] text-center py-3 rounded-full text-[14px] font-bold hover:bg-orange-50 transition shadow-md">
                        सदस्यता पंजीकरण
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="h-14 md:h-[152px]"></div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    
    const dropdownToggle = document.getElementById('mobile-dropdown-toggle');
    const dropdownContainer = document.getElementById('mobile-dropdown-container');
    const dropdownArrow = document.getElementById('mobile-dropdown-arrow');

    // Toggle Mobile Main Menu Drawer Panel
    menuToggle.addEventListener('click', () => {
        const isHidden = mobileMenu.classList.contains('hidden');
        if (isHidden) {
            mobileMenu.classList.remove('hidden');
            hamburgerIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
        } else {
            mobileMenu.classList.add('hidden');
            hamburgerIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>';
        }
    });

    // Toggle Inner Nested Mobile Dropdown Layout
    dropdownToggle.addEventListener('click', () => {
        const isDropdownHidden = dropdownContainer.classList.contains('hidden');
        if (isDropdownHidden) {
            dropdownContainer.classList.remove('hidden');
            dropdownArrow.classList.add('rotate-180');
        } else {
            dropdownContainer.classList.add('hidden');
            dropdownArrow.classList.remove('rotate-180');
        }
    });
});
</script>