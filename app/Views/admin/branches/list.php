<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section">
    <div class="admin-head">
        <h2 class="admin-head-title">Society Branch List</h2>
        <a href="<?= base_url('admin/branches/create') ?>" class="btn-admin shadow">
            + Add New Branch
        </a>
    </div>

    <div class="admin-panel">
        <table class="w-full text-left text-xs">
            <thead class="admin-table-head">
                <tr>
                    <th class="p-4">Branch Name</th>
                    <th class="p-4">Address</th>
                    <th class="p-4">Phone</th>
                    <th class="p-4">Working Hours</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($branches as $branch): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-slate-900"><?= esc($branch['name']) ?></td>
                        <td class="p-4 text-slate-600 max-w-xs truncate"><?= esc($branch['address']) ?></td>
                        <td class="p-4 font-bold text-brand-700"><?= esc($branch['phone']) ?></td>
                        <td class="p-4 text-slate-600"><?= esc($branch['working_hours']) ?></td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $branch['is_active'] ? 'bg-brand-100 text-brand-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $branch['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/branches/edit/' . $branch['id']) ?>" class="btn-row">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/branches/delete/' . $branch['id']) ?>')" class="btn-row-danger">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
