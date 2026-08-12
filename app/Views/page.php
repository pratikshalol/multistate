<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header — clean, light, no solid blue -->
<div class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
            <a href="<?= base_url() ?>" class="hover:text-brand-600 transition-colors">Home</a>
            <span>/</span>
            <span class="text-slate-600 font-semibold"><?= esc($page['title']) ?></span>
        </div>
        <h1 class="text-3xl md:text-4xl font-black text-slate-900"><?= esc($page['title']) ?></h1>
    </div>
</div>

<div class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 md:p-10 rounded-2xl border border-slate-200 shadow-sm">
            <div class="prose max-w-none text-sm md:text-base leading-relaxed text-slate-700
                        [&_h2]:text-2xl [&_h2]:font-black [&_h2]:text-slate-900 [&_h2]:mb-4 [&_h2]:mt-6
                        [&_h3]:text-lg [&_h3]:font-bold [&_h3]:text-slate-800 [&_h3]:mb-3 [&_h3]:mt-5
                        [&_p]:mb-4 [&_p]:text-slate-600
                        [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul]:space-y-1
                        [&_li]:text-slate-600
                        [&_strong]:text-slate-800 [&_strong]:font-bold">
                <?= $page['content'] ?>
            </div>
            <div class="pt-6 mt-6 border-t border-slate-100 text-xs text-slate-400 flex justify-between items-center">
                <span>Last updated: <?= esc(date('d M Y', strtotime($page['updated_at'] ?? 'now'))) ?></span>
                <a href="<?= base_url() ?>" class="text-brand-600 font-bold hover:underline">&larr; Return Home</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
