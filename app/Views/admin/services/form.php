<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">
            <?= $service ? 'Edit' : 'Add' ?> <?= $category === 'account' ? 'Account Service' : 'Banking Service' ?>
        </h2>
        <a href="<?= base_url('admin/' . $category . '-services') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="<?= $service ? base_url('admin/services/update/' . $service['id']) : base_url('admin/' . $category . '-services/store') ?>" method="POST" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Title *</label>
                <input type="text" name="title" required value="<?= old('title', $service['title'] ?? '') ?>" placeholder="e.g. Savings Account" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Icon (emoji)</label>
                    <input type="text" name="icon" value="<?= old('icon', $service['icon'] ?? '') ?>" placeholder="e.g. 🏦" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Icon Background Color</label>
                    <select name="icon_color" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none">
                        <?php
                            $colorOptions = ['bg-brand-700', 'bg-emerald-600', 'bg-sky-600', 'bg-purple-600', 'bg-amber-600', 'bg-rose-600'];
                            $current = old('icon_color', $service['icon_color'] ?? 'bg-brand-700');
                        ?>
                        <?php foreach ($colorOptions as $opt): ?>
                            <option value="<?= esc($opt, 'attr') ?>" <?= $current === $opt ? 'selected' : '' ?>><?= esc($opt) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Display Order</label>
                    <input type="number" name="sort_order" value="<?= old('sort_order', $service['sort_order'] ?? 0) ?>" placeholder="0" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="Short description shown on the card..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none"><?= old('description', $service['description'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Feature Bullet Points</label>
                <textarea name="features" rows="4" placeholder="One feature per line, e.g.&#10;Competitive interest on daily balance&#10;Free passbook & SMS alerts" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none"><?= old('features', $service['features'] ?? '') ?></textarea>
                <p class="text-[10px] text-slate-400 mt-1">Enter one bullet point per line.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Button Link URL</label>
                    <input type="text" name="link_url" value="<?= old('link_url', $service['link_url'] ?? '') ?>" placeholder="/account-opening" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Button Text</label>
                    <input type="text" name="link_text" value="<?= old('link_text', $service['link_text'] ?? '') ?>" placeholder="e.g. Learn More" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-<?= $color ?>-600 focus:outline-none">
                </div>
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $service['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-<?= $color ?>-600 focus:ring-<?= $color ?>-600">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public site)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/' . $category . '-services') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="bg-<?= $color ?>-600 hover:bg-<?= $color ?>-700 text-white font-bold px-6 py-2.5 rounded-lg shadow">
                    Save <?= $category === 'account' ? 'Account Service' : 'Banking Service' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
