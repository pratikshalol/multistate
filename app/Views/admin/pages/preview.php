<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Preview: <?= esc($page['title']) ?></h2>
        <a href="<?= base_url('admin/pages') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to Pages</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h3 class="text-lg font-bold text-slate-900 mb-4"><?= esc($page['title']) ?></h3>

        <style>
            /* The site loads the plain Tailwind CDN build, which does NOT
               include the typography plugin that the "prose" class needs.
               So we style the admin-authored HTML content explicitly here
               instead of relying on a plugin that isn't actually loaded. */
            .page-content-preview h2 {
                font-size: 1.125rem;
                font-weight: 700;
                color: #0f172a; /* slate-900 */
                margin-top: 1.25rem;
                margin-bottom: 0.5rem;
            }
            .page-content-preview h2:first-child { margin-top: 0; }
            .page-content-preview h3 {
                font-size: 1rem;
                font-weight: 700;
                color: #0f172a;
                margin-top: 1rem;
                margin-bottom: 0.5rem;
            }
            .page-content-preview p {
                margin-bottom: 0.75rem;
            }
            .page-content-preview ul,
            .page-content-preview ol {
                margin: 0.5rem 0 1rem 1.25rem;
                padding-left: 1rem;
            }
            .page-content-preview ul { list-style: disc; }
            .page-content-preview ol { list-style: decimal; }
            .page-content-preview li {
                margin-bottom: 0.4rem;
            }
            .page-content-preview a {
                color: #1d4ed8; /* blue-700 */
                font-weight: 600;
                text-decoration: underline;
            }
            .page-content-preview strong { font-weight: 700; color: #0f172a; }
        </style>

        <div class="page-content-preview text-sm text-slate-700 leading-relaxed">
            <?= $page['content'] ?>
        </div>

        <div class="pt-6 mt-6 border-t border-slate-100 text-xs text-slate-400 flex justify-between items-center">
            <span>Last updated: <?= esc(date('d M Y', strtotime($page['updated_at'] ?? 'now'))) ?></span>
            <a href="<?= base_url('admin/pages/edit/' . $page['id']) ?>" class="text-slate-700 font-bold hover:underline">Open Full Editor</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>