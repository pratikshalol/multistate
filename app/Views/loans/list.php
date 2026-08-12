<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="bg-white border-b border-slate-200 py-12" data-reveal>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block text-xs font-bold text-brand-600 uppercase tracking-widest bg-brand-50 border border-brand-200 px-3 py-1 rounded-full">Hassle-Free Credit</span>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900">Loan Products &amp; Credit Services</h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">Fast approval, minimum paperwork, and transparent interest rates for all your credit needs.</p>
    </div>
</div>

<!-- Loans Grid -->
<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-reveal-group>
            <?php foreach ($loans as $loan): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex flex-col justify-between hover:border-brand-300 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
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
