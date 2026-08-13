<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-hero">
    <div class="section-inner">
        <h1 class="page-hero-title">High Return Deposit Schemes</h1>
            <p class="text-slate-500 text-sm max-w-xl mx-auto">Secure your capital and earn attractive interest rates with Samarth Multistate guaranteed deposit plans.</p>
    </div>
</div>

<div class="section section-muted">
    <div class="section-inner">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($deposits as $plan): ?>
                <div class="ui-card overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 bg-slate-100">
                            <?php if (!empty($plan['image'])): ?>
                                <img src="<?= base_url($plan['image']) ?>" alt="<?= esc($plan['name']) ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-brand-600 flex items-center justify-center text-4xl">💰</div>
                            <?php endif; ?>
                            <span class="absolute top-3 right-3 bg-brand-600 text-white font-black text-xs px-2.5 py-1 rounded-md shadow">
                                <?= esc($plan['interest_rate']) ?>
                            </span>
                        </div>
                        <div class="p-5 space-y-3">
                            <h2 class="font-bold text-lg text-slate-900 leading-snug"><?= esc($plan['name']) ?></h2>
                            <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed"><?= esc($plan['short_description']) ?></p>
                            <div class="text-xs space-y-1.5 pt-3 border-t border-slate-100 text-slate-700">
                                <div class="flex justify-between">
                                    <span class="text-slate-500">Min Deposit:</span>
                                    <span class="font-bold"><?= esc($plan['min_amount']) ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-500">Tenure:</span>
                                    <span class="font-bold"><?= esc($plan['tenure']) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="<?= base_url('deposits/' . $plan['slug']) ?>" class="block w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-bold py-2.5 rounded-xl text-xs transition-colors">
                            Explore Plan &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
