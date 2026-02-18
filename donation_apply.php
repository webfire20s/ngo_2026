<?php
$page_title = "Support Our Mission | Neel Foundation";
$active = "donate";
include 'includes/header.php'; 
?>

<style>
    /* Aligning with the established Navy/Blue gradient theme */
    .gradient-hero-donate {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    .donate-input {
        @apply w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none transition-all duration-300 font-medium text-slate-700;
    }
    .donate-input:focus {
        @apply border-blue-500 ring-4 ring-blue-500/10 bg-white shadow-lg;
    }
    .impact-card {
        transition: all 0.3s ease;
    }
    .impact-card:hover {
        transform: translateY(-5px);
    }
</style>

<main class="bg-slate-50">

    <section class="py-28 lg:py-40 gradient-hero-donate text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.3em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full">
                Fuel the Change
            </span>
            <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none">Your Gift, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Their Future.</span></h1>
            <p class="text-xl md:text-2xl opacity-80 max-w-2xl mx-auto font-light leading-relaxed">
                Empowering rural communities through sustainable fisheries and scientific innovation.
            </p>
        </div>
    </section>

    <section class="py-24 -mt-20 relative z-10">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-white shadow-2xl rounded-[3rem] overflow-hidden border border-slate-100 flex flex-col md:flex-row">
                
                <div class="md:w-1/3 bg-slate-900 p-10 text-white relative">
                    <div class="relative z-10 space-y-10">
                        <div>
                            <h3 class="text-xl font-black mb-4 flex items-center gap-3">
                                <i class="fas fa-shield-heart text-blue-400"></i> Trust
                            </h3>
                            <p class="text-slate-400 text-sm leading-relaxed">Every contribution is audited and channeled directly to our ground-level initiatives.</p>
                        </div>
                        <div class="pt-6 border-t border-slate-800">
                            <h3 class="text-xl font-black mb-4 flex items-center gap-3">
                                <i class="fas fa-receipt text-emerald-400"></i> Tax Benefits
                            </h3>
                            <p class="text-slate-400 text-sm leading-relaxed">Donations are eligible for tax exemptions under relevant local authorities.</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-600 rounded-full blur-[80px] opacity-20"></div>
                </div>

                <div class="md:w-2/3 p-10 lg:p-16">
                    <form action="donation_submit.php" method="POST" class="space-y-8">
                        
                        <div class="mb-10">
                            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Make a Contribution</h2>
                            <div class="w-12 h-1.5 bg-blue-600 mt-3 rounded-full"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Full Name</label>
                                <input type="text" name="name" required placeholder="Your Name" class="donate-input">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Email Address</label>
                                <input type="email" name="email" required placeholder="Your E-mail Address" class="donate-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Phone Number</label>
                                <input type="text" name="phone" required placeholder="+91 00000 00000" class="donate-input">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Donation Amount (₹)</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 font-bold">₹</span>
                                    <input type="number" name="amount" required min="1" placeholder="1000" class="donate-input pl-10">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Support Area</label>
                            <select name="donation_type" required class="donate-input appearance-none">
                                <option value="">Select a specific cause...</option>
                                <option value="General Donation">General Donation</option>
                                <option value="Education Support">Education Support</option>
                                <option value="Medical Support">Medical Support</option>
                                <option value="Research Funding">Research Funding</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-2">Notes (Optional)</label>
                            <textarea name="message" rows="3" placeholder="Notes..." class="donate-input"></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-blue-600 text-white px-8 py-5 rounded-2xl font-black text-lg hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300 shadow-xl shadow-blue-100 flex items-center justify-center gap-3">
                                Proceed to Donate <i class="fas fa-arrow-right text-sm opacity-50"></i>
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>

    <section class="py-20 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap justify-center items-center gap-12 opacity-30 grayscale">
                <div class="flex items-center gap-3 font-black text-sm uppercase tracking-tighter"><i class="fas fa-shield-alt text-2xl"></i> Secure Payment</div>
                <div class="flex items-center gap-3 font-black text-sm uppercase tracking-tighter"><i class="fas fa-certificate text-2xl"></i> NGO Verified</div>
                <div class="flex items-center gap-3 font-black text-sm uppercase tracking-tighter"><i class="fas fa-handshake text-2xl"></i> Direct Impact</div>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>