<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide"><?= esc($title) ?></h2>
            <p class="text-xs text-slate-500 mt-1">Manage the service cards shown on the public <?= $category === 'account' ? 'Accounts' : 'Banking' ?> page.</p>
        </div>
        <a href="<?= base_url('admin/' . $category . '-services/create') ?>" class="bg-<?= $color ?>-600 hover:bg-<?= $color ?>-700 text-white font-bold px-4 py-2 rounded-lg text-xs transition-all shadow">
            + Add <?= $category === 'account' ? 'Account Service' : 'Banking Service' ?>
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                <tr>
                    <th class="p-4">Icon</th>
                    <th class="p-4">Title</th>
                    <th class="p-4">Description</th>
                    <th class="p-4">Order</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($services)): ?>
                    <tr>
                        <td colspan="6" class="p-6 text-center text-slate-500">
                            No <?= $category === 'account' ? 'account' : 'banking' ?> services yet. Click "+ Add" to create one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($services as $service): ?>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4">
                                <div class="w-10 h-10 rounded-lg flex items-center justify-center text-lg <?= esc($service['icon_color'] ?: 'bg-slate-200', 'attr') ?>">
                                    <?= esc($service['icon'] ?: '⭐') ?>
                                </div>
                            </td>
                            <td class="p-4 font-bold text-slate-900"><?= esc($service['title']) ?></td>
                            <td class="p-4 text-slate-600 max-w-sm truncate"><?= esc($service['description']) ?></td>
                            <td class="p-4 text-slate-600"><?= esc($service['sort_order']) ?></td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $service['is_active'] ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-500' ?>">
                                    <?= $service['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="<?= base_url('admin/services/edit/' . $service['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">Edit</a>
                                <button onclick="confirmDelete('<?= base_url('admin/services/delete/' . $service['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
