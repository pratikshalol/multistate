<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section">
    <div class="admin-head">
        <h2 class="admin-head-title">Notices & Announcements</h2>
        <a href="<?= base_url('admin/notices/create') ?>" class="btn-admin shadow">
            + Publish New Notice
        </a>
    </div>

    <div class="admin-panel">
        <table class="w-full text-left text-xs">
            <thead class="admin-table-head">
                <tr>
                    <th class="p-4">Publish Date</th>
                    <th class="p-4">Notice Title</th>
                    <th class="p-4">Attachment</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($notices as $notice): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-brand-600"><?= esc($notice['publish_date']) ?></td>
                        <td class="p-4 font-bold text-slate-900"><?= esc($notice['title']) ?></td>
                        <td class="p-4">
                            <?php if (!empty($notice['file_path'])): ?>
                                <a href="<?= base_url($notice['file_path']) ?>" target="_blank" class="text-brand-700 font-bold hover:underline">📄 View Attachment</a>
                            <?php else: ?>
                                <span class="text-slate-400">None</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $notice['is_active'] ? 'bg-brand-100 text-brand-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $notice['is_active'] ? 'PUBLISHED' : 'DRAFT' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/notices/edit/' . $notice['id']) ?>" class="btn-row">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/notices/delete/' . $notice['id']) ?>')" class="btn-row-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
