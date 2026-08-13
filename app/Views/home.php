<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- ════════════════════════════════════════════════════════
     1. HERO BANNER SLIDER  — true CSS translate sliding
     ════════════════════════════════════════════════════════ -->
<style>
    /* Slider viewport — clips the track */
    #sliderViewport { overflow: hidden; position: relative; }

    /* Track holds all slides side-by-side */
    #sliderTrack {
        display: flex;
        width: 100%;
        transition: transform 0.55s cubic-bezier(0.45, 0, 0.2, 1);
        will-change: transform;
    }

    /* Each slide is exactly one viewport wide */
    .slide-panel {
        flex: 0 0 100%;
        width: 100%;
    }
</style>

<div class="relative bg-white border-b border-slate-200" id="sliderViewport">

    <!-- Track: all slides in a horizontal row -->
    <div id="sliderTrack">
        <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $index => $banner): ?>
                <div class="slide-panel py-6 md:py-8">
                    <div class="section-inner grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 items-center">

                        <?php if ($banner['image_position'] === 'left'): ?>
                            <!-- Image left -->
                            <div class="order-2 md:order-1">
                                <img src="<?= base_url($banner['image']) ?>" alt="<?= esc($banner['headline']) ?>"
                                     class="w-full h-[280px] md:h-[400px] object-cover rounded-2xl shadow-lg">
                            </div>
                            <!-- Text right -->
                            <div class="order-1 md:order-2 flex flex-col justify-center space-y-4">
                                <span class="section-badge w-fit">Member-First Banking</span>
                                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black tracking-tight text-slate-900 leading-tight"><?= esc($banner['headline']) ?></h1>
                                <p class="text-slate-500 text-sm md:text-base leading-relaxed"><?= esc($banner['subtext']) ?></p>
                                <?php if (!empty($banner['cta_text'])): ?>
                                    <div class="flex flex-wrap gap-3 pt-1">
                                        <a href="<?= base_url($banner['cta_link'] ?: 'account-opening') ?>" class="btn-primary shadow-sm">
                                            <?= esc($banner['cta_text']) ?>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                        </a>
                                        <a href="<?= base_url('contact') ?>" class="btn-outline">Learn More</a>
                                    </div>
                                <?php endif; ?>
                            </div>

                        <?php else: ?>
                            <!-- Text left -->
                            <div class="flex flex-col justify-center space-y-4">
                                <span class="section-badge w-fit">Trusted Multistate Society</span>
                                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black tracking-tight text-slate-900 leading-tight"><?= esc($banner['headline']) ?></h1>
                                <p class="text-slate-500 text-sm md:text-base leading-relaxed"><?= esc($banner['subtext']) ?></p>
                                <?php if (!empty($banner['cta_text'])): ?>
                                    <div class="flex flex-wrap gap-3 pt-1">
                                        <a href="<?= base_url($banner['cta_link'] ?: 'account-opening') ?>" class="btn-primary shadow-sm">
                                            <?= esc($banner['cta_text']) ?>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                        </a>
                                        <a href="<?= base_url('contact') ?>" class="btn-outline">Learn More</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Image right -->
                            <div>
                                <img src="<?= base_url($banner['image']) ?>" alt="<?= esc($banner['headline']) ?>"
                                     class="w-full h-[280px] md:h-[400px] object-cover rounded-2xl shadow-lg">
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Fallback when no banners -->
            <div class="slide-panel py-8">
                <div class="section-inner grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-4">
                        <span class="section-badge">Trusted Multistate Society</span>
                        <h1 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight">Your Trusted Co-operative Banking Partner</h1>
                        <p class="text-slate-500 text-base leading-relaxed">High return deposit plans, instant gold loans, and modern digital banking.</p>
                        <div class="flex flex-wrap gap-3 pt-1">
                            <a href="<?= base_url('account-opening') ?>" class="btn-primary shadow-sm">Open Account</a>
                            <a href="<?= base_url('deposits') ?>" class="btn-outline">View Deposits</a>
                        </div>
                    </div>
                    <div class="hidden md:flex justify-center">
                        <div class="w-full h-[360px] rounded-2xl bg-brand-50 border border-brand-100 flex items-center justify-center text-8xl">🏦</div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Dots nav -->
    <?php if (!empty($banners) && count($banners) > 1): ?>
        <div class="flex justify-center gap-2 py-4">
            <?php foreach ($banners as $i => $_): ?>
                <button onclick="sliderGoTo(<?= $i ?>)" id="dot-<?= $i ?>"
                        class="h-2 rounded-full transition-all duration-300 <?= $i === 0 ? 'bg-brand-600 w-6' : 'bg-slate-300 w-2' ?>"></button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Prev / Next arrows (only shown if >1 banner) -->
    <?php if (!empty($banners) && count($banners) > 1): ?>
        <button onclick="sliderPrev()" class="absolute left-3 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white border border-slate-200 shadow rounded-full w-9 h-9 flex items-center justify-center text-slate-600 hover:text-brand-700 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="sliderNext()" class="absolute right-3 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white border border-slate-200 shadow rounded-full w-9 h-9 flex items-center justify-center text-slate-600 hover:text-brand-700 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </button>
    <?php endif; ?>
