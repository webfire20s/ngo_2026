<?php
session_start();
require 'includes/db.php';
require 'includes/functions.php';
include 'includes/header.php'; 
include 'includes/navbar.php'; 

/* FETCH DESIGNATIONS */
$designations = $pdo->query("SELECT * FROM designations")->fetchAll();

$msg = "";
$msgClass = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!verifyToken($_POST['csrf_token'])) {
        die("Invalid CSRF Token");
    }

    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $designation_id = $_POST['designation_id'];
    $referral = sanitize($_POST['referral'] ?? '');

    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->fetch()) {
        $msg = "Email already registered";
        $msgClass = "bg-red-50 text-red-600";
    } else {
        $photo_name = null;
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $file = $_FILES['photo'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];

            if (!in_array($ext, $allowed)) { die("Only JPG, JPEG, PNG allowed"); }
            if ($file['size'] > 2 * 1024 * 1024) { die("Max file size is 2MB"); }

            if (!is_dir('uploads/profile')) { mkdir('uploads/profile', 0777, true); }

            $temp_name = uniqid() . '.' . $ext;
            $temp_path = "uploads/profile/" . $temp_name;
            move_uploaded_file($file['tmp_name'], $temp_path);
            $photo_name = $temp_name;
        }

        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password, role, profile_photo) VALUES (?, ?, ?, ?, 'member', ?)");
        $stmt->execute([$name, $email, $phone, $password, $photo_name]);

        $user_id = $pdo->lastInsertId();
        if ($photo_name) {
            $ext = pathinfo($photo_name, PATHINFO_EXTENSION);
            $new_name = "user_" . $user_id . "." . $ext;
            rename("uploads/profile/" . $photo_name, "uploads/profile/" . $new_name);
            $stmt = $pdo->prepare("UPDATE users SET profile_photo=? WHERE id=?");
            $stmt->execute([$new_name, $user_id]);
        }

        $referred_by = null;
        if (!empty($referral)) {
            $refCheck = $pdo->prepare("SELECT user_id FROM memberships WHERE referral_code = ?");
            $refCheck->execute([$referral]);
            $refUser = $refCheck->fetch();
            if ($refUser) { $referred_by = $refUser['user_id']; }
        }

        $referral_code = strtoupper(substr(md5(uniqid()), 0, 8));
        $stmt = $pdo->prepare("INSERT INTO memberships (user_id, designation_id, join_date, expiry_date, status, referral_code, referred_by) VALUES (?, ?, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 1 YEAR), 'expired', ?, ?)");
        $stmt->execute([$user_id, $designation_id, $referral_code, $referred_by]);

        $msg = "Registration successful. Please login.";
        $msgClass = "bg-green-50 text-green-600";
    }
}
?>

