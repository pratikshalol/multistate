<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="bg-brand-700 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2">
        <div class="text-xs text-amber-400 font-semibold uppercase tracking-widest"><a href="<?= base_url('deposits') ?>" class="hover:underline">&larr; Back to Deposit Schemes</a></div>
        <h1 class="text-3xl md:text-4xl font-extrabold"><?= esc($deposit['name']) ?></h1>
    </div>
</div>

<div class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Details Column -->
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
                <?php if (!empty($deposit['image'])): ?>
                    <img src="<?= base_url($deposit['image']) ?>" alt="<?= esc($deposit['name']) ?>" class="w-full h-64 md:h-80 object-cover rounded-xl shadow">
                <?php endif; ?>

                <div class="flex flex-wrap items-center gap-4 bg-amber-50 p-4 rounded-xl border border-amber-200 text-slate-900">
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Interest Rate</div>
                        <div class="text-2xl font-black text-amber-600"><?= esc($deposit['interest_rate']) ?></div>
                    </div>
                    <div class="h-8 w-px bg-amber-200 hidden sm:block"></div>
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Min Amount</div>
                        <div class="text-lg font-bold"><?= esc($deposit['min_amount']) ?></div>
                    </div>
                    <div class="h-8 w-px bg-amber-200 hidden sm:block"></div>
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Tenure</div>
                        <div class="text-lg font-bold"><?= esc($deposit['tenure']) ?></div>
                    </div>
                </div>

                <div class="prose max-w-none text-slate-700 text-sm leading-relaxed space-y-4">
                    <h3 class="text-xl font-bold text-slate-900">Scheme Overview</h3>
                    <p><?= nl2br(esc($deposit['description'])) ?></p>
                </div>

                <div class="pt-4 border-t border-slate-200">
                    <a href="<?= base_url('account-opening') ?>" class="inline-flex items-center space-x-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 rounded-xl shadow transition-all">
                        <span>✨ Open Account with this Plan</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-2">Other Deposit Plans</h3>
                <div class="space-y-3">
                    <?php foreach ($other_plans as $other): ?>
                        <a href="<?= base_url('deposits/' . $other['slug']) ?>" class="block p-3 rounded-lg bg-slate-50 hover:bg-amber-50 border border-slate-100 transition-colors">
                            <div class="font-bold text-xs text-slate-900"><?= esc($other['name']) ?></div>
                            <div class="text-[11px] text-amber-600 font-semibold"><?= esc($other['interest_rate']) ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
