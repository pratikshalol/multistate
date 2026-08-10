<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- 1. CAPTIVE HERO BANNER SLIDER -->
<div class="relative bg-slate-900 text-white overflow-hidden shadow-xl border-b border-amber-500/20">
    <div id="heroSlider" class="relative min-h-[460px] md:min-h-[520px] flex items-center">
        <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $index => $banner): ?>
                <div class="banner-slide <?= $index === 0 ? 'active' : '' ?> w-full py-12 md:py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto items-center grid grid-cols-1 md:grid-cols-12 gap-8">
                    
                    <?php if ($banner['image_position'] === 'left'): ?>
                        <!-- Popping Image on Left -->
                        <div class="md:col-span-6 flex justify-center order-2 md:order-1 relative group">
                            <div class="absolute -inset-4 bg-gradient-to-r from-amber-500/30 to-brand-gold/30 rounded-3xl blur-xl transform group-hover:scale-105 transition-transform duration-500"></div>
                            <div class="relative z-10 p-2 bg-gradient-to-tr from-brand-700 to-slate-800 rounded-2xl shadow-2xl border border-amber-500/30">
                                <img src="<?= base_url($banner['image']) ?>" alt="Banner Graphic" class="w-full max-w-md h-auto object-contain transform md:-translate-y-2 drop-shadow-2xl">
                            </div>
                        </div>

                        <!-- Text Content on Right -->
                        <div class="md:col-span-6 space-y-6 order-1 md:order-2">
                            <span class="inline-flex items-center space-x-2 bg-amber-500/20 text-amber-300 text-xs font-bold px-3 py-1.5 rounded-full border border-amber-500/40 uppercase tracking-widest">
                                <span>✨ Member First Banking</span>
                            </span>
                            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-white leading-tight">
                                <?= esc($banner['headline']) ?>
                            </h1>
                            <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-xl">
                                <?= esc($banner['subtext']) ?>
                            </p>
                            <?php if (!empty($banner['cta_text'])): ?>
                                <div class="pt-2">
                                    <a href="<?= base_url($banner['cta_link'] ?: 'account-opening') ?>" class="inline-flex items-center space-x-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3.5 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                                        <span><?= esc($banner['cta_text']) ?></span>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <!-- Text Content on Left (Default) -->
                        <div class="md:col-span-6 space-y-6">
                            <span class="inline-flex items-center space-x-2 bg-amber-500/20 text-amber-300 text-xs font-bold px-3 py-1.5 rounded-full border border-amber-500/40 uppercase tracking-widest">
                                <span>🏆 Trusted Multistate Society</span>
                            </span>
                            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight text-white leading-tight">
                                <?= esc($banner['headline']) ?>
                            </h1>
                            <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-xl">
                                <?= esc($banner['subtext']) ?>
                            </p>
                            <?php if (!empty($banner['cta_text'])): ?>
                                <div class="pt-2">
                                    <a href="<?= base_url($banner['cta_link'] ?: 'account-opening') ?>" class="inline-flex items-center space-x-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3.5 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                                        <span><?= esc($banner['cta_text']) ?></span>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Popping Image on Right -->
                        <div class="md:col-span-6 flex justify-center relative group">
                            <div class="absolute -inset-4 bg-gradient-to-r from-brand-gold/30 to-amber-500/30 rounded-3xl blur-xl transform group-hover:scale-105 transition-transform duration-500"></div>
                            <div class="relative z-10 p-2 bg-gradient-to-tr from-brand-700 to-slate-800 rounded-2xl shadow-2xl border border-amber-500/30">
                                <img src="<?= base_url($banner['image']) ?>" alt="Banner Graphic" class="w-full max-w-md h-auto object-contain transform md:-translate-y-2 drop-shadow-2xl">
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Fallback Slide -->
            <div class="banner-slide active w-full py-16 px-8 max-w-7xl mx-auto text-center space-y-4">
                <h1 class="text-4xl font-extrabold text-white">Welcome to Samarth Multistate Co-operative Credit Society</h1>
                <p class="text-slate-300 max-w-2xl mx-auto">High return deposit plans, instant gold loans, and modern digital banking.</p>
                <a href="<?= base_url('account-opening') ?>" class="inline-block bg-amber-500 text-slate-950 font-bold px-6 py-3 rounded-lg">Open Account Online</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Slider Navigation Dots -->
    <?php if (count($banners) > 1): ?>
        <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-20">
            <?php foreach ($banners as $index => $banner): ?>
                <button onclick="goToSlide(<?= $index ?>)" class="dot-btn w-3 h-3 rounded-full <?= $index === 0 ? 'bg-amber-400 w-8' : 'bg-slate-500' ?> transition-all duration-300"></button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- 2. PROMINENT ONLINE ACCOUNT OPENING CTA BANNER -->
