<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section">
    <div class="admin-head">
        <div>
            <h2 class="admin-head-title">Enquiry Details</h2>
            <p class="text-xs text-slate-500 mt-1">Details for enquiry #<?= esc($enquiry['id']) ?></p>
        </div>
        <a href="<?= base_url('admin/enquiries') ?>" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Back to List</a>
    </div>

    <div class="admin-panel">
        <div class="p-6 space-y-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Received</p>
                    <p class="mt-2 font-semibold text-slate-900"><?= esc($enquiry['created_at']) ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Status</p>
                    <span class="mt-2 inline-flex rounded-full px-3 py-1 text-[11px] font-bold <?= $enquiry['status'] === 'new' ? 'bg-brand-100 text-brand-800' : 'bg-slate-100 text-slate-600' ?>">
                        <?= esc(strtoupper($enquiry['status'])) ?>
                    </span>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Name</p>
                    <p class="mt-2 font-semibold text-slate-900"><?= esc($enquiry['name']) ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Phone</p>
                    <p class="mt-2 font-semibold text-brand-700"><?= esc($enquiry['phone']) ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Email</p>
                    <p class="mt-2 font-semibold text-slate-700"><?= esc($enquiry['email'] ?: 'N/A') ?></p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-4">
                    <p class="text-[11px] uppercase tracking-widest text-slate-400">Product Requested</p>
                    <p class="mt-2 font-semibold text-slate-700"><?= esc($enquiry['related_product'] ?: 'General Inquiry') ?></p>
                </div>
            </div>

            <div class="rounded-2xl bg-slate-50 p-6">
                <p class="text-[11px] uppercase tracking-widest text-slate-400">Message</p>
                <div class="mt-4 whitespace-pre-wrap text-slate-700 text-sm leading-6">
                    <?= esc($enquiry['message']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
