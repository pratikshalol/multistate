<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="bg-brand-700 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <h1 class="text-3xl md:text-4xl font-extrabold">Loan Products & Credit Services</h1>
        <p class="text-slate-300 text-sm max-w-2xl mx-auto">Fast approval, minimum paperwork, and transparent interest rates for all your credit needs.</p>
    </div>
</div>

<div class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($loans as $loan): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex flex-col justify-between hover:border-amber-400 transition-colors">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center font-bold text-xl">🤝</span>
                            <span class="bg-emerald-600 text-white text-[11px] font-bold px-2 py-0.5 rounded">
                                <?= esc($loan['interest_rate']) ?>
                            </span>
                        </div>
                        <h2 class="font-bold text-lg text-slate-900 leading-snug"><?= esc($loan['name']) ?></h2>
                        <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed"><?= esc($loan['short_description']) ?></p>
                        
                        <div class="bg-slate-50 p-3 rounded-lg border border-slate-100 text-xs space-y-1.5">
                            <div class="flex justify-between">
                                <span class="text-slate-500">Max Valuation:</span>
                                <span class="font-bold text-slate-800"><?= esc($loan['max_percentage']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Tenure:</span>
                                <span class="font-bold text-slate-800"><?= esc($loan['tenure']) ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="<?= base_url('loans/' . $loan['slug']) ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                            View Loan Details &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
