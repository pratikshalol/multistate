<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section">
    <div class="admin-head">
        <h2 class="admin-head-title">Member Testimonials List</h2>
        <a href="<?= base_url('admin/testimonials/create') ?>" class="btn-admin shadow">
            + Add Testimonial
        </a>
    </div>

    <div class="admin-panel">
        <table class="w-full text-left text-xs">
            <thead class="admin-table-head">
                <tr>
                    <th class="p-4">Member Name</th>
                    <th class="p-4">Message</th>
                    <th class="p-4">Rating</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($testimonials as $item): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-slate-900"><?= esc($item['name']) ?></td>
                        <td class="p-4 text-slate-600 max-w-sm truncate"><?= esc($item['message']) ?></td>
                        <td class="p-4 font-bold text-brand-600"><?= str_repeat('★', $item['rating']) ?></td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $item['is_active'] ? 'bg-brand-100 text-brand-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $item['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/testimonials/edit/' . $item['id']) ?>" class="btn-row">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/testimonials/delete/' . $item['id']) ?>')" class="btn-row-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
