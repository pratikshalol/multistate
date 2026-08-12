<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<div class="bg-brand-700 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <h1 class="text-3xl md:text-4xl font-extrabold"><?= esc($page['title']) ?></h1>
    </div>
</div>

<!-- Banking Cards -->
<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Mobile & Net Banking -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="h-48 bg-violet-600 flex items-center justify-center text-6xl">📱</div>
                    <div class="p-6 space-y-3">
                        <h2 class="font-bold text-xl text-slate-900">Mobile & Net Banking</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">Access your account, transfer funds, check balances, and pay bills from your smartphone or desktop — 24/7.</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Real-time fund transfers</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Account statements & alerts</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Secure OTP-based login</li>
                        </ul>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url('page/mobile-internet-banking') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                        Learn More &rarr;
                    </a>
                </div>
            </div>

            <!-- QR Code Payments -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="h-48 bg-amber-500 flex items-center justify-center text-6xl">📲</div>
                    <div class="p-6 space-y-3">
                        <h2 class="font-bold text-xl text-slate-900">QR Code Payments</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">Accept or make instant payments using UPI-linked QR codes — fast, contactless, and compatible with all major payment apps.</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Instant UPI settlements</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Works with PhonePe, GPay & more</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Zero transaction charges</li>
                        </ul>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url('page/qr-code-payments') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                        Learn More &rarr;
                    </a>
                </div>
            </div>

            <!-- Branch Locator -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="h-48 bg-rose-600 flex items-center justify-center text-6xl">📍</div>
                    <div class="p-6 space-y-3">
                        <h2 class="font-bold text-xl text-slate-900">Branch Locator</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">Find your nearest Samarth Multistate branch, get address, working hours, phone numbers, and directions on the map.</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> All branches listed</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Map & directions</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Working hours & contact info</li>
                        </ul>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url('branches') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                        Find a Branch &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