<section class="bg-gradient-to-r from-amber-500 via-amber-400 to-yellow-500 py-8 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-1 text-center md:text-left text-slate-950">
            <h2 class="text-2xl md:text-3xl font-black tracking-tight">Open Your Co-operative Account Online in Minutes!</h2>
            <p class="text-sm font-semibold text-slate-900/90">Enjoy up to 10.50% p.a. interest rates on deposits, mobile banking access, & doorstep agent services.</p>
        </div>
        <div class="shrink-0">
            <a href="<?= base_url('account-opening') ?>" class="inline-flex items-center space-x-2 bg-slate-950 hover:bg-slate-900 text-white font-black text-base px-7 py-3.5 rounded-xl shadow-xl hover:shadow-2xl transition-all transform hover:scale-105 border border-amber-300">
                <span>Start Online Application</span>
                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 3. QUICK METRIC STATS -->
<section class="bg-white py-10 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 shadow-sm">
                <div class="text-3xl md:text-4xl font-black text-brand-700">50,000+</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mt-1">Satisfied Members</div>
            </div>
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 shadow-sm">
                <div class="text-3xl md:text-4xl font-black text-amber-600">₹ 250+ Cr</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mt-1">Total Deposits</div>
            </div>
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 shadow-sm">
                <div class="text-3xl md:text-4xl font-black text-brand-700">10.50%</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mt-1">Max FD Return Rate</div>
            </div>
            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 shadow-sm">
                <div class="text-3xl md:text-4xl font-black text-emerald-700">15 Mins</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mt-1">Instant Gold Loan Approval</div>
            </div>
        </div>
    </div>
</section>

