<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Preview: <?= esc($page['title']) ?></h2>
        <a href="<?= base_url('admin/pages') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to Pages</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h3 class="text-lg font-bold text-slate-900 mb-4"><?= esc($page['title']) ?></h3>

        <div class="text-sm text-slate-700 leading-relaxed prose">
            <?php
                // Render a clean plain-text preview by stripping HTML and
                // preserving basic paragraphs for readability.
                $text = trim(strip_tags($page['content']));
                $paragraphs = preg_split('/\r?\n\s*\r?\n/', $text);
                foreach ($paragraphs as $p):
                    if (trim($p) === '') continue;
            ?>
                <p><?= esc($p) ?></p>
            <?php endforeach; ?>
        </div>

        <div class="pt-6 mt-6 border-t border-slate-100 text-xs text-slate-400 flex justify-between items-center">
            <span>Last updated: <?= esc(date('d M Y', strtotime($page['updated_at'] ?? 'now'))) ?></span>
            <a href="<?= base_url('admin/pages/edit/' . $page['id']) ?>" class="text-slate-700 font-bold hover:underline">Open Full Editor</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
