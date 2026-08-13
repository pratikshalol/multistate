<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section">
    <div class="admin-head">
        <h2 class="admin-head-title">Static Pages Content Management</h2>
    </div>

    <div class="admin-panel">
        <table class="w-full text-left text-xs">
            <thead class="admin-table-head">
                <tr>
                    <th class="p-4">Page Title</th>
                    <th class="p-4">URL Slug</th>
                    <th class="p-4">Last Updated</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($pages as $p): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-slate-900"><?= esc($p['title']) ?></td>
                        <td class="p-4 text-slate-500"><code class="bg-slate-100 px-2 py-0.5 rounded">/page/<?= esc($p['slug']) ?></code></td>
                        <td class="p-4 text-slate-500"><?= esc($p['updated_at'] ?? 'N/A') ?></td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('page/' . $p['slug']) ?>" target="_blank" class="text-brand-700 font-bold hover:underline">View Page</a>
                            <a href="<?= base_url('admin/pages/edit/' . $p['id']) ?>" class="btn-row">Edit Content</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
