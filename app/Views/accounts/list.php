<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<div class="bg-brand-700 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <h1 class="text-3xl md:text-4xl font-extrabold"><?= esc($page['title']) ?></h1>
    </div>
</div>

<!-- Account Cards -->
<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Open New Account -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="h-48 bg-brand-700 flex items-center justify-center text-6xl">📋</div>
                    <div class="p-6 space-y-3">
                        <h2 class="font-bold text-xl text-slate-900">Open New Account</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">Start your financial journey with us. Apply online for a new account in minutes — simple, paperless, and hassle-free.</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Quick online application</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Minimal documentation</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Same-day processing</li>
                        </ul>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url('account-opening') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                        Apply Now &rarr;
                    </a>
                </div>
            </div>

            <!-- Savings Account -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="h-48 bg-emerald-600 flex items-center justify-center text-6xl">🏦</div>
                    <div class="p-6 space-y-3">
                        <h2 class="font-bold text-xl text-slate-900">Savings Account</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">Earn attractive interest on your daily balance while keeping your money safe and accessible at all times.</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Competitive interest on daily balance</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Free passbook & SMS alerts</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Nomination facility</li>
                        </ul>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url('page/savings-account') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                        Learn More &rarr;
                    </a>
                </div>
            </div>

            <!-- Current Account -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                <div>
                    <div class="h-48 bg-sky-600 flex items-center justify-center text-6xl">💼</div>
                    <div class="p-6 space-y-3">
                        <h2 class="font-bold text-xl text-slate-900">Current Account</h2>
                        <p class="text-sm text-slate-600 leading-relaxed">Designed for traders and businesses requiring high-frequency transactions, overdraft, and multi-signatory support.</p>
                        <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Unlimited transactions</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> Overdraft facility available</li>
                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> UPI & QR code payments</li>
                        </ul>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url('page/current-account') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                        Learn More &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
