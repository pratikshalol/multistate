<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section">
    <div class="admin-head">
        <div>
            <h2 class="admin-head-title">Manage Account Applications</h2>
            <p class="text-xs text-slate-500 mt-1">Review online account applications submitted by customers.</p>
        </div>
    </div>

    <div class="admin-panel">
        <table class="w-full text-left text-xs">
            <thead class="admin-table-head">
                <tr>
                    <th class="p-4">Received</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Mobile</th>
                    <th class="p-4">Account Type</th>
                    <th class="p-4">Branch</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (empty($applications)): ?>
                    <tr>
                        <td colspan="8" class="p-6 text-center text-slate-500">No account applications found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($applications as $application): ?>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 text-slate-500"><?= esc($application['created_at']) ?></td>
                            <td class="p-4 font-bold text-slate-900"><?= esc($application['full_name']) ?></td>
                            <td class="p-4 text-slate-600"><?= esc($application['email'] ?: 'N/A') ?></td>
                            <td class="p-4 text-slate-700 font-semibold"><?= esc($application['mobile']) ?></td>
                            <td class="p-4 text-slate-700"><?= esc($application['account_type']) ?></td>
                            <td class="p-4 text-slate-700"><?= esc($application['branch_id'] ?? 'N/A') ?></td>
                            <td class="p-4">
                                <?php
                                    $status = $application['status'] ?? 'new';
                                    $badgeClass = 'bg-slate-100 text-slate-600';
                                    if ($status === 'new') {
                                        $badgeClass = 'bg-brand-100 text-brand-800';
                                    } elseif ($status === 'contacted') {
                                        $badgeClass = 'bg-brand-100 text-brand-800';
                                    } elseif ($status === 'approved') {
                                        $badgeClass = 'bg-brand-100 text-brand-800';
                                    } elseif ($status === 'rejected') {
                                        $badgeClass = 'bg-red-100 text-red-800';
                                    }
                                ?>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $badgeClass ?>"><?= esc(strtoupper($status)) ?></span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="<?= base_url('admin/accounts/view/' . $application['id']) ?>" class="btn-row">View</a>
                                <button onclick="confirmDelete('<?= base_url('admin/accounts/delete/' . $application['id']) ?>')" class="btn-row-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
