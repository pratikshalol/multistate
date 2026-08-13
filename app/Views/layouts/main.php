<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Shree Bhagwant Multistate Co-operative Credit Society Ltd.') ?></title>
    <meta name="description" content="<?= esc($settings['meta_description'] ?? 'Shree Bhagwant Multistate Co-operative Credit Society offers high return deposits, instant gold loans, mobile banking, and doorstep banking services.') ?>">
    <?= $this->include('partials/theme') ?>

    <style>
        /* ─── Banner Slider ─────────────────────────────────── */
        /* (slider now uses CSS translateX via #sliderTrack) */

        /* ─── Dropdown ──────────────────────────────────────── */
        .nav-dropdown { position: relative; }

        /* invisible padding bridge fills the gap so hover doesn't break */
        .nav-dropdown-menu {
            display: none;
            position: absolute;
            top: calc(100% + 4px);
            left: 50%;
            transform: translateX(-50%);
            min-width: 210px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            box-shadow: 0 12px 40px rgba(0,0,0,0.10);
            z-index: 200;
            padding: 6px 0;
        }
        /* Invisible bridge between button and menu so mouse transit doesn't close it */
        .nav-dropdown-menu::before {
            content: '';
            position: absolute;
            top: -12px;
            left: 0;
            right: 0;
            height: 12px;
        }
        .nav-dropdown:hover .nav-dropdown-menu,
        .nav-dropdown-menu:hover { display: block; }

        .nav-dropdown-menu a {
            display: block;
            padding: 9px 18px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }
        .nav-dropdown-menu a:hover {
            background: var(--brand-50);
            color: var(--brand-700);
        }

        /* ─── Scroll Reveal ─────────────────────────────────── */
        [data-reveal] {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s cubic-bezier(0.4,0,0.2,1),
                        transform 0.6s cubic-bezier(0.4,0,0.2,1);
        }
        [data-reveal="fade"] {
            transform: none;
        }
        [data-reveal="slide-left"] {
            transform: translateX(-28px);
        }
        [data-reveal="slide-right"] {
            transform: translateX(28px);
        }
        [data-reveal].revealed {
            opacity: 1 !important;
            transform: none !important;
        }
        /* Staggered children */
        [data-reveal-group] > * {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.5s cubic-bezier(0.4,0,0.2,1),
                        transform 0.5s cubic-bezier(0.4,0,0.2,1);
        }
        [data-reveal-group].revealed > *:nth-child(1) { transition-delay: 0.05s; }
        [data-reveal-group].revealed > *:nth-child(2) { transition-delay: 0.13s; }
        [data-reveal-group].revealed > *:nth-child(3) { transition-delay: 0.21s; }
        [data-reveal-group].revealed > *:nth-child(4) { transition-delay: 0.29s; }
        [data-reveal-group].revealed > *:nth-child(5) { transition-delay: 0.37s; }
        [data-reveal-group].revealed > *:nth-child(6) { transition-delay: 0.45s; }
        [data-reveal-group].revealed > * {
            opacity: 1;
            transform: none;
        }

        /* ─── Misc ──────────────────────────────────────────── */
        html { font-feature-settings: "cv02","cv03","cv04","cv11"; }
    </style>
