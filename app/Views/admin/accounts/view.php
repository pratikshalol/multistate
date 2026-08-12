<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Account Application Details</h2>
            <p class="text-xs text-slate-500 mt-1">Application #<?= esc($application['id']) ?></p>
        </div>
        <div class="flex items-center gap-2">
            <a href="<?= base_url('admin/accounts') ?>" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Back to List</a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 space-y-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Submitted</p>
                    <p class="mt-2 font-semibold text-slate-900"><?= esc($application['created_at']) ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Status</p>
                    <span class="mt-2 inline-flex rounded-full px-3 py-1 text-[11px] font-bold <?= $application['status'] === 'new' ? 'bg-amber-100 text-amber-800' : ($application['status'] === 'contacted' ? 'bg-blue-100 text-blue-800' : ($application['status'] === 'approved' ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800')) ?>">
                        <?= esc(strtoupper($application['status'] ?? 'NEW')) ?></span>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Full Name</p>
                    <p class="mt-2 font-semibold text-slate-900"><?= esc($application['full_name']) ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Mobile</p>
                    <p class="mt-2 font-semibold text-emerald-700"><?= esc($application['mobile']) ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Email</p>
                    <p class="mt-2 font-semibold text-slate-700"><?= esc($application['email'] ?: 'N/A') ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Date of Birth</p>
                    <p class="mt-2 font-semibold text-slate-700"><?= esc($application['dob'] ?: 'N/A') ?></p>
                </div>
            </div>

            <div class="rounded-2xl bg-slate-50 p-6 grid gap-4 md:grid-cols-2">
                <div class="space-y-3">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Account Type</p>
                    <p class="font-semibold text-slate-900"><?= esc($application['account_type']) ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Branch</p>
                    <p class="font-semibold text-slate-900"><?= esc($branch['name'] ?? 'Unassigned') ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">ID Proof Type</p>
                    <p class="font-semibold text-slate-900"><?= esc($application['id_proof_type']) ?></p>
                </div>
                <div class="space-y-3">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">ID Proof Number</p>
                    <p class="font-semibold text-slate-900"><?= esc($application['id_proof_number']) ?></p>
                </div>
            </div>

            <?php if (!empty($application['address'])): ?>
                <div class="rounded-2xl bg-slate-50 p-6">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Address</p>
                    <div class="mt-4 text-slate-700 text-sm leading-6 whitespace-pre-wrap"><?= esc($application['address']) ?></div>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/accounts/update-status/' . $application['id']) ?>" method="post" class="grid gap-4 md:grid-cols-2">
                <div class="rounded-2xl bg-slate-50 p-6">
                    <label class="block text-[11px] uppercase tracking-widest text-slate-400">Update Status</label>
                    <select name="status" class="mt-3 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 focus:border-amber-400 focus:ring-amber-200">
                        <?php foreach (['new' => 'New', 'contacted' => 'Contacted', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $value => $label): ?>
                            <option value="<?= esc($value) ?>" <?= $application['status'] === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex items-end justify-end">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-amber-500 px-5 py-3 text-sm font-bold text-white hover:bg-amber-600 transition">
                        Save Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