</div>


<!-- ════════════════════════════════════════════════════════
     2. TRUST STATS BAR  — clean white, blue accent numbers
     ════════════════════════════════════════════════════════ -->
<section class="section section-light">
    <div class="section-inner">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-reveal-group>
            <div class="space-y-1">
                <div class="text-3xl md:text-4xl font-black text-brand-600">50,000+</div>
                <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Satisfied Members</div>
            </div>
            <div class="space-y-1">
                <div class="text-3xl md:text-4xl font-black text-brand-600">&#8377; 250+ Cr</div>
                <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Deposits</div>
            </div>
            <div class="space-y-1">
                <div class="text-3xl md:text-4xl font-black text-brand-600">10.50%</div>
                <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Max FD Return Rate</div>
            </div>
            <div class="space-y-1">
                <div class="text-3xl md:text-4xl font-black text-brand-600">15 Min</div>
                <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Gold Loan Approval</div>
            </div>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════
     3. OPEN ACCOUNT CTA — subtle blue strip, not heavy
     ════════════════════════════════════════════════════════ -->
<section class="section section-brand" data-reveal>
    <div class="section-inner flex flex-col md:flex-row items-center justify-between gap-5">
        <div class="text-center md:text-left space-y-1">
            <h2 class="text-xl md:text-2xl font-black text-white tracking-tight">Open Your Co-operative Account Online — It Takes Under 5 Minutes</h2>
            <p class="text-brand-100 text-sm">Earn up to 10.50% p.a. interest, get mobile banking access, and doorstep agent services.</p>
        </div>
        <div class="shrink-0">
            <a href="<?= base_url('account-opening') ?>" class="inline-flex items-center gap-2 bg-white hover:bg-brand-50 text-brand-700 font-black px-6 py-3 rounded-xl shadow transition-all">
                Start Application
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════
     4. DEPOSIT SCHEMES
     ════════════════════════════════════════════════════════ -->
