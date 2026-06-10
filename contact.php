<?php
require 'includes/db.php';

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if (
        !empty($name) &&
        !empty($email) &&
        !empty($phone) &&
        !empty($message)
    ) {

        $stmt = $pdo->prepare("
            INSERT INTO enquiries
            (
                name,
                email,
                phone,
                message
            )
            VALUES (?, ?, ?, ?)
        ");

        $stmt->execute([
            $name,
            $email,
            $phone,
            $message
        ]);

        $success = true;
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<section class="pt-40 pb-16 bg-gradient-to-b from-orange-50/50 to-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div data-aos="fade-right">
            <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-3 block">॥ अतिथि देवो भवः ॥</span>
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-4">संपर्क सूत्र (Contact Us)</h1>
            <div class="h-[3px] w-16 bg-[#FF5722] mt-4"></div>
        </div>
    </div>
</section>

<section class="py-12 bg-white pb-32">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row gap-16 lg:gap-20">
            
            <div class="lg:w-1/3 space-y-12" data-aos="fade-up">
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-4">कार्यालय का पता (Office Address)</h3>
                    <p class="text-base font-medium leading-relaxed text-gray-700">
                        १२३ कल्याण प्लाजा, <br>
                        सिविल लाइंस, <br>
                        उत्तर प्रदेश, भारत
                    </p>
                </div>

                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-4">सीधा संपर्क (Direct Contact)</h3>
                    <p class="text-xl font-bold text-gray-900 underline underline-offset-8 decoration-[#FF5722]"><?php echo htmlspecialchars('hello@yourngo.org'); ?></p>
                    <p class="text-base font-bold text-gray-600 mt-4">+91 98765 43210</p>
                </div>

                <div class="pt-6 border-t border-gray-100">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-4">सामाजिक उपस्थिति (Social Presence)</h3>
                    <div class="flex gap-6">
                        <a href="#" class="text-gray-400 hover:text-gray-900 transition-colors font-bold text-xs uppercase tracking-wider">इंस्टाग्राम</a>
                        <a href="#" class="text-gray-400 hover:text-gray-900 transition-colors font-bold text-xs uppercase tracking-wider">ट्विटर</a>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3" data-aos="fade-left">
                <div class="bg-white rounded-3xl p-8 md:p-16 border border-gray-100 shadow-xl shadow-gray-100/40">
                    
                    <?php if(isset($success) && $success): ?>
                    <div class="mb-8 bg-orange-50 border border-orange-100 text-[#FF5722] px-6 py-4 rounded-2xl font-bold text-sm tracking-wide">
                        आपका संदेश सफलतापूर्वक प्राप्त हो गया है। हमारी समिति शीघ्र ही आपसे संपर्क करेगी।
                    </div>
                    <?php endif; ?>

                    <form method="POST" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-gray-400 ml-1">पूरा नाम (Full Name)</label>
                                <input type="text" name="name" required placeholder="अपना नाम लिखें" 
                                    class="w-full bg-gray-50/50 border border-gray-100 rounded-2xl px-6 py-4 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] transition-all outline-none font-medium text-sm text-gray-900 shadow-xs">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-gray-400 ml-1">ईमेल पता (Email Address)</label>
                                <input type="email" name="email" required placeholder="email@example.com" 
                                    class="w-full bg-gray-50/50 border border-gray-100 rounded-2xl px-6 py-4 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] transition-all outline-none font-medium text-sm text-gray-900 shadow-xs">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 ml-1">दूरभाष संख्या (Phone Number)</label>
                            <input type="text" name="phone" required placeholder="+91 00000 00000" 
                                class="w-full bg-gray-50/50 border border-gray-100 rounded-2xl px-6 py-4 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] transition-all outline-none font-medium text-sm text-gray-900 shadow-xs">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 ml-1">हम आपकी क्या सहायता कर सकते हैं? (Message)</label>
                            <textarea name="message" rows="5" required placeholder="अपना संदेश यहाँ लिखें..." 
                                class="w-full bg-gray-50/50 border border-gray-100 rounded-2xl px-6 py-5 focus:bg-white focus:border-[#FF5722] focus:ring-1 focus:ring-[#FF5722] transition-all outline-none font-medium text-sm text-gray-900 shadow-xs resize-none"></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full md:w-auto bg-[#FF5722] text-white px-10 py-4 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-gray-900 transition-colors shadow-md outline-none">
                                संदेश भेजें (Send Enquiry)
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="h-[500px] w-full bg-gray-100 border-t border-gray-100 transition-all duration-1000 mb-10 overflow-hidden rounded-[3rem] max-w-[95%] mx-auto shadow-sm">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113912.44111394236!2d78.33069152331402!3d27.148154179375107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3974e64f0f0f0f0f%3A0x0f0f0f0f0f0f0f0f!2sFirozabad%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1650000000000!5m2!1sen!2sin" 
        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
</section>

<?php include 'includes/web_footer.php'; ?>