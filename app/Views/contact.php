<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="page-hero">
    <div class="section-inner">
        <h1 class="page-hero-title">Contact Us & Enquiries</h1>
        <p class="text-brand-100 text-sm max-w-xl mx-auto">Have questions regarding deposit plans, loan applications, or mobile banking? Send us a message.</p>
    </div>
</div>

<div class="section section-muted">
    <div class="section-inner grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form Column -->
        <div class="lg:col-span-7">
            <div class="ui-panel p-6 md:p-8 space-y-6">
                <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3">Send Your Message / Enquiry</h2>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-brand-50 border border-brand-200 text-brand-800 text-xs p-4 rounded-xl font-bold">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="bg-red-50 border border-red-200 text-red-700 text-xs p-4 rounded-xl space-y-1">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <p>• <?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('contact') ?>" method="POST" class="space-y-4">
                    <?= csrf_field() ?>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Your Full Name *</label>
                        <input type="text" name="name" required value="<?= old('name') ?>" placeholder="e.g. Ramesh Kumar" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-brand-700 focus:outline-none">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Mobile Phone Number *</label>
                            <input type="tel" name="phone" required value="<?= old('phone') ?>" placeholder="10 digit mobile number" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-brand-700 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Email Address</label>
                            <input type="email" name="email" value="<?= old('email') ?>" placeholder="name@example.com" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-brand-700 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Related Product / Service</label>
                        <input type="text" name="related_product" value="<?= old('related_product', $_GET['product'] ?? '') ?>" placeholder="e.g. Gold Loan, Fixed Deposit 10.5%" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-brand-700 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Your Message *</label>
                        <textarea name="message" required rows="4" placeholder="Write your question or request details..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-brand-700 focus:outline-none"><?= old('message') ?></textarea>
                    </div>

                    <button type="submit" class="w-full bg-brand-700 hover:bg-brand-800 text-white font-bold py-3 rounded-xl text-sm transition-all shadow">
                        Submit Enquiry
                    </button>
                </form>
            </div>
        </div>

        <!-- Info Column -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-brand-700 text-white p-6 rounded-2xl space-y-4 shadow-sm">
                <h3 class="text-lg font-bold border-b border-brand-600 pb-2">Head Office Contact</h3>
                <div class="space-y-3 text-xs text-slate-200 leading-relaxed">
                    <p class="flex items-start space-x-2">
                        <span>📍</span>
                        <span><?= esc($settings['address'] ?? 'Pune, Maharashtra') ?></span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <span>📞</span>
                        <span class="font-bold text-brand-300"><?= esc($settings['contact_phone'] ?? '+91 020 2553 9000') ?></span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <span>✉️</span>
                        <span><?= esc($settings['contact_email'] ?? 'info@shreebhagwantmultistate.com') ?></span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <span>☎️</span>
                        <span>Toll Free Helpline: <?= esc($settings['helpline'] ?? '1800 233 4455') ?></span>
                    </p>
                </div>
            </div>

            <div class="ui-panel p-6 space-y-3">
                <h3 class="font-bold text-sm text-slate-900">Branch Office Locations</h3>
                <div class="space-y-2 text-xs text-slate-600">
                    <?php foreach ($branches as $b): ?>
                        <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                            <div class="font-bold text-slate-900"><?= esc($b['name']) ?></div>
                            <div class="text-[11px] text-slate-500"><?= esc($b['phone']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('branches') ?>" class="block text-center text-xs font-bold text-brand-700 hover:underline pt-2">View Full Branch Directory &rarr;</a>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
