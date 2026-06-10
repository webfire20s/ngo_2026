<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

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