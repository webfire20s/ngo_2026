<?php
$page_title = "Activities | Neelkranti Foundation";
$active = "activities";
include 'includes/header.php';
?>

<style>
    .gradient-hero {
        background: radial-gradient(circle at top right, #1e40af, #0f172a);
    }
    .hover-scale {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hover-scale:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
    }
    .activity-grid-card {
        @apply bg-white rounded-[2rem] overflow-hidden border border-slate-100 transition-all duration-500;
    }
    .badge-label {
        @apply inline-block text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3;
    }

    /* Animation Classes */
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
</style>

<main class="bg-slate-50 overflow-hidden">
    <section class="py-24 lg:py-32 gradient-hero text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tighter reveal active">
                Our <span class="text-blue-400">Activities</span>
            </h1>
            <p class="text-xl opacity-80 max-w-3xl mx-auto font-light reveal active" style="transition-delay: 0.2s">
                Engaging communities through diverse programs and initiatives for sustainable development.
            </p>
        </div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">Activity Areas</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">Our comprehensive approach to community development through various strategic sectors.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-blue-50/50 p-10 rounded-[2.5rem] hover-scale border border-blue-100/50 reveal" style="transition-delay: 0.1s">
                    <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-blue-200 animate-float">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Education & Training</h3>
                    <p class="text-slate-600 leading-relaxed">Conducting regular training programs, workshops, and educational sessions on fisheries and allied sciences.</p>
                </div>
                
                <div class="bg-emerald-50/50 p-10 rounded-[2.5rem] hover-scale border border-emerald-100/50 reveal" style="transition-delay: 0.2s">
                    <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200 animate-float" style="animation-delay: 0.5s">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Community Development</h3>
                    <p class="text-slate-600 leading-relaxed">Organizing community development programs, awareness campaigns, and social welfare initiatives.</p>
                </div>
                
                <div class="bg-purple-50/50 p-10 rounded-[2.5rem] hover-scale border border-purple-100/50 reveal" style="transition-delay: 0.3s">
                    <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-purple-200 animate-float" style="animation-delay: 1s">
                        <i class="fas fa-microscope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Research Activities</h3>
                    <p class="text-slate-600 leading-relaxed">Conducting applied research, field studies, and knowledge dissemination in the fisheries sector.</p>
                </div>

                <div class="bg-orange-50/50 p-10 rounded-[2.5rem] hover-scale border border-orange-100/50 reveal" style="transition-delay: 0.1s">
                    <div class="w-16 h-16 bg-orange-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-orange-200 animate-float">
                        <i class="fas fa-hand-holding-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Social Welfare</h3>
                    <p class="text-slate-600 leading-relaxed">Implementing social welfare programs, health camps, and livelihood support initiatives.</p>
                </div>

                <div class="bg-rose-50/50 p-10 rounded-[2.5rem] hover-scale border border-rose-100/50 reveal" style="transition-delay: 0.2s">
                    <div class="w-16 h-16 bg-rose-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-rose-200 animate-float" style="animation-delay: 0.5s">
                        <i class="fas fa-leaf text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Environmental Conservation</h3>
                    <p class="text-slate-600 leading-relaxed">Promoting environmental conservation, biodiversity protection, and sustainable practices.</p>
                </div>

                <div class="bg-indigo-50/50 p-10 rounded-[2.5rem] hover-scale border border-indigo-100/50 reveal" style="transition-delay: 0.3s">
                    <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-indigo-200 animate-float" style="animation-delay: 1s">
                        <i class="fas fa-briefcase text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">Entrepreneurship</h3>
                    <p class="text-slate-600 leading-relaxed">Supporting entrepreneurship development, business incubation, and startup guidance.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-16 reveal">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">Training & Hands-on Programs</h2>
                <p class="text-slate-500">Comprehensive skill development modules conducted by our institute.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.05s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-1.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Fish+Culture'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Training</span>
                        <h3 class="text-lg font-bold text-slate-900">Freshwater Fish Culture</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.1s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-2.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Seed+Production'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Training</span>
                        <h3 class="text-lg font-bold text-slate-900">Fish Seed Production</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.15s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-3.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Ornamental'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-purple-100 text-purple-600">Training</span>
                        <h3 class="text-lg font-bold text-slate-900">Culture of Ornamental Fishes</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.2s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-4.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Aquarium'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Skill</span>
                        <h3 class="text-lg font-bold text-slate-900">Fabrication of Aquarium</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.05s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-5.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Feed'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Production</span>
                        <h3 class="text-lg font-bold text-slate-900">Fish Feed Production</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.1s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-6.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Processing'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-purple-100 text-purple-600">Processing</span>
                        <h3 class="text-lg font-bold text-slate-900">Fish Processing & Preservation</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.15s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-7.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Biofertilizer'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Production</span>
                        <h3 class="text-lg font-bold text-slate-900">Production of Biofertilizer</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.2s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-8.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Byproduct'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Production</span>
                        <h3 class="text-lg font-bold text-slate-900">Fish By-Product Production</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.05s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-9.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Value+Added'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-purple-100 text-purple-600">Value Added</span>
                        <h3 class="text-lg font-bold text-slate-900">Value Added Fish Products</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.1s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-10.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Vermi'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Eco</span>
                        <h3 class="text-lg font-bold text-slate-900">Vermi Compost Production</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.15s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-11.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Honey'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Agriculture</span>
                        <h3 class="text-lg font-bold text-slate-900">Honey Bee Culture</h3>
                    </div>
                </div>
<div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.2s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-12.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Water'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-purple-100 text-purple-600">Lab</span>
                        <h3 class="text-lg font-bold text-slate-900">Water Analysis Techniques</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.05s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-13.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Goat'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Farming</span>
                        <h3 class="text-lg font-bold text-slate-900">Goat Farming</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.1s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-14.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Blood'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Healthcare</span>
                        <h3 class="text-lg font-bold text-slate-900">Blood Bank Working</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.15s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-15.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Herbal'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-purple-100 text-purple-600">Herbal</span>
                        <h3 class="text-lg font-bold text-slate-900">Herbal Beauty Products</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.2s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-16.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Remedies'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Herbal</span>
                        <h3 class="text-lg font-bold text-slate-900">Production of Herbal Remedies</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.05s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-17.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Veggie'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Processing</span>
                        <h3 class="text-lg font-bold text-slate-900">Fruits & Vegetables Processing</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.1s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-18.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Dehydration'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-purple-100 text-purple-600">Technology</span>
                        <h3 class="text-lg font-bold text-slate-900">Dehydration Technology</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.15s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-19.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Mushroom'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-blue-100 text-blue-600">Agriculture</span>
                        <h3 class="text-lg font-bold text-slate-900">Mushroom Culture</h3>
                    </div>
                </div>
                <div class="activity-grid-card hover-scale reveal" style="transition-delay: 0.2s">
                    <div class="overflow-hidden h-48">
                        <img src="images/activities/activity-20.jpg" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" onerror="this.src='https://placehold.co/600x400?text=Grafting'">
                    </div>
                    <div class="p-6">
                        <span class="badge-label bg-emerald-100 text-emerald-600">Skill</span>
                        <h3 class="text-lg font-bold text-slate-900">Plant Grafting Techniques</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white border-y border-slate-100">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Ongoing Strategic Projects</h2>
            </div>
            
            <div class="space-y-8">
                <div class="bg-slate-50 p-8 md:p-12 rounded-[3rem] border border-slate-100 flex flex-col md:flex-row gap-8 items-start reveal">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-project-diagram text-blue-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3">Sustainable Aquaculture Development Project</h3>
                        <p class="text-slate-500 mb-6 leading-relaxed">A comprehensive 3-year project focused on promoting sustainable aquaculture practices among small-scale farmers in 5 districts of Bihar.</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Duration</span><span class="font-bold">2023-2026</span></div>
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Beneficiaries</span><span class="font-bold">500+ Farmers</span></div>
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Funding</span><span class="font-bold">Govt Grant</span></div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-slate-50 p-8 md:p-12 rounded-[3rem] border border-slate-100 flex flex-col md:flex-row gap-8 items-start reveal">
                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-graduation-cap text-emerald-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3">Skill Development Initiative</h3>
                        <p class="text-slate-500 mb-6 leading-relaxed">Providing vocational training and skill development programs to unemployed youth in fisheries and allied sectors.</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Duration</span><span class="font-bold">2024-2025</span></div>
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Target</span><span class="font-bold">1000 Youth</span></div>
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Partner</span><span class="font-bold">State Govt</span></div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 p-8 md:p-12 rounded-[3rem] border border-slate-100 flex flex-col md:flex-row gap-8 items-start reveal">
                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-leaf text-purple-600 text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 mb-3">Environmental Conservation Program</h3>
                        <p class="text-slate-500 mb-6 leading-relaxed">Working on water conservation and biodiversity protection in collaboration with local communities.</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Duration</span><span class="font-bold">Ongoing</span></div>
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Coverage</span><span class="font-bold">10 Villages</span></div>
                            <div class="bg-white p-4 rounded-2xl border border-slate-200/50 hover:shadow-md transition-shadow"><span class="block text-[10px] uppercase font-bold text-slate-400">Focus</span><span class="font-bold">Water Bodies</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-900 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div class="reveal" style="transition-delay: 0.1s">
                    <div class="text-5xl font-black text-blue-400 mb-2">100+</div>
                    <div class="text-xs font-bold uppercase tracking-widest opacity-50">Programs</div>
                </div>
                <div class="reveal" style="transition-delay: 0.2s">
                    <div class="text-5xl font-black text-blue-400 mb-2">5000+</div>
                    <div class="text-xs font-bold uppercase tracking-widest opacity-50">People Trained</div>
                </div>
                <div class="reveal" style="transition-delay: 0.3s">
                    <div class="text-5xl font-black text-blue-400 mb-2">50+</div>
                    <div class="text-xs font-bold uppercase tracking-widest opacity-50">Villages</div>
                </div>
                <div class="reveal" style="transition-delay: 0.4s">
                    <div class="text-5xl font-black text-blue-400 mb-2">25+</div>
                    <div class="text-xs font-bold uppercase tracking-widest opacity-50">Projects</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl font-black text-slate-900 tracking-tighter">Upcoming Activities</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-8 rounded-[2rem] bg-blue-50 border border-blue-100 flex gap-6 items-start hover-scale reveal" style="transition-delay: 0.1s">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white flex-shrink-0 shadow-lg"><i class="fas fa-calendar"></i></div>
                    <div>
                        <h3 class="font-bold text-slate-900">Fish Farming Workshop</h3>
                        <p class="text-xs font-bold text-blue-600 mb-2 uppercase">April 15-20, 2024</p>
                        <p class="text-sm text-slate-500">5-day intensive workshop on modern techniques.</p>
                    </div>
                </div>
                <div class="p-8 rounded-[2rem] bg-emerald-50 border border-emerald-100 flex gap-6 items-start hover-scale reveal" style="transition-delay: 0.2s">
                    <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white flex-shrink-0 shadow-lg"><i class="fas fa-calendar"></i></div>
                    <div>
                        <h3 class="font-bold text-slate-900">Health Camp</h3>
                        <p class="text-xs font-bold text-emerald-600 mb-2 uppercase">April 25, 2024</p>
                        <p class="text-sm text-slate-500">Free health check-up for farming communities.</p>
                    </div>
                </div>
                <div class="p-8 rounded-[2rem] bg-purple-50 border border-purple-100 flex gap-6 items-start hover-scale reveal" style="transition-delay: 0.3s">
                    <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center text-white flex-shrink-0 shadow-lg"><i class="fas fa-calendar"></i></div>
                    <div>
                        <h3 class="font-bold text-slate-900">Research Seminar</h3>
                        <p class="text-xs font-bold text-purple-600 mb-2 uppercase">May 5, 2024</p>
                        <p class="text-sm text-slate-500">National seminar on recent advances.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-blue-600 rounded-[3rem] p-12 md:p-20 text-center text-white relative overflow-hidden shadow-2xl reveal">
                <h2 class="text-4xl font-black mb-6 tracking-tighter leading-tight">Get Involved Today</h2>
                <p class="text-lg opacity-80 mb-10 max-w-xl mx-auto">Join our programs, volunteer your time, or support our initiatives to help us create more impact.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="contact.php" class="bg-white text-blue-600 px-10 py-4 rounded-2xl font-black hover:scale-105 transition-transform shadow-lg">Join Programs</a>
                    <a href="membership_apply.php" class="bg-blue-700 text-white px-10 py-4 rounded-2xl font-black hover:bg-blue-800 transition-all border border-blue-500/50">Volunteer Now</a>
                </div>
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </section>
</main>

<script>
    // Intersection Observer for Reveal Animations
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
</script>

<?php include 'includes/footer.php'; ?>