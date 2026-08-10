<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide"><?= $deposit ? 'Edit Deposit Plan' : 'Create Deposit Plan' ?></h2>
        <a href="<?= base_url('admin/deposits') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="<?= $deposit ? base_url('admin/deposits/update/' . $deposit['id']) : base_url('admin/deposits/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Plan Name *</label>
                <input type="text" name="name" required value="<?= old('name', $deposit['name'] ?? '') ?>" placeholder="e.g. Fixed Deposit Scheme" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Interest Rate *</label>
                    <input type="text" name="interest_rate" required value="<?= old('interest_rate', $deposit['interest_rate'] ?? '') ?>" placeholder="e.g. 10.50% p.a." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Min Deposit Amount</label>
                    <input type="text" name="min_amount" value="<?= old('min_amount', $deposit['min_amount'] ?? '') ?>" placeholder="e.g. ₹ 5,000" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tenure / Period</label>
                    <input type="text" name="tenure" value="<?= old('tenure', $deposit['tenure'] ?? '') ?>" placeholder="e.g. 12 to 60 Months" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Short Description (Summary)</label>
                <input type="text" name="short_description" value="<?= old('short_description', $deposit['short_description'] ?? '') ?>" placeholder="Brief 1-2 sentence description for homepage card" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Full Detailed Description</label>
                <textarea name="description" rows="5" placeholder="Full plan details, payout options, terms..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"><?= old('description', $deposit['description'] ?? '') ?></textarea>
            </div>

            <!-- Image Upload & Preview -->
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Plan Graphic / Image</label>
                <?php if (!empty($deposit['image'])): ?>
                    <div class="mb-2 flex items-center space-x-3 bg-slate-50 p-2 rounded-lg border border-slate-200 w-max">
                        <img id="imagePreview" src="<?= base_url($deposit['image']) ?>" alt="Current Image" class="w-16 h-16 object-cover rounded-md">
                        <span class="text-[11px] text-slate-500 font-semibold">Current Image Loaded</span>
                    </div>
                <?php else: ?>
                    <img id="imagePreview" class="hidden w-16 h-16 object-cover rounded-md mb-2">
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" onchange="previewFile(this)" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $deposit['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-amber-500 focus:ring-amber-500">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public site)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/deposits') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-2.5 rounded-lg shadow">
                    Save Deposit Plan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewFile(input) {
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection() ?>
