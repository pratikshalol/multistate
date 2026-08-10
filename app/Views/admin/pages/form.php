<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Edit Page: <?= esc($page['title']) ?></h2>
        <a href="<?= base_url('admin/pages') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to Pages</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="<?= base_url('admin/pages/update/' . $page['id']) ?>" method="POST" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Page Title *</label>
                    <input type="text" name="title" required value="<?= old('title', $page['title']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-slate-900 focus:outline-none font-bold">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">URL Slug *</label>
                    <input type="text" name="slug" required value="<?= old('slug', $page['slug']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Page HTML Content *</label>
                <textarea name="content" rows="14" class="w-full font-mono text-xs p-4 rounded-lg border border-slate-300 focus:ring-2 focus:ring-slate-900 focus:outline-none leading-relaxed"><?= old('content', $page['content']) ?></textarea>
                <p class="text-[11px] text-slate-500 mt-1">Supports HTML tags (&lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;, etc.)</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">SEO Meta Title</label>
                    <input type="text" name="meta_title" value="<?= old('meta_title', $page['meta_title']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">SEO Meta Description</label>
                    <input type="text" name="meta_description" value="<?= old('meta_description', $page['meta_description']) ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-slate-900 focus:outline-none">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/pages') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white font-bold px-6 py-2.5 rounded-lg shadow">
                    Save Page Content
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
