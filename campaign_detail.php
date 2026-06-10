<?php
require 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM campaigns WHERE id=?");
$stmt->execute([$id]);
$c = $stmt->fetch();

if (!$c) {
    die("<div class='h-screen flex items-center justify-center font-bold text-gray-500 bg-gray-50'>अभियान प्राप्त नहीं हुआ | Campaign not found</div>");
}

$percent = $c['goal_amount'] > 0 
    ? min(100, ($c['collected_amount'] / $c['goal_amount']) * 100) 
    : 0;
?>

<article class="bg-white min-h-screen pb-32">
    <nav class="pt-40 pb-10 max-w-7xl mx-auto px-6 lg:px-12">
        <a href="campaigns.php" class="group inline-flex items-center gap-3 text-gray-500 hover:text-[#FF5722] transition-colors">
            <div class="w-9 h-9 rounded-full border border-gray-200 flex items-center justify-center group-hover:border-[#FF5722] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </div>
            <span class="text-xs font-bold uppercase tracking-wider">पीछे लौटें</span>
        </a>
    </nav>

    <header class="max-w-7xl mx-auto px-6 lg:px-12 mb-20 border-b border-gray-100 pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-end">
            <div data-aos="fade-right">
                <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">॥ धर्मो रक्षति रक्षितः ॥</span>
                <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight leading-tight text-gray-900">
                    <?php echo htmlspecialchars($c['title']); ?>
                </h1>
                <div class="h-[3px] w-16 bg-[#FF5722] mt-6"></div>
            </div>
            
            <div class="space-y-4 bg-gray-50/50 p-6 rounded-2xl border border-gray-100" data-aos="fade-left">
                <div class="flex justify-between items-end">
                    <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">अभियान प्रगति</p>
                    <p class="text-3xl font-extrabold text-[#FF5722] tracking-tight"><?php echo round($percent); ?>%</p>
                </div>
                <div class="w-full bg-gray-200/60 h-2 rounded-full overflow-hidden">
                    <div class="bg-[#FF5722] h-full rounded-full transition-all duration-1000 ease-out" 
                         style="width:<?php echo $percent; ?>%;">
                    </div>
                </div>
                <div class="flex justify-between items-center pt-1">
                    <p class="text-xl font-bold text-gray-900 tracking-tight">
                        ₹<?php echo number_format($c['collected_amount']); ?> 
                        <span class="text-xs font-medium text-gray-400 ml-1">संग्रहीत</span>
                    </p>
                    <p class="text-xs font-bold text-[#FF5722] bg-orange-50 px-3 py-1 rounded-full uppercase tracking-wider">
                        लक्ष्य: ₹<?php echo number_format($c['goal_amount']); ?>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <div class="lg:w-2/3" data-aos="fade-up">
                <div class="text-base text-gray-600 font-medium leading-relaxed space-y-6">
                    <?php echo nl2br(htmlspecialchars($c['description'])); ?>
                </div>
                
                <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 gap-6 pt-12 border-t border-gray-100">
                    <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/30">
                        <h4 class="text-[11px] font-bold uppercase tracking-wider text-[#FF5722] mb-1">शुचिता एवं शुद्धि</h4>
                        <p class="text-xs text-gray-500 font-medium">प्रत्येक अंशदान सीधे निर्धारित सेवा कार्य में प्रयुक्त होता है।</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/30">
                        <h4 class="text-[11px] font-bold uppercase tracking-wider text-[#FF5722] mb-1">सुरक्षित संव्यवहार</h4>
                        <p class="text-xs text-gray-500 font-medium">पूर्णतः सुरक्षित एवं कूटबद्ध भुगतान प्रणाली।</p>
                    </div>
                    <div class="p-6 rounded-2xl border border-gray-100 bg-gray-50/30">
                        <h4 class="text-[11px] font-bold uppercase tracking-wider text-[#FF5722] mb-1">वास्तविक प्रभाव</h4>
                        <p class="text-xs text-gray-500 font-medium">धरातल पर संचालित कार्यों की पारदर्शी समीक्षा।</p>
                    </div>
                </div>
            </div>

            <div class="lg:w-1/3" data-aos="fade-left">
                <div class="sticky top-32 bg-white border border-gray-100 rounded-3xl p-8 md:p-10 text-center shadow-md">
                    <div class="w-12 h-12 bg-orange-50 text-[#FF5722] rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-bold">
                        ॐ
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 uppercase tracking-tight mb-2">इस पुण्य कार्य में सहयोग करें</h3>
                    <p class="text-xs text-gray-400 font-medium mb-8 leading-relaxed">आपका सात्विक अंशदान हमारी सांस्कृतिक चेतना और सेवा अभियानों को शक्ति देता है।</p>
                    
                    <a href="donate.php?campaign_id=<?php echo $c['id']; ?>" class="block w-full bg-[#FF5722] text-white py-3.5 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-gray-900 transition-colors shadow-sm">
                        सहयोग राशि प्रदान करें
                    </a>
                    
                    <p class="mt-4 text-[10px] text-gray-400 font-medium tracking-wider">सुरक्षित भुगतान प्रणाली</p>
                </div>
            </div>

        </div>
    </section>
</article>

<?php include 'includes/web_footer.php'; ?>