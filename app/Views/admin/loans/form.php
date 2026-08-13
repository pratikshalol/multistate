<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section max-w-3xl mx-auto">
    <div class="admin-head">
        <h2 class="admin-head-title"><?= $loan ? 'Edit Loan Product' : 'Create Loan Product' ?></h2>
        <a href="<?= base_url('admin/loans') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="admin-panel admin-panel-pad">
        <form action="<?= $loan ? base_url('admin/loans/update/' . $loan['id']) : base_url('admin/loans/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="form-label">Loan Product Name *</label>
                <input type="text" name="name" required value="<?= old('name', $loan['name'] ?? '') ?>" placeholder="e.g. Gold Loan" class="form-input">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="form-label">Interest Rate *</label>
                    <input type="text" name="interest_rate" required value="<?= old('interest_rate', $loan['interest_rate'] ?? '') ?>" placeholder="e.g. 9.50% p.a." class="form-input">
                </div>
                <div>
                    <label class="form-label">Max Loan Valuation</label>
                    <input type="text" name="max_percentage" value="<?= old('max_percentage', $loan['max_percentage'] ?? '') ?>" placeholder="e.g. Up to 85% of Market Value" class="form-input">
                </div>
                <div>
                    <label class="form-label">Tenure / Repayment</label>
                    <input type="text" name="tenure" value="<?= old('tenure', $loan['tenure'] ?? '') ?>" placeholder="e.g. 1 to 12 Months" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Short Description (Summary)</label>
                <input type="text" name="short_description" value="<?= old('short_description', $loan['short_description'] ?? '') ?>" placeholder="Brief 1-2 sentence description" class="form-input">
            </div>

            <div>
                <label class="form-label">Full Description</label>
                <textarea name="description" rows="4" placeholder="Comprehensive product overview..." class="form-input"><?= old('description', $loan['description'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Eligibility Criteria</label>
                    <textarea name="eligibility" rows="3" placeholder="Who can apply..." class="form-input"><?= old('eligibility', $loan['eligibility'] ?? '') ?></textarea>
                </div>
                <div>
                    <label class="form-label">Documents Required</label>
                    <textarea name="documents_required" rows="3" placeholder="Aadhaar, PAN, Bank Statements..." class="form-input"><?= old('documents_required', $loan['documents_required'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- Image Upload & Preview -->
            <div>
                <label class="form-label">Loan Banner Graphic / Image</label>
                <?php if (!empty($loan['image'])): ?>
                    <div class="mb-2 flex items-center space-x-3 bg-slate-50 p-2 rounded-lg border border-slate-200 w-max">
                        <img id="imagePreview" src="<?= base_url($loan['image']) ?>" alt="Current Image" class="w-16 h-16 object-cover rounded-md">
                        <span class="text-[11px] text-slate-500 font-semibold">Current Image Loaded</span>
                    </div>
                <?php else: ?>
                    <img id="imagePreview" class="hidden w-16 h-16 object-cover rounded-md mb-2">
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" onchange="previewFile(this)" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $loan['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-brand-600 focus:ring-brand-600">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public site)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/loans') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="btn-admin px-6 py-2.5 shadow">
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
