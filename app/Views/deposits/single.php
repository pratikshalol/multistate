<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-hero">
    <div class="section-inner space-y-2">
        <div class="text-xs text-brand-100 font-semibold uppercase tracking-widest"><a href="<?= base_url('deposits') ?>" class="hover:underline">&larr; Back to Deposit Schemes</a></div>
        <h1 class="page-hero-title"><?= esc($deposit['name']) ?></h1>
    </div>
</div>

<div class="section section-muted">
    <div class="section-inner grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Details Column -->
        <div class="lg:col-span-8 space-y-6">
            <div class="ui-panel p-6 md:p-8 space-y-6">
                <?php if (!empty($deposit['image'])): ?>
                    <img src="<?= base_url($deposit['image']) ?>" alt="<?= esc($deposit['name']) ?>" class="w-full h-64 md:h-80 object-cover rounded-xl shadow">
                <?php endif; ?>

                <div class="flex flex-wrap items-center gap-4 bg-brand-50 p-4 rounded-xl border border-brand-200 text-slate-900">
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Interest Rate</div>
                        <div class="text-2xl font-black text-brand-600"><?= esc($deposit['interest_rate']) ?></div>
                    </div>
                    <div class="h-8 w-px bg-brand-200 hidden sm:block"></div>
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Min Amount</div>
                        <div class="text-lg font-bold"><?= esc($deposit['min_amount']) ?></div>
                    </div>
                    <div class="h-8 w-px bg-brand-200 hidden sm:block"></div>
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
                    <a href="<?= base_url('account-opening') ?>" class="inline-flex items-center space-x-2 bg-brand-600 hover:bg-brand-600 text-white font-bold px-6 py-3 rounded-xl shadow transition-all">
                        <span>✨ Open Account with this Plan</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-4 space-y-6">
            <div class="ui-panel p-5 space-y-4">
                <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-2">Other Deposit Plans</h3>
                <div class="space-y-3">
                    <?php foreach ($other_plans as $other): ?>
                        <a href="<?= base_url('deposits/' . $other['slug']) ?>" class="block p-3 rounded-lg bg-slate-50 hover:bg-brand-50 border border-slate-100 transition-colors">
                            <div class="font-bold text-xs text-slate-900"><?= esc($other['name']) ?></div>
                            <div class="text-[11px] text-brand-600 font-semibold"><?= esc($other['interest_rate']) ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
