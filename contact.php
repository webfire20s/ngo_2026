<?php
$page_title = "Contact Us | Neelkranti Foundation";
$active = "contact";

include 'includes/header.php';
include 'includes/db.php';

// LOGIC UNCHANGED
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    $success = true;
}
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    .contact-input {
        @apply w-full bg-white border border-slate-200 rounded-2xl px-6 py-4 outline-none transition-all focus:border-blue-600 focus:ring-4 focus:ring-blue-50;
    }
    .info-card {
        @apply flex items-start gap-6 p-8 bg-white rounded-[2rem] border border-slate-100 shadow-sm transition-all hover:shadow-md;
    }
    .icon-box {
        @apply w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 text-xl;
    }
</style>

<main class="bg-slate-50 min-h-screen">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Get In Touch</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter">Connect With <span class="text-blue-400">Us</span></h1>
            <p class="text-xl opacity-80 max-w-2xl mx-auto font-light leading-relaxed">
                Have questions about our initiatives or want to collaborate? Reach out to our team today.
            </p>
        </div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 blur-[100px] rounded-full -mr-48 -mt-48"></div>
    </section>

    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4">
            
            <?php if (!empty($success)): ?>
                <div class="mb-12 p-6 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-[2rem] text-center font-bold flex items-center justify-center gap-3 animate-bounce">
                    <i class="fas fa-check-circle text-xl"></i>
                    Message sent successfully! We'll get back to you soon.
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                
                <div class="lg:col-span-7">
                    <div class="bg-white p-10 md:p-16 rounded-[3.5rem] shadow-sm border border-slate-100">
                        <h2 class="text-3xl font-black text-slate-900 mb-8 tracking-tight">Send a Message</h2>
                        
                        <form method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-2">Full Name</label>
                                    <input type="text" name="name" placeholder="John Doe" required class="contact-input">
                                </div>
                                <div>
                                    <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-2">Email Address</label>
                                    <input type="email" name="email" placeholder="john@example.com" required class="contact-input">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-2">How can we help?</label>
                                <textarea name="message" rows="6" placeholder="Tell us about your inquiry..." required class="contact-input resize-none"></textarea>
                            </div>

                            <button type="submit" class="w-full md:w-auto bg-slate-900 text-white px-12 py-5 rounded-2xl font-black hover:bg-blue-600 transition-all duration-300 shadow-xl shadow-slate-200 flex items-center justify-center gap-3 group">
                                Send Message
                                <i class="fas fa-paper-plane text-xs transition-transform group-hover:translate-x-1 group-hover:-translate-y-1"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-5 space-y-8">
                    
                    <div class="info-card">
                        <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4 class="font-black text-slate-900 uppercase tracking-tighter text-lg mb-1">Our Headquarters</h4>
                            <p class="text-slate-500 leading-relaxed">
                                Raviraj Park, Parbhani,<br>
                                Maharashtra – 431491, India
                            </p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="icon-box"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <h4 class="font-black text-slate-900 uppercase tracking-tighter text-lg mb-1">Call Support</h4>
                            <p class="text-blue-600 font-black text-xl tracking-tighter">+91 9284476047</p>
                            <p class="text-slate-400 text-xs mt-1 uppercase font-bold tracking-widest">Mon-Sat, 9AM - 6PM</p>
                        </div>
                    </div>

                    <div class="rounded-[2.5rem] overflow-hidden border border-slate-200 shadow-2xl shadow-blue-900/5 h-[350px]">
                        <iframe
                            class="w-full h-full grayscale hover:grayscale-0 transition-all duration-1000"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15024.16734185121!2d76.7578278!3d19.2707578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd019688863f669%3A0x3f5c78a946324a30!2sParbhani%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin">
                        </iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>