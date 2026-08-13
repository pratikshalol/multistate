<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-hero">
    <div class="section-inner space-y-2">
        <div class="text-xs text-brand-100 font-semibold uppercase tracking-widest"><a href="<?= base_url('loans') ?>" class="hover:underline">&larr; Back to Loan Products</a></div>
        <h1 class="page-hero-title"><?= esc($loan['name']) ?></h1>
    </div>
</div>

<div class="section section-muted">
    <div class="section-inner grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Main Details -->
        <div class="lg:col-span-8 space-y-6">
            <div class="ui-panel p-6 md:p-8 space-y-6">
                <?php if (!empty($loan['image'])): ?>
                    <img src="<?= base_url($loan['image']) ?>" alt="<?= esc($loan['name']) ?>" class="w-full h-64 md:h-80 object-cover rounded-xl shadow">
                <?php endif; ?>

                <div class="flex flex-wrap items-center gap-4 bg-brand-50 p-4 rounded-xl border border-brand-200 text-slate-900">
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Interest Rate</div>
                        <div class="text-2xl font-black text-brand-700"><?= esc($loan['interest_rate']) ?></div>
                    </div>
                    <div class="h-8 w-px bg-brand-200 hidden sm:block"></div>
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Max Loan Value</div>
                        <div class="text-lg font-bold"><?= esc($loan['max_percentage']) ?></div>
                    </div>
                    <div class="h-8 w-px bg-brand-200 hidden sm:block"></div>
                    <div>
                        <div class="text-xs text-slate-500 font-semibold uppercase">Tenure</div>
                        <div class="text-lg font-bold"><?= esc($loan['tenure']) ?></div>
                    </div>
                </div>

                <div class="prose max-w-none text-slate-700 text-sm leading-relaxed space-y-4">
                    <h3 class="text-xl font-bold text-slate-900">Loan Overview</h3>
                    <p><?= nl2br(esc($loan['description'])) ?></p>

                    <?php if (!empty($loan['eligibility'])): ?>
                        <h4 class="text-lg font-bold text-slate-900 pt-2">Eligibility Criteria</h4>
                        <p><?= nl2br(esc($loan['eligibility'])) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($loan['documents_required'])): ?>
                        <h4 class="text-lg font-bold text-slate-900 pt-2">Documents Required</h4>
                        <p><?= nl2br(esc($loan['documents_required'])) ?></p>
                    <?php endif; ?>
                </div>

                <div class="pt-4 border-t border-slate-200 flex flex-wrap gap-3">
                    <a href="<?= base_url('contact?product=' . urlencode($loan['name'])) ?>" class="bg-brand-600 hover:bg-brand-600 text-white font-bold px-6 py-3 rounded-xl shadow transition-all">
                        Apply for Loan Now
                    </a>
                    <a href="<?= base_url('branches') ?>" class="border border-slate-300 hover:border-brand-700 text-slate-700 font-semibold px-5 py-3 rounded-xl transition-colors">
                        Locate Nearest Branch
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-4 space-y-6">
            <div class="ui-panel p-5 space-y-4">
                <h3 class="font-bold text-base text-slate-900 border-b border-slate-100 pb-2">Other Loan Products</h3>
                <div class="space-y-3">
                    <?php foreach ($other_loans as $other): ?>
                        <a href="<?= base_url('loans/' . $other['slug']) ?>" class="block p-3 rounded-lg bg-slate-50 hover:bg-brand-50 border border-slate-100 transition-colors">
                            <div class="font-bold text-xs text-slate-900"><?= esc($other['name']) ?></div>
                            <div class="text-[11px] text-brand-700 font-semibold"><?= esc($other['interest_rate']) ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