<!-- 4. DEPOSIT SCHEMES SECTION -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-2 mb-12">
            <span class="text-xs font-bold text-amber-600 uppercase tracking-widest bg-amber-100 px-3 py-1 rounded-full">High Return Plans</span>
            <h2 class="text-3xl font-extrabold text-slate-900">Featured Deposit Schemes</h2>
            <p class="text-sm text-slate-600 max-w-xl mx-auto">Choose from flexible, guaranteed return deposit plans tailored for short-term and long-term financial growth.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($deposits as $plan): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                    <div>
                        <div class="relative h-44 bg-slate-100">
                            <?php if (!empty($plan['image'])): ?>
                                <img src="<?= base_url($plan['image']) ?>" alt="<?= esc($plan['name']) ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-brand-600 flex items-center justify-center text-4xl">💰</div>
                            <?php endif; ?>
                            <span class="absolute top-3 right-3 bg-amber-500 text-slate-950 font-black text-xs px-2.5 py-1 rounded-md shadow">
                                <?= esc($plan['interest_rate']) ?>
                            </span>
                        </div>
                        <div class="p-5 space-y-3">
                            <h3 class="font-bold text-lg text-slate-900 leading-snug"><?= esc($plan['name']) ?></h3>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed"><?= esc($plan['short_description']) ?></p>
                            <div class="text-xs space-y-1 pt-2 border-t border-slate-100 text-slate-700">
                                <div class="flex justify-between">
                                    <span class="text-slate-500">Min Deposit:</span>
                                    <span class="font-bold"><?= esc($plan['min_amount']) ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-500">Tenure:</span>
                                    <span class="font-bold"><?= esc($plan['tenure']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="<?= base_url('deposits/' . $plan['slug']) ?>" class="block w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                            View Plan Details &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. LOAN PRODUCTS SECTION -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-2 mb-12">
            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest bg-emerald-100 px-3 py-1 rounded-full">Hassle-Free Credit</span>
            <h2 class="text-3xl font-extrabold text-slate-900">Loan Products & Assistance</h2>
            <p class="text-sm text-slate-600 max-w-xl mx-auto">Instant financial support with minimal documentation and lowest interest rates.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($loans as $loan): ?>
                <div class="bg-slate-50 rounded-2xl border border-slate-200 p-5 flex flex-col justify-between hover:border-amber-400 transition-colors shadow-sm">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center font-bold text-xl">🤝</span>
                            <span class="bg-emerald-600 text-white text-[11px] font-bold px-2 py-0.5 rounded">
                                <?= esc($loan['interest_rate']) ?>
                            </span>
                        </div>
                        <h3 class="font-bold text-base text-slate-900"><?= esc($loan['name']) ?></h3>
                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed"><?= esc($loan['short_description']) ?></p>
                        
                        <div class="bg-white p-3 rounded-lg border border-slate-200 text-xs space-y-1">
                            <div class="flex justify-between">
                                <span class="text-slate-500">Max Valuation:</span>
                                <span class="font-semibold text-slate-800"><?= esc($loan['max_percentage']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Repayment:</span>
                                <span class="font-semibold text-slate-800"><?= esc($loan['tenure']) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="<?= base_url('loans/' . $loan['slug']) ?>" class="block w-full text-center border border-brand-600 text-brand-600 hover:bg-brand-600 hover:text-white font-bold py-2 rounded-lg text-xs transition-colors">
                            Apply / Details &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 6. DIGITAL BANKING SERVICES -->
<section class="py-16 bg-brand-900 text-white relative overflow-hidden">
    <!-- Subtle decorative background rings -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-brand-700/30 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-brand-800/40 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-2 mb-12">
            <span class="text-xs font-bold text-amber-400 uppercase tracking-widest bg-amber-400/10 border border-amber-400/30 px-3 py-1 rounded-full">Always On, Always Secure</span>
            <h2 class="text-3xl font-extrabold text-white">Modern Digital Banking Services</h2>
            <p class="text-sm text-brand-200 max-w-xl mx-auto">Access your accounts, transfer funds, and grow your savings — anytime, anywhere.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-brand-800/60 border border-brand-700 rounded-2xl p-6 hover:border-amber-400/60 hover:bg-brand-800 transition-all group flex flex-col space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">📱</div>
                <div class="space-y-1.5">
                    <h3 class="font-bold text-base text-white">Mobile Banking</h3>
                    <p class="text-xs text-brand-200 leading-relaxed">24/7 fund transfers, e-passbook, mini statements & deposit tracking on your phone.</p>
                </div>
                <a href="<?= base_url('page/mobile-internet-banking') ?>" class="inline-flex items-center text-xs font-semibold text-amber-400 hover:text-amber-300 space-x-1 mt-auto">
                    <span>Learn More</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-brand-800/60 border border-brand-700 rounded-2xl p-6 hover:border-amber-400/60 hover:bg-brand-800 transition-all group flex flex-col space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">📲</div>
                <div class="space-y-1.5">
                    <h3 class="font-bold text-base text-white">QR Code Payments</h3>
                    <p class="text-xs text-brand-200 leading-relaxed">Accept payments from all UPI apps directly into your society account — zero MDR charges.</p>
                </div>
                <a href="<?= base_url('page/qr-code-payments') ?>" class="inline-flex items-center text-xs font-semibold text-amber-400 hover:text-amber-300 space-x-1 mt-auto">
                    <span>Get QR Standee</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-brand-800/60 border border-brand-700 rounded-2xl p-6 hover:border-amber-400/60 hover:bg-brand-800 transition-all group flex flex-col space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">🏠</div>
                <div class="space-y-1.5">
                    <h3 class="font-bold text-base text-white">Doorstep Banking</h3>
                    <p class="text-xs text-brand-200 leading-relaxed">Our agents collect deposits and cash at your doorstep — perfect for farmers & senior members.</p>
                </div>
                <a href="<?= base_url('contact') ?>" class="inline-flex items-center text-xs font-semibold text-amber-400 hover:text-amber-300 space-x-1 mt-auto">
                    <span>Book a Visit</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="bg-brand-800/60 border border-brand-700 rounded-2xl p-6 hover:border-amber-400/60 hover:bg-brand-800 transition-all group flex flex-col space-y-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">🏢</div>
                <div class="space-y-1.5">
                    <h3 class="font-bold text-base text-white">Branch Network</h3>
                    <p class="text-xs text-brand-200 leading-relaxed">Multiple branches across Maharashtra with trained staff ready to assist you personally.</p>
                </div>
                <a href="<?= base_url('branches') ?>" class="inline-flex items-center text-xs font-semibold text-amber-400 hover:text-amber-300 space-x-1 mt-auto">
                    <span>Find a Branch</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 7. NOTICES & ANNOUNCEMENTS TICKER / LIST -->
<section class="py-12 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-slate-900 flex items-center space-x-2">
                <span>📢</span>
                <span>Latest Notices & Announcements</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if (!empty($notices)): ?>
                <?php foreach ($notices as $notice): ?>
                    <div class="p-5 rounded-xl bg-slate-50 border border-slate-200 space-y-2 hover:shadow-sm transition-shadow">
                        <div class="text-[11px] font-bold text-amber-600 uppercase">
                            Published: <?= esc($notice['publish_date']) ?>
                        </div>
                        <h3 class="font-bold text-sm text-slate-900 line-clamp-2"><?= esc($notice['title']) ?></h3>
                        <p class="text-xs text-slate-600 line-clamp-3"><?= esc($notice['description']) ?></p>
                        <?php if (!empty($notice['file_path'])): ?>
                            <a href="<?= base_url($notice['file_path']) ?>" target="_blank" class="inline-flex items-center text-xs font-bold text-brand-600 hover:underline space-x-1 pt-1">
                                <span>📄 Download Attachment</span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-xs text-slate-500">No active notices at this time.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 8. TESTIMONIALS -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-2 mb-10">
            <span class="text-xs font-bold text-amber-600 uppercase tracking-widest bg-amber-100 px-3 py-1 rounded-full">Member Reviews</span>
            <h2 class="text-3xl font-extrabold text-slate-900">What Our Members Say</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($testimonials as $t): ?>
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="flex items-center space-x-1 text-amber-400 text-sm">
                        <?php for($i=0; $i<($t['rating'] ?? 5); $i++): ?>★<?php endfor; ?>
                    </div>
                    <p class="text-xs text-slate-600 italic leading-relaxed">"<?= esc($t['message']) ?>"</p>
                    <div class="flex items-center space-x-3 pt-2 border-t border-slate-100">
                        <div class="w-9 h-9 rounded-full bg-brand-600 text-amber-400 font-bold flex items-center justify-center text-sm">
                            <?= strtoupper(substr($t['name'], 0, 1)) ?>
                        </div>
                        <div>
                            <div class="font-bold text-xs text-slate-900"><?= esc($t['name']) ?></div>
                            <div class="text-[10px] text-slate-500">Verified Member</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- JavaScript Carousel Controller -->
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.banner-slide');
    const dots = document.querySelectorAll('.dot-btn');

    function showSlide(index) {
        slides.forEach((s, i) => {
            s.classList.remove('active');
            if (dots[i]) {
                dots[i].classList.remove('bg-amber-400', 'w-8');
                dots[i].classList.add('bg-slate-500');
            }
        });
        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.remove('bg-slate-500');
            dots[index].classList.add('bg-amber-400', 'w-8');
        }
        currentSlide = index;
    }

    function goToSlide(index) {
        showSlide(index);
    }

    if (slides.length > 1) {
        setInterval(() => {
            let next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }, 6000);
    }
</script>

<?= $this->endSection() ?>
