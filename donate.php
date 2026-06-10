<?php
session_start(); 
require 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$campaigns = $pdo->query("
    SELECT id, title 
    FROM campaigns 
    WHERE status='active'
")->fetchAll();

$selected_campaign = $_GET['campaign_id'] ?? '';
?>

<section class="min-h-screen bg-white pt-40 pb-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        
        <div class="flex flex-col lg:flex-row gap-16">
            
            <div class="lg:w-1/3" data-aos="fade-right">
                <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">॥ दानम् परम् धर्मः ॥</span>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-gray-900 mb-10">सत्कर्म हेतु<br>योगदान।</h1>
                
                <div class="space-y-10">
                    <div class="flex gap-5">
                        <div class="text-2xl font-bold text-orange-300 tracking-tight">०१</div>
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-900 mb-1">स्कैन एवं भुगतान (Scan QR)</h4>
                            <p class="text-xs text-gray-500 font-medium leading-relaxed">किसी भी UPI ऐप का उपयोग करके आधिकारिक क्यूआर कोड स्कैन करें और अपना योगदान स्थानांतरित करें।</p>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="text-2xl font-bold text-orange-300 tracking-tight">०२</div>
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-900 mb-1">यूटीआर दर्ज करें (Note UTR)</h4>
                            <p class="text-xs text-gray-500 font-medium leading-relaxed">सफल भुगतान के बाद बैंक द्वारा प्राप्त १२-अंकों का UTR / ट्रांजैक्शन आईडी सुरक्षित रखें।</p>
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="text-2xl font-bold text-orange-300 tracking-tight">०३</div>
                        <div>
                            <h4 class="text-xs font-bold uppercase tracking-wider text-gray-900 mb-1">विवरण साझा करें (Verify)</h4>
                            <p class="text-xs text-gray-500 font-medium leading-relaxed">संलग्न फॉर्म में अपना विवरण भरें। हमारी समिति द्वारा सत्यापन के बाद आपकी रसीद अपडेट कर दी जाएगी।</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 p-6 bg-gray-50/50 border border-gray-100 rounded-2xl text-center">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#FF5722] mb-3">आधिकारिक क्यूआर कोड (Official QR)</p>
                    <div class="w-44 h-44 bg-white mx-auto rounded-xl flex items-center justify-center border border-gray-100 shadow-sm">
                        <span class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">[QR CODE HERE]</span>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3" data-aos="fade-left">
                <div class="bg-white border border-gray-100 rounded-3xl p-8 md:p-12 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <form method="POST" action="submit_donation.php" enctype="multipart/form-data" class="space-y-6">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1">आपका नाम (Full Name)</label>
                                <input type="text" name="name" required placeholder="पूर्ण नाम लिखिए" 
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-5 py-3.5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] text-sm text-gray-900 font-medium transition-all outline-none">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1">ईमेल पता (Email)</label>
                                <input type="email" name="email" placeholder="email@example.com" 
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-5 py-3.5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] text-sm text-gray-900 font-medium transition-all outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1">दूरभाष संख्या (Phone)</label>
                                <input type="text" name="phone" placeholder="+91 00000 00000" 
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-5 py-3.5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] text-sm text-gray-900 font-medium transition-all outline-none">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1">सहयोग राशि (Amount ₹)</label>
                                <input type="number" name="amount" required placeholder="500" 
                                    class="w-full bg-orange-50/30 border border-orange-100 rounded-xl px-5 py-3.5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] text-lg font-bold text-[#FF5722] tracking-tight transition-all outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1">ट्रांजैक्शन आईडी / UTR</label>
                                <input type="text" name="utr" required placeholder="12-digit number" 
                                    class="w-full bg-gray-50 border border-gray-100 rounded-xl px-5 py-3.5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] text-sm text-gray-900 font-medium transition-all outline-none">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1">अभियान का चयन (Campaign)</label>
                                <div class="relative">
                                    <select name="campaign_id" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-5 py-3.5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] text-sm text-gray-900 font-medium transition-all outline-none appearance-none cursor-pointer">
                                        <option value="">सामान्य योगदान (General Donation)</option>
                                        <?php foreach ($campaigns as $c): ?>
                                            <option value="<?php echo $c['id']; ?>" 
                                            <?php if ($selected_campaign == $c['id']) echo 'selected'; ?>>
                                                <?php echo htmlspecialchars($c['title']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[11px] font-bold uppercase tracking-wider text-gray-400 ml-1 block mb-1">भुगतान का प्रमाण (Screenshot)</label>
                            <div class="relative group">
                                <input type="file" name="proof" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="w-full bg-gray-50 border border-dashed border-gray-200 rounded-2xl py-10 text-center group-hover:border-[#FF5722] group-hover:bg-orange-50/10 transition-all duration-300">
                                    <svg class="w-6 h-6 mx-auto text-gray-300 group-hover:text-[#FF5722] mb-3 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="text-xs font-bold text-gray-400 group-hover:text-[#FF5722] transition-colors">भुगतान स्क्रीनशॉट अपलोड करने के लिए क्लिक करें</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-[#FF5722] text-white px-12 py-4 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-gray-900 transition-colors shadow-sm">
                                विवरण जमा करें (Submit Details)
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="mt-12 pt-6 border-t border-gray-100 flex items-center justify-center gap-6 select-none font-sans">
                
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="22" height="16" x="1" y="4" rx="3" />
                            <line x1="1" x2="23" y1="10" y2="10" />
                        </svg>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Card Payments</span>
                    </div>

                    <div class="h-3 w-[1px] bg-gray-200"></div>

                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400">Instant UPI</span>
                    </div>

                    <div class="h-3 w-[1px] bg-gray-200"></div>

                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect width="18" height="11" x="3" y="11" rx="2" />
                            <path d="M7 11V7a5 5 0 0110 0v4" />
                        </svg>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400">256-Bit SSL Encryption</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/web_footer.php'; ?>