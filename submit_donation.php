<?php
session_start();
require 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$user_id = $_SESSION['user_id'] ?? null;

$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$phone = $_POST['phone'] ?? null;
$amount = $_POST['amount'] ?? null;
$utr = $_POST['utr'] ?? null;
$campaign_id = !empty($_POST['campaign_id']) ? $_POST['campaign_id'] : null;
$payment_method = 'upi'; 

/* FILE UPLOAD */
$proof_name = null;
if (isset($_FILES['proof']) && $_FILES['proof']['error'] === 0) {
    $ext = strtolower(pathinfo($_FILES['proof']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png'];

    if (!in_array($ext, $allowed)) {
        die("<div class='h-screen flex items-center justify-center font-bold uppercase tracking-widest text-red-500'>Invalid file type</div>");
    }

    if (!is_dir('uploads/donations')) {
        mkdir('uploads/donations', 0777, true);
    }

    $proof_name = "don_" . time() . "." . $ext;
    move_uploaded_file($_FILES['proof']['tmp_name'], "uploads/donations/" . $proof_name);
}

/* INSERT */
$stmt = $pdo->prepare("
    INSERT INTO donations 
    (user_id, donor_name, donor_email, donor_phone, amount, transaction_id, proof, payment_method, status, campaign_id)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?)
");

$success = $stmt->execute([
    $user_id,
    $name,
    $email,
    $phone,
    $amount,
    $utr,
    $proof_name,
    $payment_method,
    $campaign_id
]);
?>

<section class="min-h-screen flex items-center justify-center bg-white px-6 pt-24">
    <div class="max-w-xl w-full text-center" data-aos="zoom-in">
        
        <div class="relative w-24 h-24 mx-auto mb-10">
            <div class="absolute inset-0 bg-orange-100 animate-ping opacity-30 rounded-full"></div>
            <div class="relative w-24 h-24 bg-[#FF5722] text-white flex items-center justify-center rounded-full shadow-md">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <span class="text-xs font-bold uppercase tracking-wider text-[#FF5722] mb-4 block">॥ कृतज्ञता - धन्यवाद ॥</span>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6 text-gray-900">
            आभार, <br><?php echo htmlspecialchars($name); ?>।
        </h1>
        
        <p class="text-sm text-gray-500 font-medium leading-relaxed mb-10 max-w-sm mx-auto">
            आपके द्वारा प्रेषित <span class="text-gray-900 font-bold">₹<?php echo number_format($amount); ?></span> की सहयोग राशि का विवरण हमें प्राप्त हो गया है। हमारी संचालन समिति आपके ट्रांजैक्शन यूटीआर संख्या <span class="text-gray-900 font-mono font-bold bg-orange-50/60 px-2 py-0.5 rounded-md border border-orange-100"><?php echo htmlspecialchars($utr); ?></span> का सत्यापन कर रही है। शीघ्र ही इसकी रसीद अद्यतित की जाएगी।
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="index.php" class="w-full sm:w-auto bg-gray-900 text-white px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider hover:bg-[#FF5722] transition-colors shadow-sm">
                मुख्य पृष्ठ पर जाएं
            </a>
            <a href="campaigns.php" class="w-full sm:w-auto bg-gray-50 text-gray-500 border border-gray-200 px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider hover:text-gray-900 hover:border-gray-900 transition-all">
                अन्य सेवा प्रकल्प देखें
            </a>
        </div>

        <div class="mt-16 pt-10 border-t border-gray-100 grid grid-cols-3 gap-4">
            <div class="space-y-2">
                <div class="h-1 bg-[#FF5722] w-full rounded-full"></div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-[#FF5722]">विवरण प्राप्त (Submitted)</p>
            </div>
            <div class="space-y-2">
                <div class="h-1 bg-gray-100 w-full relative overflow-hidden rounded-full">
                    <div class="absolute inset-0 bg-[#FF5722]/30 animate-pulse rounded-full"></div>
                </div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400">सत्यापन जारी (Verifying)</p>
            </div>
            <div class="space-y-2">
                <div class="h-1 bg-gray-100 w-full rounded-full"></div>
                <p class="text-[10px] font-bold uppercase tracking-wider text-gray-300">स्वीकृत (Approved)</p>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/web_footer.php'; ?>