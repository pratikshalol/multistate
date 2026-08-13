<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="page-hero" data-reveal>
    <div class="section-inner">
        <span class="section-badge">Hassle-Free Credit</span>
        <h1 class="page-hero-title">Loan Products &amp; Credit Services</h1>
        <p>Fast approval, minimum paperwork, and transparent interest rates for all your credit needs.</p>
    </div>
</div>

<!-- Loans Grid -->
<div class="section section-muted">
    <div class="section-inner">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal-group>
            <?php foreach ($loans as $loan): ?>
                <div class="ui-card p-5 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-100 flex items-center justify-center text-xl">🤝</div>
                            <span class="bg-brand-600 text-white text-[11px] font-bold px-2.5 py-0.5 rounded-lg">
                                <?= esc($loan['interest_rate']) ?>
                            </span>
                        </div>
                        <h2 class="font-bold text-base text-slate-900 leading-snug"><?= esc($loan['name']) ?></h2>
                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed"><?= esc($loan['short_description']) ?></p>
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 text-xs space-y-1.5">
                            <div class="flex justify-between text-slate-600">
                                <span>Max Valuation</span>
                                <span class="font-bold text-slate-800"><?= esc($loan['max_percentage']) ?></span>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Tenure</span>
                                <span class="font-bold text-slate-800"><?= esc($loan['tenure']) ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <a href="<?= base_url('loans/' . $loan['slug']) ?>" class="block w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 rounded-xl text-xs transition-colors">
                            View Loan Details &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
