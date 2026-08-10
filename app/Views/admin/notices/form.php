<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide"><?= $notice ? 'Edit Notice' : 'Publish Notice' ?></h2>
        <a href="<?= base_url('admin/notices') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="<?= $notice ? base_url('admin/notices/update/' . $notice['id']) : base_url('admin/notices/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Notice Title *</label>
                <input type="text" name="title" required value="<?= old('title', $notice['title'] ?? '') ?>" placeholder="e.g. Annual General Body Meeting Notice 2026" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-brand-700 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Publish Date</label>
                <input type="date" name="publish_date" value="<?= old('publish_date', $notice['publish_date'] ?? date('Y-m-d')) ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-brand-700 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Description / Full Announcement</label>
                <textarea name="description" rows="5" placeholder="Full notice details..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-brand-700 focus:outline-none"><?= old('description', $notice['description'] ?? '') ?></textarea>
            </div>

            <!-- PDF / Attachment Upload -->
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Document Attachment (PDF, JPG, PNG)</label>
                <?php if (!empty($notice['file_path'])): ?>
                    <div class="mb-2 text-xs text-slate-600 bg-slate-50 p-2 rounded border border-slate-200">
                        Current File: <a href="<?= base_url($notice['file_path']) ?>" target="_blank" class="font-bold text-brand-700 underline">View Attached File</a>
                    </div>
                <?php endif; ?>
                <input type="file" name="file" accept=".pdf,.png,.jpg,.jpeg" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $notice['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-brand-700 focus:ring-brand-700">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public homepage & notices feed)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/notices') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="bg-brand-700 hover:bg-brand-800 text-white font-bold px-6 py-2.5 rounded-lg shadow">
                    Save Notice
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
