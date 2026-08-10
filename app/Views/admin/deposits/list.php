<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Deposit Schemes List</h2>
        <a href="<?= base_url('admin/deposits/create') ?>" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2 rounded-lg text-xs transition-all shadow">
            + Add New Deposit Plan
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                <tr>
                    <th class="p-4">Image</th>
                    <th class="p-4">Plan Name</th>
                    <th class="p-4">Interest Rate</th>
                    <th class="p-4">Min Amount</th>
                    <th class="p-4">Tenure</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($deposits as $plan): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4">
                            <?php if (!empty($plan['image'])): ?>
                                <img src="<?= base_url($plan['image']) ?>" alt="Plan" class="w-12 h-12 object-cover rounded-lg border border-slate-200">
                            <?php else: ?>
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-xl">💰</div>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 font-bold text-slate-900"><?= esc($plan['name']) ?></td>
                        <td class="p-4 font-bold text-amber-600"><?= esc($plan['interest_rate']) ?></td>
                        <td class="p-4 text-slate-600"><?= esc($plan['min_amount']) ?></td>
                        <td class="p-4 text-slate-600"><?= esc($plan['tenure']) ?></td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $plan['is_active'] ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $plan['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/deposits/edit/' . $plan['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/deposits/delete/' . $plan['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
