<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="bg-brand-700 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
        <h1 class="text-3xl md:text-4xl font-extrabold"><?= esc($page['title']) ?></h1>
    </div>
</div>

<div class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 md:p-10 rounded-2xl border border-slate-200 shadow-sm space-y-6">
            <div class="prose prose-slate max-w-none text-sm md:text-base leading-relaxed text-slate-700 space-y-4">
                <?= $page['content'] ?>
            </div>
            
            <div class="pt-6 border-t border-slate-200 text-xs text-slate-400 flex justify-between items-center">
                <span>Last updated: <?= esc($page['updated_at'] ?? date('Y-m-d')) ?></span>
                <a href="<?= base_url() ?>" class="text-brand-700 font-bold hover:underline">&larr; Return Home</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