<section class="section section-muted">
    <div class="section-inner">
        <div class="section-head" data-reveal>
            <span class="section-badge">High Return Plans</span>
            <h2 class="section-title">Featured Deposit Schemes</h2>
            <p class="section-sub">Flexible, guaranteed-return deposit plans for short-term and long-term financial growth.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal-group>
            <?php foreach ($deposits as $plan): ?>
                <div class="ui-card overflow-hidden flex flex-col justify-between group">
                    <div>
                        <div class="relative h-44 bg-slate-100">
                            <?php if (!empty($plan['image'])): ?>
                                <img src="<?= base_url($plan['image']) ?>" alt="<?= esc($plan['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <?php else: ?>
                                <div class="w-full h-full bg-brand-50 flex items-center justify-center text-5xl">💰</div>
                            <?php endif; ?>
                            <span class="absolute top-3 right-3 bg-brand-600 text-white font-black text-xs px-2.5 py-1 rounded-lg shadow">
                                <?= esc($plan['interest_rate']) ?>
                            </span>
                        </div>
                        <div class="p-5 space-y-3">
                            <h3 class="font-bold text-base text-slate-900 leading-snug"><?= esc($plan['name']) ?></h3>
                            <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed"><?= esc($plan['short_description']) ?></p>
                            <div class="text-xs space-y-1.5 pt-3 border-t border-slate-100">
                                <div class="flex justify-between text-slate-600">
                                    <span>Min Deposit</span>
                                    <span class="font-bold text-slate-800"><?= esc($plan['min_amount']) ?></span>
                                </div>
                                <div class="flex justify-between text-slate-600">
                                    <span>Tenure</span>
                                    <span class="font-bold text-slate-800"><?= esc($plan['tenure']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <a href="<?= base_url('deposits/' . $plan['slug']) ?>" class="block w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 rounded-xl text-xs transition-colors">
                            View Plan Details &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10" data-reveal>
            <a href="<?= base_url('deposits') ?>" class="btn-outline">
                View All Deposit Plans
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════
     5. LOAN PRODUCTS
     ════════════════════════════════════════════════════════ -->
<section class="section section-light">
    <div class="section-inner">
        <div class="section-head" data-reveal>
            <span class="section-badge">Hassle-Free Credit</span>
            <h2 class="section-title">Loan Products &amp; Assistance</h2>
            <p class="section-sub">Instant financial support with minimal documentation and the most competitive interest rates.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal-group>
            <?php foreach ($loans as $loan): ?>
                <div class="ui-card p-5 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-100 flex items-center justify-center text-xl">🤝</div>
                            <span class="bg-brand-600 text-white text-[11px] font-bold px-2.5 py-0.5 rounded-lg">
                                <?= esc($loan['interest_rate']) ?>
                            </span>
                        </div>
                        <h3 class="font-bold text-base text-slate-900"><?= esc($loan['name']) ?></h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed"><?= esc($loan['short_description']) ?></p>
                        <div class="bg-white p-3 rounded-xl border border-slate-200 text-xs space-y-1.5">
                            <div class="flex justify-between text-slate-600">
                                <span>Max Valuation</span>
                                <span class="font-bold text-slate-800"><?= esc($loan['max_percentage']) ?></span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Repayment</span>
                                <span class="font-bold text-slate-800"><?= esc($loan['tenure']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <a href="<?= base_url('loans/' . $loan['slug']) ?>" class="block w-full text-center border border-brand-600 text-brand-600 hover:bg-brand-600 hover:text-white font-bold py-2.5 rounded-xl text-xs transition-all">
                            Apply / Details &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10" data-reveal>
            <a href="<?= base_url('loans') ?>" class="btn-outline">
                View All Loan Products
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════
     6. DIGITAL BANKING SERVICES — dark blue, clean cards
     ════════════════════════════════════════════════════════ -->
<section class="section section-dark relative overflow-hidden">
    <!-- Subtle background pattern -->
    <div class="absolute inset-0 pointer-events-none" aria-hidden="true">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[700px] bg-brand-800/30 rounded-full blur-3xl"></div>
    </div>

    <div class="relative section-inner">
        <div class="section-head" data-reveal>
            <span class="section-badge">Always On, Always Secure</span>
            <h2 class="section-title">Modern Digital Banking</h2>
            <p class="section-sub">Access your accounts, transfer funds, and grow your savings — anytime, anywhere.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" data-reveal-group>
            <div class="bg-brand-900/70 border border-brand-800 rounded-2xl p-6 hover:border-brand-500 hover:bg-brand-900 transition-all duration-300 flex flex-col gap-4">
                <div class="w-11 h-11 rounded-xl bg-brand-800 border border-brand-700 flex items-center justify-center text-2xl">📱</div>
                <div>
                    <h3 class="font-bold text-white text-sm mb-1">Mobile Banking</h3>
                    <p class="text-xs text-brand-300 leading-relaxed">24/7 fund transfers, e-passbook, mini statements &amp; deposit tracking.</p>
                </div>
                <a href="<?= base_url('page/mobile-internet-banking') ?>" class="mt-auto inline-flex items-center gap-1 text-xs font-semibold text-brand-400 hover:text-brand-200 transition-colors">
                    Learn More <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="bg-brand-900/70 border border-brand-800 rounded-2xl p-6 hover:border-brand-500 hover:bg-brand-900 transition-all duration-300 flex flex-col gap-4">
                <div class="w-11 h-11 rounded-xl bg-brand-800 border border-brand-700 flex items-center justify-center text-2xl">📲</div>
                <div>
                    <h3 class="font-bold text-white text-sm mb-1">QR Code Payments</h3>
                    <p class="text-xs text-brand-300 leading-relaxed">Accept payments from all UPI apps with zero MDR charges.</p>
                </div>
                <a href="<?= base_url('page/qr-code-payments') ?>" class="mt-auto inline-flex items-center gap-1 text-xs font-semibold text-brand-400 hover:text-brand-200 transition-colors">
                    Get QR Standee <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="bg-brand-900/70 border border-brand-800 rounded-2xl p-6 hover:border-brand-500 hover:bg-brand-900 transition-all duration-300 flex flex-col gap-4">
                <div class="w-11 h-11 rounded-xl bg-brand-800 border border-brand-700 flex items-center justify-center text-2xl">🏠</div>
                <div>
                    <h3 class="font-bold text-white text-sm mb-1">Doorstep Banking</h3>
                    <p class="text-xs text-brand-300 leading-relaxed">Agents collect deposits and cash at your doorstep — for farmers &amp; senior members.</p>
                </div>
                <a href="<?= base_url('contact') ?>" class="mt-auto inline-flex items-center gap-1 text-xs font-semibold text-brand-400 hover:text-brand-200 transition-colors">
                    Book a Visit <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="bg-brand-900/70 border border-brand-800 rounded-2xl p-6 hover:border-brand-500 hover:bg-brand-900 transition-all duration-300 flex flex-col gap-4">
                <div class="w-11 h-11 rounded-xl bg-brand-800 border border-brand-700 flex items-center justify-center text-2xl">🏢</div>
                <div>
                    <h3 class="font-bold text-white text-sm mb-1">Branch Network</h3>
                    <p class="text-xs text-brand-300 leading-relaxed">Multiple branches across Maharashtra with trained staff ready to assist.</p>
                </div>
                <a href="<?= base_url('branches') ?>" class="mt-auto inline-flex items-center gap-1 text-xs font-semibold text-brand-400 hover:text-brand-200 transition-colors">
                    Find a Branch <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════
     7. NOTICES & ANNOUNCEMENTS
     ════════════════════════════════════════════════════════ -->
<section class="section section-light">
    <div class="section-inner">
        <div class="section-head" data-reveal>
            <span class="section-badge">Notices</span>
            <h2 class="section-title">Latest Notices &amp; Announcements</h2>
            <p class="section-sub">Circulars, rate revisions, and society announcements for our members.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-reveal-group>
            <?php if (!empty($notices)): ?>
                <?php foreach ($notices as $notice): ?>
                    <div class="ui-card p-6 space-y-3">
                        <div class="text-[11px] font-bold text-brand-600 uppercase tracking-wide">
                            <?= esc($notice['publish_date']) ?>
                        </div>
                        <h3 class="font-bold text-sm text-slate-900 leading-snug line-clamp-2"><?= esc($notice['title']) ?></h3>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed"><?= esc($notice['description']) ?></p>
                        <?php if (!empty($notice['file_path'])): ?>
                            <a href="<?= base_url($notice['file_path']) ?>" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-600 hover:text-brand-800 transition-colors pt-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z"/></svg>
                                Download Attachment
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 py-10 text-center text-slate-400 text-sm">No active notices at this time.</div>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- ════════════════════════════════════════════════════════
     8. TESTIMONIALS
     ════════════════════════════════════════════════════════ -->
<section class="section section-muted">
    <div class="section-inner">
        <div class="section-head" data-reveal>
            <span class="section-badge">Member Reviews</span>
            <h2 class="section-title">What Our Members Say</h2>
            <p class="section-sub">Real experiences from members who bank with us every day.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-reveal-group>
            <?php foreach ($testimonials as $t): ?>
                <div class="ui-card p-6 flex flex-col gap-4">
                    <div class="flex gap-0.5">
                        <?php for ($i = 0; $i < ($t['rating'] ?? 5); $i++): ?>
                            <svg class="w-4 h-4 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <?php endfor; ?>
                    </div>
                    <p class="text-sm text-slate-600 italic leading-relaxed flex-1">&ldquo;<?= esc($t['message']) ?>&rdquo;</p>
                    <div class="flex items-center gap-3 pt-3 border-t border-slate-100">
                        <div class="w-9 h-9 rounded-full bg-brand-600 text-white font-bold flex items-center justify-center text-sm shrink-0">
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


<!-- ════════════════════════════════════════════════════════
     SLIDER JS — CSS translate-based, true sliding
     ════════════════════════════════════════════════════════ -->
<script>
(function () {
    const track  = document.getElementById('sliderTrack');
    const panels = track ? track.querySelectorAll('.slide-panel') : [];
    const total  = panels.length;
    if (!track || total <= 1) return;

    let current = 0;
    let timer   = null;

    function updateDots(idx) {
        for (let i = 0; i < total; i++) {
            const dot = document.getElementById('dot-' + i);
            if (!dot) continue;
            if (i === idx) {
                dot.classList.remove('bg-slate-300', 'w-2');
                dot.classList.add('bg-brand-600', 'w-6');
            } else {
                dot.classList.remove('bg-brand-600', 'w-6');
                dot.classList.add('bg-slate-300', 'w-2');
            }
        }
    }

    function goTo(idx) {
        // Clamp to valid range — no wrapping
        current = Math.max(0, Math.min(idx, total - 1));
        track.style.transform = 'translateX(-' + (current * 100) + '%)';
        updateDots(current);
    }

    let direction = 1; // 1 = forward, -1 = backward

    function startAuto() {
        timer = setInterval(() => {
            // Flip direction at the ends
            if (current === total - 1) direction = -1;
            if (current === 0)         direction =  1;
            goTo(current + direction);
        }, 2000);
    }

    function stopAuto() {
        clearInterval(timer);
    }

    // Expose for dot/arrow buttons
    window.sliderGoTo = (i) => { stopAuto(); direction = (i > current ? 1 : -1); goTo(i); startAuto(); };
    window.sliderNext = ()  => { stopAuto(); direction =  1; goTo(current + 1); startAuto(); };
    window.sliderPrev = ()  => { stopAuto(); direction = -1; goTo(current - 1); startAuto(); };

    // Pause on hover
    const viewport = document.getElementById('sliderViewport');
    if (viewport) {
        viewport.addEventListener('mouseenter', stopAuto);
        viewport.addEventListener('mouseleave', startAuto);
    }

    // Touch / swipe support
    let touchStartX = 0;
    if (viewport) {
        viewport.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
        viewport.addEventListener('touchend',   e => {
            const diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) diff > 0 ? sliderNext() : sliderPrev();
        }, { passive: true });
    }

    // Kick off
    goTo(0);
    startAuto();
})();
</script>

<?= $this->endSection() ?>
