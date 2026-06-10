<?php
require 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

/* FETCH ACTIVE CAMPAIGNS */
$campaigns = $pdo->query("
    SELECT * FROM campaigns 
    WHERE status='active'
    ORDER BY id DESC
")->fetchAll();
?>

<section class="pt-40 pb-16 bg-gradient-to-b from-orange-50/50 to-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center">
        <div data-aos="fade-up">
            <span class="text-[12px] font-bold uppercase tracking-[0.3em] text-[#FF5722] mb-3 block">॥ परोपकाराय पुण्याय ॥</span>
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6 text-gray-900">हमारे सेवा प्रकल्प</h1>
            <p class="max-w-2xl mx-auto text-sm text-gray-500 font-medium leading-relaxed mb-6">
                सनातन धर्म के मूल सिद्धांतों पर आधारित हमारे सक्रिय सामाजिक एवं सांस्कृतिक अभियान।
            </p>
            <div class="h-[2px] w-16 bg-[#FF5722] mx-auto"></div>
        </div>
    </div>
</section>

<section class="py-20 bg-white pb-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($campaigns as $c): 
                $goal = $c['goal_amount'];
                $collected = $c['collected_amount'];
                $percent = $goal > 0 ? min(100, ($collected / $goal) * 100) : 0;
            ?>
            
            <div class="relative group h-full flex flex-col rounded-2xl border border-gray-100 bg-white shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up">
                <a href="campaign_detail.php?id=<?php echo $c['id']; ?>" class="block flex-1">
                    <div class="p-8 h-full flex flex-col justify-between overflow-hidden">
                        
                        <div>
                            <div class="flex justify-between items-center mb-6">
                                <span class="px-3 py-1 bg-orange-50 border border-orange-100 rounded-full text-[10px] font-bold uppercase tracking-wider text-[#FF5722]">
                                    सक्रिय सेवा अभियान
                                </span>
                                <span class="text-lg font-bold text-[#FF5722] tracking-tight">
                                    <?php echo round($percent); ?>%
                                </span>
                            </div>

                            <h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-[#FF5722] transition-colors leading-tight">
                                <?php echo htmlspecialchars($c['title']); ?>
                            </h3>

                            <p class="text-sm text-gray-500 transition-colors font-medium leading-relaxed mb-8">
                                <?php echo htmlspecialchars(substr($c['description'], 0, 100)); ?>...
                            </p>
                        </div>

                        <div class="mt-auto">
                            <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden mb-4">
                                <div class="bg-[#FF5722] h-full rounded-full transition-all duration-1000 ease-out" 
                                     style="width:<?php echo $percent; ?>%;">
                                </div>
                            </div>

                            <div class="flex justify-between items-end">
                                <div class="space-y-0.5">
                                    <p class="text-[10px] uppercase tracking-wider font-bold text-gray-400">संग्रहीत सेवा राशि</p>
                                    <p class="text-base font-bold text-gray-900 tracking-tight">
                                        ₹<?php echo number_format($collected); ?> 
                                        <span class="text-xs font-medium text-gray-400">/ ₹<?php echo number_format($goal); ?></span>
                                    </p>
                                </div>
                                <div class="w-24 h-10"></div>
                            </div>
                        </div>

                    </div>
                </a>

                <a href="donate.php?campaign_id=<?php echo $c['id']; ?>" 
                   onclick="event.stopPropagation();"
                   class="absolute bottom-8 right-8 z-20 bg-gray-900 text-white px-5 py-2.5 rounded-full text-[10px] font-bold uppercase tracking-wider hover:bg-[#FF5722] transition-colors shadow-sm">
                    सहयोग करें
                </a>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php include 'includes/web_footer.php'; ?>