</head>
<body class="bg-white text-slate-800 flex flex-col min-h-screen font-sans antialiased">

    <!-- ── Top Info Bar ───────────────────────────────────── -->
    <div class="bg-brand-900 text-slate-300 text-xs py-2 px-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2 overflow-hidden">
                <?php if (!empty($settings['announcement_ticker'])): ?>
                    <span class="bg-brand-600 text-white font-bold px-2 py-0.5 rounded text-[10px] uppercase tracking-wider shrink-0">Notice</span>
                    <p class="truncate"><?= esc($settings['announcement_ticker']) ?></p>
                <?php else: ?>
                    <span>🏦 Shree Bhagwant Multistate Co-operative Credit Society Ltd. — Trusted banking since inception.</span>
                <?php endif; ?>
            </div>
            <div class="hidden md:flex items-center divide-x divide-slate-700 text-[11px] shrink-0">
                <span class="pr-4">📞 <?= esc($settings['helpline'] ?? '+91 020 2553 9000') ?></span>
                <span class="pl-4">✉️ <?= esc($settings['contact_email'] ?? 'info@shreebhagwantmultistate.com') ?></span>
            </div>
        </div>
    </div>

    <!-- ── Main Navigation ───────────────────────────────── -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-[70px]">

                <!-- Logo -->
                <a href="<?= base_url() ?>" class="flex items-center space-x-3 shrink-0">
                    <?php if (!empty($settings['logo']) && file_exists(FCPATH . $settings['logo'])): ?>
                        <img src="<?= base_url($settings['logo']) ?>" alt="Logo" class="h-11 w-auto">
                    <?php else: ?>
                        <div class="w-9 h-9 bg-brand-700 rounded-lg flex items-center justify-center text-white font-black text-lg shadow">S</div>
                        <div class="leading-tight">
                            <span class="font-black text-base tracking-tight text-brand-900 block">SHREE BHAGWANT MULTISTATE</span>
                            <span class="text-[10px] font-semibold text-brand-500 tracking-wider uppercase block">Co-operative Credit Society Ltd.</span>
                        </div>
                    <?php endif; ?>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center text-[13px] font-semibold text-slate-600">
                    <a href="<?= base_url() ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Home</a>
                    <a href="<?= base_url('page/about') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">About Us</a>

                    <!-- Accounts -->
                    <a href="<?= base_url('accounts') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Accounts</a>

                    <!-- Deposits -->
                    <a href="<?= base_url('deposits') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Deposits</a>

                    <!-- Banking -->
                    <a href="<?= base_url('banking') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Banking</a>

                    <a href="<?= base_url('loans') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Loans</a>
                    <a href="<?= base_url('page/career') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Career</a>
                    <a href="<?= base_url('contact') ?>" class="px-3 py-2 rounded-lg hover:text-brand-700 hover:bg-brand-50 transition-colors">Contact Us</a>
                </nav>

                <!-- CTA -->
                <div class="hidden sm:flex items-center gap-2">
                    <a href="<?= base_url('account-opening') ?>" class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-4 py-2 rounded-lg text-[13px] transition-colors shadow-sm">
                        Open Account
                    </a>
                </div>

                <!-- Mobile Hamburger -->
                <button id="mobileMenuBtn" class="lg:hidden text-slate-600 hover:text-brand-700 focus:outline-none p-2 -mr-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-slate-100 px-4 pt-2 pb-5 space-y-0.5 text-sm font-semibold">
            <a href="<?= base_url() ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Home</a>
            <a href="<?= base_url('page/about') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">About Us</a>

            <!-- Mobile: Accounts -->
            <a href="<?= base_url('accounts') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Accounts</a>

            <!-- Mobile: Deposits -->
            <a href="<?= base_url('deposits') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Deposits</a>

            <!-- Mobile: Banking -->
            <a href="<?= base_url('banking') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Banking</a>

            <a href="<?= base_url('loans') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Loans</a>
            <a href="<?= base_url('page/career') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Career</a>
            <a href="<?= base_url('contact') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">Contact Us</a>

            <div class="pt-3 flex flex-col gap-2 border-t border-slate-100 mt-2">
                <a href="<?= base_url('account-opening') ?>" class="w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 rounded-lg transition-colors">Open Account Online</a>
            </div>
        </div>
    </header>

    <!-- ── Page Content ──────────────────────────────────── -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- ── Footer ────────────────────────────────────────── -->
    <footer class="bg-brand-950 text-slate-300 border-t border-brand-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

                <!-- Col 1 -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2 pb-3 border-b border-brand-800">
                        <div class="w-8 h-8 rounded-lg bg-brand-700 flex items-center justify-center text-white font-black text-sm">S</div>
                        <span class="font-bold text-white text-sm tracking-wide">Shree Bhagwant Multistate</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Registered under Multi-State Co-operative Societies Act. Delivering secure deposit plans, fast credit assistance, and modern digital banking services.
                    </p>
                    <div class="space-y-1.5 text-xs text-brand-300 font-medium">
                        <p>📍 <?= esc($settings['address'] ?? 'Pune, Maharashtra') ?></p>
                        <p>📞 <?= esc($settings['contact_phone'] ?? '+91 020 2553 9000') ?></p>
                        <p>✉️ <?= esc($settings['contact_email'] ?? 'info@shreebhagwantmultistate.com') ?></p>
                    </div>
                </div>

                <!-- Col 2 -->
                <div>
                    <h3 class="text-sm font-bold text-white border-b border-brand-800 pb-3 mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="<?= base_url('account-opening') ?>" class="hover:text-brand-300 transition-colors">Open Account Online</a></li>
                        <li><a href="<?= base_url('page/about') ?>" class="hover:text-brand-300 transition-colors">About Our Society</a></li>
                        <li><a href="<?= base_url('branches') ?>" class="hover:text-brand-300 transition-colors">Branch Locator</a></li>
                        <li><a href="<?= base_url('page/mobile-internet-banking') ?>" class="hover:text-brand-300 transition-colors">Mobile &amp; Net Banking</a></li>
                        <li><a href="<?= base_url('page/qr-code-payments') ?>" class="hover:text-brand-300 transition-colors">QR Code Payments</a></li>
                        <li><a href="<?= base_url('page/career') ?>" class="hover:text-brand-300 transition-colors">Career Opportunities</a></li>
                    </ul>
                </div>

                <!-- Col 3 -->
                <div>
                    <h3 class="text-sm font-bold text-white border-b border-brand-800 pb-3 mb-4">Popular Products</h3>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="<?= base_url('deposits/fixed-deposit') ?>" class="hover:text-brand-300 transition-colors">Fixed Deposit (10.50% p.a.)</a></li>
                        <li><a href="<?= base_url('deposits/pigmy-daily-deposit') ?>" class="hover:text-brand-300 transition-colors">Pigmy Daily Collection</a></li>
                        <li><a href="<?= base_url('loans/gold-loan') ?>" class="hover:text-brand-300 transition-colors">Instant Gold Loan</a></li>
                        <li><a href="<?= base_url('loans/property-loan') ?>" class="hover:text-brand-300 transition-colors">Housing &amp; Property Loan</a></li>
                        <li><a href="<?= base_url('contact') ?>" class="hover:text-brand-300 transition-colors">Submit Enquiry</a></li>
                    </ul>
                </div>

                <!-- Col 4 -->
                <div>
                    <h3 class="text-sm font-bold text-white border-b border-brand-800 pb-3 mb-4">Working Hours</h3>
                    <p class="text-xs text-slate-400 mb-4 leading-relaxed">
                        <?= esc($settings['working_hours'] ?? 'Mon–Sat: 10:00 AM – 5:30 PM') ?>
                    </p>
                    <div class="space-y-2 text-xs text-slate-500 border-t border-brand-800 pt-3">
                        <a href="<?= base_url('page/privacy-policy') ?>" class="block hover:text-slate-300 transition-colors">Privacy Policy</a>
                        <a href="<?= base_url('page/terms-conditions') ?>" class="block hover:text-slate-300 transition-colors">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-brand-900 mt-10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-slate-500">
                <p>&copy; <?= date('Y') ?> <?= esc($settings['site_name'] ?? 'Shree Bhagwant Multistate Co-operative Credit Society Ltd.') ?>. All rights reserved.</p>
                <p class="text-[11px]">Powered by CodeIgniter 4</p>
            </div>
        </div>
    </footer>

    <!-- ── Global JS ──────────────────────────────────────── -->
    <script>
    // ── Mobile nav toggle
    document.getElementById('mobileMenuBtn')?.addEventListener('click', () => {
        document.getElementById('mobileMenu')?.classList.toggle('hidden');
    });

    // ── Mobile accordion with chevron rotation
    function toggleMob(id, btn) {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.toggle('hidden');
        const chevron = btn.querySelector('.chevron');
        if (chevron) chevron.classList.toggle('rotate-180');
    }

    // ── Scroll Reveal (IntersectionObserver)
    (function () {
        const targets = document.querySelectorAll('[data-reveal], [data-reveal-group]');
        if (!targets.length) return;

        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        targets.forEach(el => io.observe(el));
    })();
    </script>
</body>
</html>
