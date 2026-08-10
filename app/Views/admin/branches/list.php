<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Society Branch List</h2>
        <a href="<?= base_url('admin/branches/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded-lg text-xs transition-all shadow">
            + Add New Branch
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
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
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $branch['is_active'] ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $branch['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/branches/edit/' . $branch['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/branches/delete/' . $branch['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
