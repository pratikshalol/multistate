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
        <?php if (empty($services)): ?>
            <p class="text-center text-slate-500">No account services available right now. Please check back soon.</p>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($services as $service): ?>
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                        <div>
                            <div class="h-48 <?= esc($service['icon_color'] ?: 'bg-brand-700', 'attr') ?> flex items-center justify-center text-6xl">
                                <?= esc($service['icon'] ?: '🏦') ?>
                            </div>
                            <div class="p-6 space-y-3">
                                <h2 class="font-bold text-xl text-slate-900"><?= esc($service['title']) ?></h2>
                                <?php if (!empty($service['description'])): ?>
                                    <p class="text-sm text-slate-600 leading-relaxed"><?= esc($service['description']) ?></p>
                                <?php endif; ?>
                                <?php
                                    $features = array_filter(array_map('trim', explode("\n", $service['features'] ?? '')));
                                ?>
                                <?php if (!empty($features)): ?>
                                    <ul class="text-xs text-slate-500 space-y-1.5 pt-2">
                                        <?php foreach ($features as $feature): ?>
                                            <li class="flex items-center gap-2"><span class="text-brand-600 font-bold">✓</span> <?= esc($feature) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($service['link_url'])): ?>
                            <div class="p-6 pt-0">
                                <a href="<?= esc((str_starts_with($service['link_url'], 'http') ? $service['link_url'] : base_url(ltrim($service['link_url'], '/'))), 'attr') ?>" class="block w-full text-center bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-lg text-xs transition-colors">
                                    <?= esc($service['link_text'] ?: 'Learn More') ?> &rarr;
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
