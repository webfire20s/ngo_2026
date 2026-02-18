<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $membership_type = $_POST['membership_type'];
    $message = $_POST['message'];

    $stmt = $conn->prepare(
        "INSERT INTO memberships 
        (full_name, email, phone, address, membership_type, message)
        VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param(
        "ssssss",
        $full_name,
        $email,
        $phone,
        $address,
        $membership_type,
        $message
    );
    $stmt->execute();

    $success = true;
}
?>

<style>
    .gradient-hero-apply {
        background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
    }
    .form-input {
        @apply w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 outline-none transition-all duration-300;
    }
    .form-input:focus {
        @apply border-blue-500 ring-4 ring-blue-500/10 shadow-lg;
    }
</style>

<main class="bg-slate-50">
    <section class="py-28 lg:py-40 gradient-hero-apply text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-400 rounded-full filter blur-[120px]"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.3em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full">
                Get Involved
            </span>
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none">Membership <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Application</span></h1>
            <p class="text-xl md:text-2xl opacity-80 max-w-2xl mx-auto font-light leading-relaxed">
                Step into a leadership role within our community and help us drive sustainable social change.
            </p>
        </div>
    </section>

    <section class="py-24 -mt-16 relative z-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row bg-white rounded-[3rem] shadow-2xl overflow-hidden border border-slate-100">
                
                <div class="lg:w-1/3 bg-slate-900 p-10 lg:p-16 text-white relative">
                    <div class="relative z-10">
                        <h2 class="text-3xl font-black mb-8">Why Join Us?</h2>
                        <ul class="space-y-8">
                            <li class="flex gap-4">
                                <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center flex-shrink-0 text-blue-400">
                                    <i class="fas fa-network-wired"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg">National Network</h4>
                                    <p class="text-slate-400 text-sm">Connect with experts and leaders across the country.</p>
                                </div>
                            </li>
                            <li class="flex gap-4">
                                <div class="w-10 h-10 bg-emerald-600/20 rounded-xl flex items-center justify-center flex-shrink-0 text-emerald-400">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg">Recognition</h4>
                                    <p class="text-slate-400 text-sm">Receive official certification for your contributions.</p>
                                </div>
                            </li>
                            <li class="flex gap-4">
                                <div class="w-10 h-10 bg-amber-600/20 rounded-xl flex items-center justify-center flex-shrink-0 text-amber-400">
                                    <i class="fas fa-hand-holding-heart"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg">Direct Impact</h4>
                                    <p class="text-slate-400 text-sm">Participate in ground-level projects that change lives.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-blue-600/10 to-transparent pointer-events-none"></div>
                </div>

                <div class="lg:w-2/3 p-10 lg:p-16">
                    <?php if (!empty($success)): ?>
                        <div class="mb-10 p-6 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-3xl flex items-center gap-4 animate-bounce">
                            <div class="w-12 h-12 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check"></i>
                            </div>
                            <div>
                                <h4 class="font-black">Success!</h4>
                                <p class="text-sm opacity-80">Your application has been received. Our team will contact you shortly.</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-slate-700 font-bold mb-2 ml-2 text-sm">Full Name</label>
                                <input type="text" name="full_name" required placeholder="e.g. John Doe" class="form-input">
                            </div>
                            <div>
                                <label class="block text-slate-700 font-bold mb-2 ml-2 text-sm">Email Address</label>
                                <input type="email" name="email" required placeholder="john@example.com" class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-slate-700 font-bold mb-2 ml-2 text-sm">Phone Number</label>
                                <input type="text" name="phone" required placeholder="+91 00000 00000" class="form-input">
                            </div>
                            <div>
                                <label class="block text-slate-700 font-bold mb-2 ml-2 text-sm">Membership Type</label>
                                <select name="membership_type" required class="form-input appearance-none">
                                    <option value="">Choose a path...</option>
                                    <option value="General Member">General Member</option>
                                    <option value="Volunteer">Volunteer</option>
                                    <option value="Research Member">Research Member</option>
                                    <option value="Donor">Donor</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-slate-700 font-bold mb-2 ml-2 text-sm">Full Residential Address</label>
                            <textarea name="address" rows="3" required placeholder="Street, City, State, Zip" class="form-input"></textarea>
                        </div>

                        <div>
                            <label class="block text-slate-700 font-bold mb-2 ml-2 text-sm">Your Motivation (Optional)</label>
                            <textarea name="message" rows="4" placeholder="Briefly tell us why you'd like to join the Neelkranti mission..." class="form-input"></textarea>
                        </div>

                        <div class="pt-4">
                            <button class="w-full md:w-auto bg-blue-600 text-white px-12 py-5 rounded-2xl font-black shadow-xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300">
                                Submit Application <i class="fas fa-paper-plane ml-2 opacity-50"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 text-center">
        <p class="text-slate-500 font-medium">Need help with the application? <a href="contact.php" class="text-blue-600 font-bold hover:underline">Contact Support</a></p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>