<section class="min-h-screen bg-white flex flex-col lg:flex-row pt-24 lg:pt-30">
    
    <div class="lg:w-1/3 bg-[#111827] p-12 lg:p-20 flex flex-col justify-between text-white relative overflow-hidden rounded-b-[2rem] lg:rounded-b-none lg:rounded-r-[4rem] shadow-2xl">
        <div class="absolute inset-0 opacity-5 pointer-events-none flex items-center justify-center text-[30vw] font-bold select-none">ॐ</div>

        <div class="relative z-10" data-aos="fade-right">
            <div class="w-12 h-12 bg-[#FF5722] rounded-2xl flex items-center justify-center text-white text-lg font-bold shadow-md mb-8">
                ॐ
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold brand-font tracking-tight leading-tight mb-6">
                राष्ट्रहित में <br><span class="text-[#FF5722]">एक कदम।</span>
            </h2>
            <p class="text-gray-400 text-sm font-medium leading-relaxed max-w-xs">
                सनातन धर्म, हिंदू संस्कृति और सामाजिक सशक्तिकरण के इस महा-अभियान में हमसे जुड़ें और अपनी सक्रिय भागीदारी सुनिश्चित करें।
            </p>
        </div>
        
        <div class="relative z-10 mt-12 lg:mt-0" data-aos="fade-up">
            <div class="flex -space-x-3 mb-4">
                <div class="w-10 h-10 rounded-xl border-2 border-[#111827] bg-[#FF5722] flex items-center justify-center text-xs font-bold shadow-sm">ॐ</div>
                <div class="w-10 h-10 rounded-xl border-2 border-[#111827] bg-orange-600 flex items-center justify-center text-xs font-bold shadow-sm">ध</div>
                <div class="w-10 h-10 rounded-xl border-2 border-[#111827] bg-gray-700 flex items-center justify-center text-xs font-bold shadow-sm">+</div>
            </div>
            <p class="text-[10px] uppercase tracking-[0.2em] font-bold text-orange-400">॥ हज़ारों सक्रिय राष्ट्रवादी सदस्य ॥</p>
        </div>

        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-[#FF5722]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="lg:w-2/3 p-6 lg:p-20 bg-white flex items-center justify-center">
        <div class="w-full max-w-2xl" data-aos="fade-left">
            
            <?php if ($msg): ?>
                <div class="p-4 rounded-2xl mb-8 text-xs font-bold tracking-wider text-center border shadow-xs <?php echo $msgClass; ?>">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>

            <div class="mb-10">
                <h1 class="text-3xl lg:text-4xl font-bold brand-font tracking-tight mb-2 text-gray-900">सदस्यता आवेदन फॉर्म</h1>
                <p class="text-gray-400 text-sm font-medium">संगठन की सदस्यता प्राप्त करने के लिए कृपया अपनी सही जानकारी भरें।</p>
            </div>

            <form method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?php echo generateToken(); ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4">पूरा नाम (Full Name)</label>
                        <input type="text" name="name" required placeholder="अपना पूरा नाम लिखें" class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3.5 text-sm focus:bg-white focus:ring-2 focus:ring-[#FF5722] transition-all outline-none font-medium text-gray-800">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4">ईमेल पता (Email Address)</label>
                        <input type="email" name="email" required placeholder="email@example.com" class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3.5 text-sm focus:bg-white focus:ring-2 focus:ring-[#FF5722] transition-all outline-none font-medium text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4">मोबाइल नंबर (Phone)</label>
                        <input type="text" name="phone" required placeholder="+91 00000 00000" class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3.5 text-sm focus:bg-white focus:ring-2 focus:ring-[#FF5722] transition-all outline-none font-medium text-gray-800">
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4">पासवर्ड (Password)</label>
                        <input type="password" name="password" required placeholder="••••••••" class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3.5 text-sm focus:bg-white focus:ring-2 focus:ring-[#FF5722] transition-all outline-none font-medium text-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4">संगठन पदभार (Designation)</label>
                        <div class="relative">
                            <select name="designation_id" required class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3.5 text-sm focus:bg-white focus:ring-2 focus:ring-[#FF5722] transition-all outline-none appearance-none cursor-pointer font-medium text-gray-800">
                                <?php foreach ($designations as $d): ?>
                                    <option value="<?php echo $d['id']; ?>">
                                        <?php echo $d['title']; ?> (₹<?php echo $d['fee']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4">संदर्भ कोड (Referral Code - वैकल्पिक)</label>
                        <input type="text" name="referral" placeholder="ABC12345" class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3.5 text-sm focus:bg-white focus:ring-2 focus:ring-[#FF5722] transition-all outline-none font-medium text-gray-800">
                    </div>
                </div>

                <div class="space-y-2 pt-2">
                    <label class="text-[10px] font-bold uppercase tracking-wider text-gray-400 ml-4 block">प्रोफ़ाइल चित्र (Profile Photo - अधिकतम 2MB)</label>
                    <div class="relative group">
                        <input type="file" name="photo" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="w-full bg-gray-50 border-2 border-dashed border-gray-200 rounded-3xl py-8 text-center group-hover:border-[#FF5722] group-hover:bg-orange-50/20 transition-all duration-300">
                            <svg class="w-8 h-8 mx-auto text-gray-300 group-hover:text-[#FF5722] mb-2 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-gray-400 group-hover:text-gray-700 transition-colors duration-300">अपनी फोटो का चयन करें</span>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-[#111827] text-white px-12 py-4 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-[#FF5722] transition-all duration-300 shadow-xl shadow-gray-200 hover:shadow-orange-200">
                        आवेदन पूर्ण करें
                    </button>
                    <p class="text-center mt-6 text-sm font-medium text-gray-400">
                        पहले से पंजीकृत हैं? <a href="admin/login.php" class="text-[#FF5722] font-bold hover:underline">यहाँ लॉगिन करें</a>
                    </p>
                </div>
            </form>

        </div>
    </div>
</section>

<?php include 'includes/web_footer.php'; ?>