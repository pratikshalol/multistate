<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section max-w-4xl mx-auto">
    <div class="admin-head">
        <h2 class="admin-head-title">Edit Page: <?= esc($page['title']) ?></h2>
        <a href="<?= base_url('admin/pages') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to Pages</a>
    </div>

    <div class="admin-panel admin-panel-pad">
        <form action="<?= base_url('admin/pages/update/' . $page['id']) ?>" method="POST" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Page Title *</label>
                    <input type="text" name="title" required value="<?= old('title', $page['title']) ?>" class="form-input font-bold">
                </div>
                <div>
                    <label class="form-label">URL Slug *</label>
                    <input type="text" name="slug" required value="<?= old('slug', $page['slug']) ?>" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Page HTML Content *</label>
                <textarea name="content" rows="14" class="form-input font-mono text-xs leading-relaxed"><?= old('content', $page['content']) ?></textarea>
                <p class="text-[11px] text-slate-500 mt-1">Supports HTML tags (&lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;, etc.)</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="form-label">SEO Meta Title</label>
                    <input type="text" name="meta_title" value="<?= old('meta_title', $page['meta_title']) ?>" class="form-input">
                </div>
                <div>
                    <label class="form-label">SEO Meta Description</label>
                    <input type="text" name="meta_description" value="<?= old('meta_description', $page['meta_description']) ?>" class="form-input">
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/pages') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="btn-admin px-6 py-2.5 shadow">
                    Save Page Content
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
