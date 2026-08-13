<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-hero">
    <div class="section-inner">
        <h1 class="page-hero-title">Branch Network & Contact Locator</h1>
        <p class="text-brand-100 text-sm max-w-2xl mx-auto">Visit any of our society branches across Maharashtra for personal banking, deposit advice, and loan processing.</p>
    </div>
</div>

<div class="section section-muted">
    <div class="section-inner">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($branches as $branch): ?>
                <div class="ui-card p-6 space-y-4">
                    <div class="flex items-center space-x-3 border-b border-slate-100 pb-3">
                        <div class="w-10 h-10 rounded-xl bg-brand-700 text-brand-300 font-bold flex items-center justify-center text-lg">🏦</div>
                        <div>
                            <h2 class="font-bold text-base text-slate-900"><?= esc($branch['name']) ?></h2>
                            <span class="text-[10px] uppercase font-bold text-brand-600 tracking-wider">Authorized Branch</span>
                        </div>
                    </div>

                    <div class="space-y-2 text-xs text-slate-600">
                        <p class="flex items-start space-x-2">
                            <span class="font-bold text-slate-800 shrink-0">📍 Address:</span>
                            <span><?= esc($branch['address']) ?></span>
                        </p>
                        <p class="flex items-center space-x-2">
                            <span class="font-bold text-slate-800 shrink-0">📞 Phone:</span>
                            <span class="font-semibold text-brand-700"><?= esc($branch['phone']) ?></span>
                        </p>
                        <?php if (!empty($branch['email'])): ?>
                            <p class="flex items-center space-x-2">
                                <span class="font-bold text-slate-800 shrink-0">✉️ Email:</span>
                                <span><?= esc($branch['email']) ?></span>
                            </p>
                        <?php endif; ?>
                        <p class="flex items-start space-x-2 pt-2 border-t border-slate-100">
                            <span class="font-bold text-slate-800 shrink-0">🕒 Hours:</span>
                            <span class="text-slate-500"><?= esc($branch['working_hours']) ?></span>
                        </p>
                    </div>

                    <?php if (!empty($branch['latitude']) && !empty($branch['longitude'])): ?>
                        <div class="pt-2">
                            <a href="https://maps.google.com/?q=<?= esc($branch['latitude']) ?>,<?= esc($branch['longitude']) ?>" target="_blank" class="inline-flex items-center justify-center w-full bg-slate-100 hover:bg-brand-100 text-slate-800 font-bold py-2 rounded-lg text-xs transition-colors space-x-1">
                                <span>🗺️ Open in Google Maps</span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
