<?php
include 'includes/header.php';
include 'includes/db.php';
?>

<style>
    .gradient-hero-members {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
    }
    .member-card {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .member-card:hover {
        transform: translateY(-12px);
    }
    .member-image-container {
        clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);
    }
</style>

<main class="bg-slate-50">

<section class="relative py-28 lg:py-40 overflow-hidden gradient-hero-members text-white text-center">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" fill="none" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
        </svg>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4">
        <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-[0.3em] text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 rounded-full">
            Our Community
        </span>
        <h1 class="text-5xl md:text-8xl font-black mb-6 tracking-tighter leading-none">Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Members</span></h1>
        <p class="text-xl md:text-2xl opacity-80 max-w-2xl mx-auto font-light leading-relaxed">
            The dedicated individuals driving the Neelkranti mission forward across the nation.
        </p>
    </div>
</section>

<section class="py-24 -mt-12 relative z-10">
    <div class="max-w-7xl mx-auto px-4">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <?php
            $result = $conn->query("SELECT * FROM members ORDER BY id DESC");

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $photoPath = !empty($row['photo']) ? 'uploads/members/' . $row['photo'] : 'images/default-member.jpg';
            ?>
                <div class="member-card group bg-white rounded-[2.5rem] shadow-sm hover:shadow-2xl overflow-hidden border border-slate-100 transition-all duration-500">
                    
                    <div class="member-image-container overflow-hidden bg-slate-200 aspect-[4/5]">
                        <img src="<?= htmlspecialchars($photoPath); ?>"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                             alt="<?= htmlspecialchars($row['name']); ?>"
                             onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($row['name']) ?>&background=0D8ABC&color=fff&size=512'">
                    </div>

                    <div class="p-8 text-center relative">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-1 bg-blue-600 rounded-full"></div>
                        
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-2 group-hover:text-blue-700 transition-colors">
                            <?= htmlspecialchars($row['name']); ?>
                        </h3>
                        <p class="text-blue-600 font-bold uppercase tracking-widest text-[10px] bg-blue-50 inline-block px-4 py-1.5 rounded-full mb-4">
                            <?= htmlspecialchars($row['designation']); ?>
                        </p>
                        
                        <div class="flex justify-center gap-4 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-linkedin-in text-xs"></i></a>
                            <a href="#" class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fas fa-envelope text-xs"></i></a>
                        </div>
                    </div>
                </div>

            <?php
                endwhile;
            else:
            ?>
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users-slash text-3xl text-slate-300"></i>
                    </div>
                    <p class="text-slate-500 font-medium text-lg">
                        Our membership registry is currently being updated.
                    </p>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="bg-slate-900 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/20 rounded-full blur-[100px]"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Want to join the foundation?</h2>
                <p class="text-slate-400 text-lg mb-10 max-w-xl mx-auto">Become a part of a national network dedicated to sustainable development and community empowerment.</p>
                <a href="membership_apply.php" class="inline-block bg-white text-slate-900 px-10 py-4 rounded-2xl font-black hover:scale-105 transition-all shadow-xl">
                    Apply for Membership
                </a>
            </div>
        </div>
    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>