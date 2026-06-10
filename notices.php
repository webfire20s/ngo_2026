<?php
require 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="pt-40 pb-16 bg-gradient-to-b from-orange-50/50 to-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center md:text-left">
        <div data-aos="fade-right">
            <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">॥ आधिकारिक सूचना एवं उद्घोषणा ॥</span>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-4">सूचना पट्ट (Notices)</h1>
            <div class="h-[3px] w-16 bg-[#FF5722] mx-auto md:mx-0 mt-4"></div>
        </div>
    </div>
</section>

<section class="py-12 bg-white pb-32">
    <div class="max-w-5xl mx-auto px-6 lg:px-12">
        
        <?php
        $notices = $pdo->query("
            SELECT * FROM notices 
            ORDER BY created_at DESC
        ")->fetchAll();
        ?>

        <?php if(count($notices) > 0): ?>
        <div class="space-y-6">
            <?php foreach($notices as $index => $notice): ?>
            <?php
                $modalId = 'notice-' . $notice['id'];
                $day = date('d', strtotime($notice['created_at']));
                $month = date("M 'y", strtotime($notice['created_at']));
            ?>

            <div class="group relative bg-white border border-gray-100 p-8 flex flex-col md:flex-row gap-8 md:gap-12 items-start md:items-center justify-between transition-all duration-300 rounded-3xl shadow-xs hover:shadow-xl hover:border-orange-100" data-aos="fade-up">

                <div class="flex flex-col md:flex-row gap-6 md:gap-8 items-start md:items-center flex-grow">
                    <div class="flex-shrink-0">
                        <div class="w-20 h-20 bg-orange-50 text-gray-900 flex flex-col items-center justify-center transition-all duration-300 rounded-2xl border border-orange-100 group-hover:bg-[#FF5722] group-hover:text-white">
                            <span class="text-3xl font-bold tracking-tight">
                                <?php echo $day; ?>
                            </span>
                            <span class="text-[10px] uppercase tracking-wider font-bold text-[#FF5722] group-hover:text-white">
                                <?php echo $month; ?>
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-0.5 bg-orange-50 text-[10px] font-bold tracking-wider text-[#FF5722] rounded-full border border-orange-100">
                                <?php echo htmlspecialchars($notice['category']); ?>
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-[#FF5722] transition-colors duration-300">
                            <?php echo htmlspecialchars($notice['title']); ?>
                        </h3>

                        <p class="text-gray-500 font-medium text-sm max-w-2xl leading-relaxed">
                            <?php echo nl2br(htmlspecialchars($notice['short_description'])); ?>
                        </p>
                    </div>
                </div>

                <div class="w-full md:w-auto flex-shrink-0 pt-4 md:pt-0 border-t border-gray-50 md:border-none">
                    <button onclick="toggleModal('<?php echo $modalId; ?>')" class="w-full md:w-auto inline-flex items-center justify-center text-xs font-bold bg-gray-900 text-white px-6 py-3.5 rounded-full hover:bg-[#FF5722] transition-all duration-300 outline-none shadow-sm">
                        विवरण देखें
                        <svg class="ml-2 w-4 h-4 transition-transform group-hover:translate-x-1.5 duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </div>

                <div id="<?php echo $modalId; ?>" class="fixed inset-0 z-[200] hidden items-center justify-center px-4">

                    <div onclick="toggleModal('<?php echo $modalId; ?>')" class="absolute inset-0 bg-gray-900/60 backdrop-blur-md"></div>

                    <div class="relative bg-white w-full max-w-2xl rounded-3xl p-8 md:p-12 border border-gray-100 shadow-2xl overflow-y-auto max-h-[85vh] scale-95 opacity-0 transition-all duration-300 modal-container text-left">

                        <button onclick="toggleModal('<?php echo $modalId; ?>')" class="absolute top-6 right-6 w-10 h-10 bg-gray-50 border border-gray-100 flex items-center justify-center text-gray-400 hover:text-white hover:bg-[#FF5722] hover:border-[#FF5722] transition-all rounded-full outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-[#FF5722] bg-orange-50 px-2 py-0.5 rounded-md border border-orange-100">
                                आधिकारिक घोषणा (Official)
                            </span>
                            <span class="text-[10px] font-bold text-gray-400">
                                दिनांक: <?php echo $day . ' ' . date('F', strtotime($notice['created_at'])); ?>
                            </span>
                        </div>

                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 tracking-tight mb-6 leading-tight border-b border-gray-100 pb-4 pr-8">
                            <?php echo htmlspecialchars($notice['title']); ?>
                        </h2> 

                        <div class="text-gray-600 text-sm font-medium leading-relaxed space-y-4 bg-gray-50/50 p-6 rounded-2xl border border-gray-100 max-h-[40vh] overflow-y-auto">
                            <?php echo nl2br($notice['full_content']); ?>
                        </div>

                        <div class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-between">
                            <div class="text-[11px] font-bold text-gray-400">
                                श्रेणी: <span class="text-gray-900 font-semibold"><?php echo htmlspecialchars($notice['category']); ?></span>
                            </div>
                            <button onclick="toggleModal('<?php echo $modalId; ?>')" class="bg-gray-900 text-white px-6 py-3 rounded-full text-xs font-bold hover:bg-[#FF5722] transition-colors outline-none">
                                पटल बंद करें
                            </button>
                        </div>

                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

        <?php else: ?>

        <div class="mt-12 p-20 bg-gray-50/50 rounded-3xl border border-dashed border-gray-200 text-center" data-aos="fade-up">
            <p class="text-xs font-bold text-gray-400">
                वर्तमान में कोई नई सूचना उपलब्ध नहीं है।
            </p>
        </div>

        <?php endif; ?>

    </div>
</section>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        const container = modal.querySelector('.modal-container');
        
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 10);
            document.body.style.overflow = 'hidden';
        } else {
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
            document.body.style.overflow = 'auto';
        }
    }
</script>

<?php include 'includes/web_footer.php'; ?>