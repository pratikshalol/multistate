<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Samarth Multistate Co-operative Credit Society Ltd.') ?></title>
    <meta name="description" content="<?= esc($settings['meta_description'] ?? 'Samarth Multistate Co-operative Credit Society offers high return deposits, instant gold loans, mobile banking, and doorstep banking services.') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50:  '#f3faf5',
                            100: '#dcf0e2',
                            200: '#b9e2c6',
                            300: '#88cda2',
                            400: '#52b077',
                            500: '#2e9455',
                            600: '#22773f',
                            700: '#1a5e32',
                            800: '#154b28',
                            900: '#0f3a1e',
                            gold: '#d97706',
                            goldhover: '#b45309',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .banner-slide { display: none; transition: opacity 0.5s ease-in-out; }
        .banner-slide.active { display: flex; }

        /* Dropdown menu */
        .nav-dropdown { position: relative; }
        .nav-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            min-width: 200px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            z-index: 100;
            margin-top: 8px;
            padding: 6px 0;
        }
        .nav-dropdown:hover .nav-dropdown-menu { display: block; }
        .nav-dropdown-menu a {
            display: block;
            padding: 9px 18px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }
        .nav-dropdown-menu a:hover { background: #f3faf5; color: #1a5e32; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen font-sans antialiased">

    <!-- Top Announcement Bar -->
    <?php if (!empty($settings['announcement_ticker'])): ?>
    <div class="bg-brand-900 text-slate-200 text-xs py-2 px-4 border-b border-brand-800">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2 overflow-hidden">
                <span class="bg-amber-500 text-slate-900 font-bold px-2 py-0.5 rounded text-[10px] uppercase tracking-wider shrink-0">Announcement</span>
                <p class="truncate text-slate-300"><?= esc($settings['announcement_ticker']) ?></p>
            </div>
            <div class="hidden md:flex items-center space-x-6 text-xs text-slate-300 shrink-0">
                <span>📞 <?= esc($settings['helpline'] ?? '+91 020 2553 9000') ?></span>
                <span>✉️ <?= esc($settings['contact_email'] ?? 'info@Samarthmultistate.com') ?></span>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Navigation Header -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Logo -->
                <a href="<?= base_url() ?>" class="flex items-center space-x-3 shrink-0">
                    <?php if (!empty($settings['logo']) && file_exists(FCPATH . $settings['logo'])): ?>
                        <img src="<?= base_url($settings['logo']) ?>" alt="Logo" class="h-12 w-auto">
                    <?php else: ?>
                        <div class="w-10 h-10 bg-brand-700 rounded-full flex items-center justify-center text-amber-400 font-extrabold text-xl shadow">S</div>
                        <div>
                            <span class="font-black text-lg tracking-tight text-brand-700 block leading-tight">Samarth MULTISTATE</span>
                            <span class="text-[10px] font-semibold text-amber-600 tracking-wider uppercase block">Co-operative Credit Society Ltd.</span>
                        </div>
                    <?php endif; ?>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-1 text-sm font-semibold text-slate-700">
                    <a href="<?= base_url() ?>" class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors">Home</a>

                    <a href="<?= base_url('page/about') ?>" class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors">About Us</a>

                    <!-- Accounts Dropdown -->
                    <div class="nav-dropdown">
                        <button class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors flex items-center space-x-1">
                            <span>Accounts</span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="nav-dropdown-menu">
                            <a href="<?= base_url('account-opening') ?>">✨ Open New Account</a>
                            <a href="<?= base_url('page/savings-account') ?>">Savings Account</a>
                            <a href="<?= base_url('page/current-account') ?>">Current Account</a>
                        </div>
                    </div>

                    <!-- Deposits Dropdown -->
                    <div class="nav-dropdown">
                        <button class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors flex items-center space-x-1">
                            <span>Deposits</span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="nav-dropdown-menu">
                            <a href="<?= base_url('deposits') ?>">All Deposit Plans</a>
                            <a href="<?= base_url('deposits/fixed-deposit') ?>">Fixed Deposit</a>
                            <a href="<?= base_url('deposits/pigmy-daily-deposit') ?>">Pigmy Daily Deposit</a>
                        </div>
                    </div>

                    <!-- Banking Dropdown -->
                    <div class="nav-dropdown">
                        <button class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors flex items-center space-x-1">
                            <span>Banking</span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="nav-dropdown-menu">
                            <a href="<?= base_url('page/mobile-internet-banking') ?>">📱 Mobile & Net Banking</a>
                            <a href="<?= base_url('page/qr-code-payments') ?>">📲 QR Code Payments</a>
                            <a href="<?= base_url('branches') ?>">🏢 Branch Locator</a>
                        </div>
                    </div>

                    <a href="<?= base_url('loans') ?>" class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors">Loans</a>

                    <a href="<?= base_url('page/career') ?>" class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors">Career</a>

                    <a href="<?= base_url('contact') ?>" class="px-3 py-2 rounded-lg hover:bg-brand-50 hover:text-brand-700 transition-colors">Contact Us</a>
                </nav>

                <!-- CTA Actions -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="<?= base_url('account-opening') ?>" class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-4 py-2 rounded-lg text-sm transition-all shadow hover:shadow-md flex items-center space-x-1">
                        <span>✨ Open Account</span>
                    </a>
                    <a href="<?= base_url('admin/login') ?>" class="border border-slate-300 text-slate-600 hover:text-brand-700 hover:border-brand-600 px-3 py-2 rounded-lg text-xs font-semibold transition-colors">
                        Admin
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden text-slate-700 hover:text-brand-700 focus:outline-none p-2">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-slate-100 px-4 pt-3 pb-6 space-y-1 font-semibold text-sm">
            <a href="<?= base_url() ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700 border-b border-slate-100">Home</a>
            <a href="<?= base_url('page/about') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700 border-b border-slate-100">About Us</a>

            <!-- Mobile Accordion: Accounts -->
            <div class="border-b border-slate-100">
                <button onclick="toggleMobileAccordion('mob-accounts')" class="w-full flex items-center justify-between py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">
                    <span>Accounts</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="mob-accounts" class="hidden pl-4 pb-2 space-y-1">
                    <a href="<?= base_url('account-opening') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">✨ Open New Account</a>
                    <a href="<?= base_url('page/savings-account') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">Savings Account</a>
                    <a href="<?= base_url('page/current-account') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">Current Account</a>
                </div>
            </div>

            <!-- Mobile Accordion: Deposits -->
            <div class="border-b border-slate-100">
                <button onclick="toggleMobileAccordion('mob-deposits')" class="w-full flex items-center justify-between py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">
                    <span>Deposits</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="mob-deposits" class="hidden pl-4 pb-2 space-y-1">
                    <a href="<?= base_url('deposits') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">All Deposit Plans</a>
                    <a href="<?= base_url('deposits/fixed-deposit') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">Fixed Deposit</a>
                    <a href="<?= base_url('deposits/pigmy-daily-deposit') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">Pigmy Daily Deposit</a>
                </div>
            </div>

            <!-- Mobile Accordion: Banking -->
            <div class="border-b border-slate-100">
                <button onclick="toggleMobileAccordion('mob-banking')" class="w-full flex items-center justify-between py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700">
                    <span>Banking</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div id="mob-banking" class="hidden pl-4 pb-2 space-y-1">
                    <a href="<?= base_url('page/mobile-internet-banking') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">📱 Mobile & Net Banking</a>
                    <a href="<?= base_url('page/qr-code-payments') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">📲 QR Code Payments</a>
                    <a href="<?= base_url('branches') ?>" class="block py-2 px-3 text-xs rounded-lg text-slate-600 hover:bg-brand-50 hover:text-brand-700">🏢 Branch Locator</a>
                </div>
            </div>

            <a href="<?= base_url('loans') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700 border-b border-slate-100">Loans</a>
            <a href="<?= base_url('page/career') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700 border-b border-slate-100">Career</a>
            <a href="<?= base_url('contact') ?>" class="flex items-center py-2.5 px-3 rounded-lg text-slate-700 hover:bg-brand-50 hover:text-brand-700 border-b border-slate-100">Contact Us</a>

            <div class="pt-3 flex flex-col space-y-2">
                <a href="<?= base_url('account-opening') ?>" class="w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 rounded-lg">Open Account Online</a>
                <a href="<?= base_url('admin/login') ?>" class="w-full text-center border border-slate-300 text-slate-700 py-2 rounded-lg text-xs">Admin Login</a>
            </div>
        </div>
    </header>

    <!-- Content Body -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-brand-900 text-slate-200 border-t border-brand-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Col 1: About & Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 pb-2 border-b border-brand-700">
                        <div class="w-8 h-8 rounded-full bg-brand-600 flex items-center justify-center text-amber-400 font-extrabold text-base shadow">S</div>
                        <h3 class="text-base font-bold text-white tracking-wide">Samarth Multistate</h3>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Registered under Multi-State Co-operative Societies Act. Committed to delivering secure deposit plans, fast credit assistance, and seamless digital banking services.
                    </p>
                    <div class="text-xs text-amber-400 font-semibold space-y-1.5">
                        <p>📍 <?= esc($settings['address'] ?? 'Pune, Maharashtra') ?></p>
                        <p>📞 <?= esc($settings['contact_phone'] ?? '+91 020 2553 9000') ?></p>
                        <p>✉️ <?= esc($settings['contact_email'] ?? 'info@Samarthmultistate.com') ?></p>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-base font-bold text-white tracking-wide border-b border-brand-700 pb-2 mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="<?= base_url('account-opening') ?>" class="hover:text-amber-400 transition-colors">✨ Open Account Online</a></li>
                        <li><a href="<?= base_url('page/about') ?>" class="hover:text-amber-400 transition-colors">About Our Society</a></li>
                        <li><a href="<?= base_url('branches') ?>" class="hover:text-amber-400 transition-colors">Branch Locator</a></li>
                        <li><a href="<?= base_url('page/mobile-internet-banking') ?>" class="hover:text-amber-400 transition-colors">Mobile & Net Banking</a></li>
                        <li><a href="<?= base_url('page/qr-code-payments') ?>" class="hover:text-amber-400 transition-colors">QR Code Payments</a></li>
                        <li><a href="<?= base_url('page/career') ?>" class="hover:text-amber-400 transition-colors">Career Opportunities</a></li>
                    </ul>
                </div>

                <!-- Col 3: Deposit & Loan Products -->
                <div>
                    <h3 class="text-base font-bold text-white tracking-wide border-b border-brand-700 pb-2 mb-4">Popular Products</h3>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="<?= base_url('deposits/fixed-deposit') ?>" class="hover:text-amber-400 transition-colors">Fixed Deposit (10.50% p.a.)</a></li>
                        <li><a href="<?= base_url('deposits/pigmy-daily-deposit') ?>" class="hover:text-amber-400 transition-colors">Pigmy Daily Collection</a></li>
                        <li><a href="<?= base_url('loans/gold-loan') ?>" class="hover:text-amber-400 transition-colors">Instant Gold Loan</a></li>
                        <li><a href="<?= base_url('loans/property-loan') ?>" class="hover:text-amber-400 transition-colors">Housing & Property Loan</a></li>
                        <li><a href="<?= base_url('contact') ?>" class="hover:text-amber-400 transition-colors">Submit Enquiry</a></li>
                    </ul>
                </div>

                <!-- Col 4: Hours & Legal -->
                <div>
                    <h3 class="text-base font-bold text-white tracking-wide border-b border-brand-700 pb-2 mb-4">Working Hours</h3>
                    <p class="text-xs text-slate-300 mb-4">
                        <?= esc($settings['working_hours'] ?? 'Mon–Sat: 10:00 AM – 5:30 PM') ?>
                    </p>
                    <div class="space-y-2 text-xs text-slate-400 border-t border-brand-700 pt-3">
                        <a href="<?= base_url('page/privacy-policy') ?>" class="block hover:text-slate-200 transition-colors">Privacy Policy</a>
                        <a href="<?= base_url('page/terms-conditions') ?>" class="block hover:text-slate-200 transition-colors">Terms & Conditions</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Disclaimer -->
            <div class="border-t border-brand-700 mt-10 pt-6 text-center text-xs text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-2">
                <p>&copy; <?= date('Y') ?> <?= esc($settings['site_name'] ?? 'Samarth Multistate Co-operative Credit Society Ltd.') ?>. All rights reserved.</p>
                <p class="text-[11px] text-slate-500">Powered by CodeIgniter 4</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Navigation Toggle
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        if (btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        }

        // Mobile Accordion Toggles
        function toggleMobileAccordion(id) {
            const el = document.getElementById(id);
            if (el) el.classList.toggle('hidden');
        }
    </script>
</body>
</html>
