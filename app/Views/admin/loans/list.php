<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Loan Products List</h2>
        <a href="<?= base_url('admin/loans/create') ?>" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-4 py-2 rounded-lg text-xs transition-all shadow">
            + Add New Loan Product
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                <tr>
                    <th class="p-4">Image</th>
                    <th class="p-4">Loan Name</th>
                    <th class="p-4">Interest Rate</th>
                    <th class="p-4">Max Valuation</th>
                    <th class="p-4">Tenure</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($loans as $loan): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4">
                            <?php if (!empty($loan['image'])): ?>
                                <img src="<?= base_url($loan['image']) ?>" alt="Loan" class="w-12 h-12 object-cover rounded-lg border border-slate-200">
                            <?php else: ?>
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-xl">🤝</div>
                            <?php endif; ?>
                        </td>
                        <td class="p-4 font-bold text-slate-900"><?= esc($loan['name']) ?></td>
                        <td class="p-4 font-bold text-emerald-700"><?= esc($loan['interest_rate']) ?></td>
                        <td class="p-4 text-slate-600"><?= esc($loan['max_percentage']) ?></td>
                        <td class="p-4 text-slate-600"><?= esc($loan['tenure']) ?></td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $loan['is_active'] ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $loan['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/loans/edit/' . $loan['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/loans/delete/' . $loan['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
