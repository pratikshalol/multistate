<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide"><?= $loan ? 'Edit Loan Product' : 'Create Loan Product' ?></h2>
        <a href="<?= base_url('admin/loans') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="<?= $loan ? base_url('admin/loans/update/' . $loan['id']) : base_url('admin/loans/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Loan Product Name *</label>
                <input type="text" name="name" required value="<?= old('name', $loan['name'] ?? '') ?>" placeholder="e.g. Gold Loan" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Interest Rate *</label>
                    <input type="text" name="interest_rate" required value="<?= old('interest_rate', $loan['interest_rate'] ?? '') ?>" placeholder="e.g. 9.50% p.a." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Max Loan Valuation</label>
                    <input type="text" name="max_percentage" value="<?= old('max_percentage', $loan['max_percentage'] ?? '') ?>" placeholder="e.g. Up to 85% of Market Value" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tenure / Repayment</label>
                    <input type="text" name="tenure" value="<?= old('tenure', $loan['tenure'] ?? '') ?>" placeholder="e.g. 1 to 12 Months" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Short Description (Summary)</label>
                <input type="text" name="short_description" value="<?= old('short_description', $loan['short_description'] ?? '') ?>" placeholder="Brief 1-2 sentence description" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Full Description</label>
                <textarea name="description" rows="4" placeholder="Comprehensive product overview..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none"><?= old('description', $loan['description'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Eligibility Criteria</label>
                    <textarea name="eligibility" rows="3" placeholder="Who can apply..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none"><?= old('eligibility', $loan['eligibility'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Documents Required</label>
                    <textarea name="documents_required" rows="3" placeholder="Aadhaar, PAN, Bank Statements..." class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-purple-600 focus:outline-none"><?= old('documents_required', $loan['documents_required'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- Image Upload & Preview -->
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Loan Banner Graphic / Image</label>
                <?php if (!empty($loan['image'])): ?>
                    <div class="mb-2 flex items-center space-x-3 bg-slate-50 p-2 rounded-lg border border-slate-200 w-max">
                        <img id="imagePreview" src="<?= base_url($loan['image']) ?>" alt="Current Image" class="w-16 h-16 object-cover rounded-md">
                        <span class="text-[11px] text-slate-500 font-semibold">Current Image Loaded</span>
                    </div>
                <?php else: ?>
                    <img id="imagePreview" class="hidden w-16 h-16 object-cover rounded-md mb-2">
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" onchange="previewFile(this)" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $loan['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-purple-600 focus:ring-purple-600">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public site)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/loans') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold px-6 py-2.5 rounded-lg shadow">
                    Save Loan Product
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
