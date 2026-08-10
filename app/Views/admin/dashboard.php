<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-6">

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-500 uppercase">Account Applications</div>
                <div class="text-2xl font-black text-slate-900 mt-1"><?= $account_count ?></div>
                <div class="text-[11px] text-amber-600 font-semibold mt-0.5"><?= $new_accounts ?> Pending New</div>
            </div>
            <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center text-xl font-bold">📋</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-500 uppercase">Enquiries</div>
                <div class="text-2xl font-black text-slate-900 mt-1"><?= $enquiry_count ?></div>
                <div class="text-[11px] text-emerald-600 font-semibold mt-0.5"><?= $new_enquiries ?> Unread</div>
            </div>
            <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-xl font-bold">📬</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-500 uppercase">Deposit Plans</div>
                <div class="text-2xl font-black text-slate-900 mt-1"><?= $deposit_count ?></div>
                <div class="text-[11px] text-slate-400 mt-0.5">Active Schemes</div>
            </div>
            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl font-bold">💰</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs font-bold text-slate-500 uppercase">Loan Products</div>
                <div class="text-2xl font-black text-slate-900 mt-1"><?= $loan_count ?></div>
                <div class="text-[11px] text-slate-400 mt-0.5">Active Products</div>
            </div>
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-xl font-bold">🤝</div>
        </div>
    </div>

    <!-- Tables Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Recent Account Applications -->
        <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                <h2 class="font-bold text-sm text-slate-900 flex items-center space-x-2">
                    <span>📋</span>
                    <span>Recent Online Account Applications</span>
                </h2>
                <a href="<?= base_url('admin/accounts') ?>" class="text-xs font-bold text-amber-600 hover:underline">View All &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                        <tr>
                            <th class="p-3">Applicant</th>
                            <th class="p-3">Account Type</th>
                            <th class="p-3">Mobile</th>
                            <th class="p-3">Status</th>
                            <th class="p-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (!empty($recent_applications)): ?>
                            <?php foreach ($recent_applications as $app): ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 font-bold text-slate-900"><?= esc($app['full_name']) ?></td>
                                    <td class="p-3 text-slate-600"><?= esc($app['account_type']) ?></td>
                                    <td class="p-3 text-slate-600"><?= esc($app['mobile']) ?></td>
                                    <td class="p-3">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase 
                                            <?= $app['status'] === 'new' ? 'bg-amber-100 text-amber-800' : '' ?>
                                            <?= $app['status'] === 'approved' ? 'bg-emerald-100 text-emerald-800' : '' ?>
                                            <?= $app['status'] === 'contacted' ? 'bg-blue-100 text-blue-800' : '' ?>
                                            <?= $app['status'] === 'rejected' ? 'bg-red-100 text-red-800' : '' ?>">
                                            <?= esc($app['status']) ?>
                                        </span>
                                    </td>
                                    <td class="p-3 text-right">
                                        <a href="<?= base_url('admin/accounts/view/' . $app['id']) ?>" class="text-slate-700 hover:text-amber-600 font-bold">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="p-4 text-center text-slate-400">No applications received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Contact Enquiries -->
        <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                <h2 class="font-bold text-sm text-slate-900 flex items-center space-x-2">
                    <span>📬</span>
                    <span>Recent Contact Enquiries</span>
                </h2>
                <a href="<?= base_url('admin/enquiries') ?>" class="text-xs font-bold text-emerald-600 hover:underline">View All &rarr;</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                        <tr>
                            <th class="p-3">Name</th>
                            <th class="p-3">Phone</th>
                            <th class="p-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php if (!empty($recent_enquiries)): ?>
                            <?php foreach ($recent_enquiries as $enq): ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 font-bold text-slate-900"><?= esc($enq['name']) ?></td>
                                    <td class="p-3 text-slate-600"><?= esc($enq['phone']) ?></td>
                                    <td class="p-3 text-right">
                                        <a href="<?= base_url('admin/enquiries/view/' . $enq['id']) ?>" class="text-slate-700 hover:text-emerald-600 font-bold">Details</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="p-4 text-center text-slate-400">No enquiries received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>
