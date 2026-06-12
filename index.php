<?php include 'includes/header.php'; ?>
<?php 
require 'includes/db.php';
include 'includes/navbar.php'; ?>
<?php

$latestNotices = $pdo->query("
    SELECT
        id,
        title,
        category,
        short_description,
        created_at
    FROM notices
    ORDER BY created_at DESC
    LIMIT 3
")->fetchAll(PDO::FETCH_ASSOC);

$latestEvents = $pdo->query("
    SELECT
        id,
        title,
        short_description,
        event_date,
        event_time
    FROM events
    ORDER BY event_date ASC
    LIMIT 3
")->fetchAll(PDO::FETCH_ASSOC);

$latestResources = $pdo->query("
    SELECT
        id,
        title,
        category,
        description
    FROM educational_materials
    WHERE is_public = 1
    ORDER BY created_at DESC
    LIMIT 3
")->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- <div class="bg-gray-900 text-white px-6 py-2 flex justify-between items-center text-[11px] font-mono border-b border-gray-800">
    <div class="flex items-center gap-2">
        <span class="w-2 h-2 bg-[#FF5722] animate-ping"></span>
        <span class="uppercase tracking-widest text-gray-400">भाषा / Language Selection:</span>
    </div>
    <div id="google_element" class="text-gray-900 rounded-none overflow-hidden scale-90 origin-right"></div>
</div> -->

<section class="relative h-screen w-full overflow-hidden bg-black">
    <div class="swiper mySwiper h-full w-full">
        <div class="swiper-wrapper h-full w-full">
            <div class="swiper-slide relative h-full w-full">
                <div class="absolute inset-0 bg-gradient-to-r from-[#FF5722]/50 via-black/40 to-black/80 z-10"></div>
                <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070" class="w-full h-full object-cover opacity-80">
                
                <div class="absolute inset-0 flex items-center justify-center text-center px-6 z-20">
                    <div data-aos="zoom-out" data-aos-duration="1500" class="space-y-6">
                        <span class="text-[12px] font-extrabold uppercase tracking-[0.4em] text-orange-200 bg-[#FF5722] px-3 py-1 inline-block">॥ सत्यमेव जयते ॥</span>
                        <h1 class="text-4xl md:text-7xl font-black text-white uppercase tracking-tight leading-tight">
                            सनातन सेवा और <br><span class="text-orange-400">सांस्कृतिक पुनरुत्थान</span>
                        </h1>
                        <p class="text-base md:text-lg text-orange-50 mb-10 max-w-2xl mx-auto font-medium leading-relaxed">
                            हम सामाजिक कल्याण, प्राचीन धरोहर के संरक्षण और राष्ट्र निर्माण के प्रति समर्पित हैं। आइए, नि:स्वार्थ सेवा और धर्म के इस पावन मार्ग से जुड़कर एक सशक्त भविष्य का निर्माण करें।
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
                            <a href="campaigns.php" class="w-full sm:w-auto">
                                <button class="w-full sm:w-auto px-10 py-4 bg-white text-gray-900 font-black uppercase text-[11px] tracking-widest rounded-none hover:bg-[#FF5722] hover:text-white transition-all duration-300 shadow-lg">
                                    अभियान देखें (Campaigns)
                                </button>
                            </a>
                            <a href="donate.php" class="w-full sm:w-auto">
                                <button class="w-full sm:w-auto px-10 py-4 border-2 border-white text-white font-black uppercase text-[11px] tracking-widest rounded-none hover:bg-white hover:text-[#FF5722] transition-all duration-300 shadow-lg">
                                    अभी सेवा निधि दें (Donate Now)
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-[#FF5722] text-white border-b border-[#e04c1d] shadow-inner relative z-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-orange-400/30">
            
            <div data-aos="fade-up" data-aos-delay="100" class="border-none">
                <h3 class="text-4xl md:text-5xl font-black mb-1 tracking-tight">
                    <span class="stat-counter" data-target="120">0</span>+
                </h3>
                <p class="text-[10px] uppercase tracking-widest text-orange-100 font-extrabold">सक्रिय सेवा कार्य (Projects)</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-4xl md:text-5xl font-black mb-1 tracking-tight">
                    <span class="stat-counter" data-target="15">0</span>के
                </h3>
                <p class="text-[10px] uppercase tracking-widest text-orange-100 font-extrabold">राष्ट्र स्वयंसेवक (Volunteers)</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-4xl md:text-5xl font-black mb-1 tracking-tight">
                    <span class="stat-counter" data-target="50">0</span>+
                </h3>
                <p class="text-[10px] uppercase tracking-widest text-orange-100 font-extrabold">लाभान्वित समाज (Communities)</p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="400">
                <h3 class="text-4xl md:text-5xl font-black mb-1 tracking-tight">
                    <span class="stat-counter" data-target="5">0</span>म+
                </h3>
                <p class="text-[10px] uppercase tracking-widest text-orange-100 font-extrabold">धर्म कोष संग्रह (Funds Raised)</p>
            </div>
            
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.stat-counter');
    const speed = 60;

    const startCounting = (counter) => {
        const target = +counter.getAttribute('data-target');
        const updateCount = () => {
            const initialCount = +counter.innerText;
            const increment = Math.ceil(target / speed);

            if (initialCount < target) {
                counter.innerText = initialCount + increment > target ? target : initialCount + increment;
                setTimeout(updateCount, 25);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    };

    const observerOptions = {
        root: null,
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounting(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    counters.forEach(counter => observer.observe(counter));
});
</script>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="flex flex-col md:flex-row justify-between items-baseline mb-12 border-b-2 border-gray-900 pb-4" data-aos="fade-right">
            <div>
                <span class="text-[12px] font-extrabold uppercase tracking-wider text-[#FF5722] mb-1 block">कार्य पद्धति</span>
                <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight">हमारे मुख्य संकल्प एवं उद्देश्य</h2>
            </div>
            <a href="objectives.php" class="text-xs font-extrabold uppercase tracking-widest text-[#FF5722] hover:text-gray-900 border-b-2 border-[#FF5722] pb-1 transition-colors mt-4 md:mt-0">सभी संकल्प देखें</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border-2 border-gray-900 shadow-xl">
            
            <div class="bg-[#FF5722] text-white p-10 flex flex-col justify-between items-center text-center transition-all duration-300 hover:bg-gray-900" data-aos="fade-up" data-aos-delay="100">
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 bg-white text-gray-900 font-mono font-black flex items-center justify-center mb-6 text-base rounded-none shadow-md">01</div>
                    <h4 class="text-2xl font-black mb-3 uppercase tracking-tight">विद्या दान (Education)</h4>
                    <p class="text-orange-100 text-sm leading-relaxed font-medium mb-8">वंचित समाज के बच्चों को आधुनिक शिक्षा के साथ-साथ नैतिक एवं सांस्कृतिक मूल्यों से समृद्ध करना।</p>
                </div>
                <a href="objectives.php" class="w-full">
                    <button class="w-full border-2 border-white text-white py-2.5 px-4 rounded-none text-xs font-extrabold uppercase tracking-widest bg-transparent hover:bg-white hover:text-gray-900 transition-all">
                        विस्तार से पढ़ें
                    </button>
                </a>
            </div>
            
            <div class="bg-[#f3521e] text-white p-10 flex flex-col justify-between items-center text-center transition-all duration-300 hover:bg-gray-900" data-aos="fade-up" data-aos-delay="200">
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 bg-white text-gray-900 font-mono font-black flex items-center justify-center mb-6 text-base rounded-none shadow-md">02</div>
                    <h4 class="text-2xl font-black mb-3 uppercase tracking-tight">स्वास्थ्य एवं आरोग्य</h4>
                    <p class="text-orange-100 text-sm leading-relaxed font-medium mb-8">ग्रामीण एवं दूरस्थ क्षेत्रों में चिकित्सा शिविरों का आयोजन और आयुर्वेद व स्वास्थ्य सेवाओं का विस्तार।</p>
                </div>
                <a href="objectives.php" class="w-full">
                    <button class="w-full border-2 border-white text-white py-2.5 px-4 rounded-none text-xs font-extrabold uppercase tracking-widest bg-transparent hover:bg-white hover:text-gray-900 transition-all">
                        विस्तार से पढ़ें
                    </button>
                </a>
            </div>
            
            <div class="bg-[#e44d1c] text-white p-10 flex flex-col justify-between items-center text-center transition-all duration-300 hover:bg-gray-900" data-aos="fade-up" data-aos-delay="300">
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 bg-white text-gray-900 font-mono font-black flex items-center justify-center mb-6 text-base rounded-none shadow-md">03</div>
                    <h4 class="text-2xl font-black mb-3 uppercase tracking-tight">सामाजिक समरसता</h4>
                    <p class="text-orange-100 text-sm leading-relaxed font-medium mb-8">समाज के सभी वर्गों में परस्पर समानता, न्याय और ऐतिहासिक धरोहर के प्रति गौरव की भावना जगाना।</p>
                </div>
                <a href="objectives.php" class="w-full">
                    <button class="w-full border-2 border-white text-white py-2.5 px-4 rounded-none text-xs font-extrabold uppercase tracking-widest bg-transparent hover:bg-white hover:text-gray-900 transition-all">
                        विस्तार से पढ़ें
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= SECTION 1: सूचनाएं एवं विज्ञप्तियां (NOTICES) ================= -->
<section class="py-16 md:py-24 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- सेक्शन हेडर -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
            <div>
                <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-[#FF5722] bg-orange-50 px-4 py-1.5 rounded-full inline-block mb-3">॥ आवश्यक सूचनाएं ॥</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-950 brand-font tracking-tight">नवीनतम <span class="text-[#FF5722]">विज्ञप्तियां</span></h2>
            </div>
            <a href="notices.php" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#FF5722] hover:text-gray-950 transition-colors duration-300 border-b-2 border-orange-100 pb-1">
                सभी सूचनाएं देखें 
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <!-- भगवा कार्ड्स ग्रिड (Bhagwaa Cards Grid) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($latestNotices as $notice): ?>
                <div class="bg-[#FF5722] text-white rounded-[2.5rem] p-6 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between" data-aos="fade-up">
                    <div>
                        <span class="bg-white/20 text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider backdrop-blur-xs">
                            <?= htmlspecialchars($notice['category']) ?>
                        </span>
                        <h4 class="font-bold text-white text-lg mt-4 mb-2 line-clamp-2 leading-snug">
                            <?= htmlspecialchars($notice['title']) ?>
                        </h4>
                        <p class="text-sm text-orange-50 font-medium leading-relaxed line-clamp-3">
                            <?= htmlspecialchars($notice['short_description']) ?>
                        </p>
                    </div>
                    <div class="text-[11px] font-bold text-orange-200 uppercase tracking-wider mt-6 pt-4 border-t border-white/10 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <?= date('d M Y', strtotime($notice['created_at'])) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ================= SECTION 2: आगामी कार्यक्रम (EVENTS) ================= -->
<section class="py-16 md:py-24 bg-gray-50 border-t border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- सेक्शन हेडर -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
            <div>
                <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-[#FF5722] bg-orange-100/50 px-4 py-1.5 rounded-full inline-block mb-3">॥ संगठन की गतिविधियाँ ॥</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-950 brand-font tracking-tight">आगामी <span class="text-[#FF5722]">कार्यक्रम एवं उत्सव</span></h2>
            </div>
            <a href="events.php" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#FF5722] hover:text-gray-950 transition-colors duration-300 border-b-2 border-orange-200 pb-1">
                सभी कार्यक्रम देखें
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <!-- भगवा कार्ड्स ग्रिड (Bhagwaa Cards Grid) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($latestEvents as $event): ?>
                <div class="bg-[#FF5722] text-white rounded-[2.5rem] p-6 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between" data-aos="fade-up">
                    <div>
                        <div class="w-10 h-10 bg-white/10 rounded-2xl flex items-center justify-center text-white mb-4 backdrop-blur-xs">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        </div>
                        <h4 class="font-bold text-white text-lg mb-2 line-clamp-2 leading-snug">
                            <?= htmlspecialchars($event['title']) ?>
                        </h4>
                        <p class="text-sm text-orange-50 font-medium leading-relaxed line-clamp-3">
                            <?= htmlspecialchars($event['short_description']) ?>
                        </p>
                    </div>
                    
                    <div class="text-[11px] font-bold text-orange-100 uppercase tracking-wider mt-6 pt-4 border-t border-white/10 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <?= date('d M Y', strtotime($event['event_date'])) ?>
                        <?php if(!empty($event['event_time'])): ?>
                            <span class="text-white/30">|</span> <span class="text-orange-200"><?= htmlspecialchars($event['event_time']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ================= SECTION 3: साहित्य एवं ज्ञान केंद्र (RESOURCES) ================= -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- सेक्शन हेडर -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
            <div>
                <span class="text-[10px] uppercase tracking-[0.2em] font-bold text-[#FF5722] bg-orange-50 px-4 py-1.5 rounded-full inline-block mb-3">॥ डिजिटल पुस्तकालय ॥</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-950 brand-font tracking-tight">ज्ञान एवं <span class="text-[#FF5722]">साहित्य केंद्र</span></h2>
            </div>
            <a href="resources.php" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#FF5722] hover:text-gray-950 transition-colors duration-300 border-b-2 border-orange-100 pb-1">
                सभी साहित्य देखें
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <!-- भगवा कार्ड्स ग्रिड (Bhagwaa Cards Grid) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($latestResources as $resource): ?>
                <div class="bg-[#FF5722] text-white rounded-[2.5rem] p-6 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between" data-aos="fade-up">
                    <div>
                        <span class="bg-white/20 text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider backdrop-blur-xs">
                            <?= htmlspecialchars($resource['category']) ?>
                        </span>
                        <h4 class="font-bold text-white text-lg mt-4 mb-2 line-clamp-2 leading-snug">
                            <?= htmlspecialchars($resource['title']) ?>
                        </h4>
                        <p class="text-sm text-orange-50 font-medium leading-relaxed line-clamp-3">
                            <?= htmlspecialchars(substr($resource['description'], 0, 100)) ?>...
                        </p>
                    </div>
                    
                    <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-[10px] font-bold text-orange-200 uppercase tracking-widest">संरचनात्मक अध्ययन</span>
                        <span class="text-xs font-bold text-white bg-white/10 px-4 py-1.5 rounded-full hover:bg-white hover:text-[#FF5722] transition-all duration-300 backdrop-blur-xs">
                            डाउनलोड करें →
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<section class="py-16 bg-gray-50 border-t border-b border-gray-200 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="bg-white border-4 border-gray-900 rounded-none p-8 md:p-12 relative shadow-xl">
            
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <div class="lg:col-span-2 space-y-4" data-aos="fade-right">
                    <span class="inline-block px-3 py-1 bg-[#FF5722] text-white text-[10px] font-extrabold uppercase tracking-widest rounded-none">महत्वपूर्ण सूचना (Latest Notice)</span>
                    <h2 class="text-2xl md:text-4xl font-black text-gray-900 uppercase tracking-tight leading-none">वार्षिक सामान्य बैठक एवं <br>स्वयंसेवक सम्मान समारोह 2026</h2>
                    <p class="text-gray-500 text-sm max-w-xl font-medium leading-relaxed">हमारी आगामी गतिविधियों, सांस्कृतिक आयोजनों और प्रशासनिक निर्णयों से अपडेट रहने के लिए आधिकारिक सूचना पट्ट देखें।</p>
                    <div class="pt-4">
                        <a href="notices.php">
                            <button class="bg-gray-900 text-white px-8 py-3.5 rounded-none text-[11px] font-extrabold uppercase tracking-widest hover:bg-[#FF5722] transition-colors shadow-md">
                                सभी सूचनाएं देखें
                            </button>
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 w-full" data-aos="fade-left">
                    <div class="aspect-square bg-orange-50 border-2 border-orange-200 p-4 flex flex-col justify-center items-center text-center">
                        <span class="text-[#FF5722] text-4xl font-black block">15</span>
                        <span class="text-gray-700 text-[10px] font-extrabold uppercase tracking-wider mt-1">मई २०२६</span>
                    </div>
                    <div class="aspect-square bg-orange-50 border-2 border-orange-200 p-4 flex flex-col justify-center items-center text-center">
                        <span class="text-[#FF5722] text-4xl font-black block">10</span>
                        <span class="text-gray-700 text-[10px] font-extrabold uppercase tracking-wider mt-1">पूर्वाह्न - प्रारंभ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white text-center border-b border-gray-100" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-6 space-y-4">
        <span class="text-4xl block text-[#FF5722]">ॐ</span>
        <h3 class="text-2xl md:text-3xl font-black leading-relaxed text-gray-900 font-serif">
            "समानी व आकूतिः समाना हृदयानि वः ।<br>समानमस्तु वो मनो यथा वः सुसहासति ॥"
        </h3>
        <p class="text-gray-500 font-medium max-w-2xl mx-auto text-sm leading-relaxed">
            (तुम्हारा संकल्प एक हो, तुम्हारे हृदय एक हों, और तुम्हारा मन एक हो, ताकि तुम सब आपस में पूर्ण एकता के साथ मिलकर कार्य कर सको।)
        </p>
        <p class="text-[#FF5722] uppercase tracking-widest text-[11px] font-extrabold pt-2">— ऋग्वेद (मण्डल १०, सूक्त १९१)</p>
    </div>
</section>

<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'hi', 
        includedLanguages: 'en,hi', 
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<?php include 'includes/web_footer.php'; ?>