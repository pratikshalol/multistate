<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section max-w-2xl mx-auto">
    <div class="admin-head">
        <h2 class="admin-head-title"><?= $testimonial ? 'Edit Testimonial' : 'Add Testimonial' ?></h2>
        <a href="<?= base_url('admin/testimonials') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="admin-panel admin-panel-pad">
        <form action="<?= $testimonial ? base_url('admin/testimonials/update/' . $testimonial['id']) : base_url('admin/testimonials/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="form-label">Member Name *</label>
                <input type="text" name="name" required value="<?= old('name', $testimonial['name'] ?? '') ?>" placeholder="e.g. Rajesh Sharma" class="form-input">
            </div>

            <div>
                <label class="form-label">Testimonial Message *</label>
                <textarea name="message" required rows="4" placeholder="Feedback or review text..." class="form-input"><?= old('message', $testimonial['message'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="form-label">Star Rating (1 to 5)</label>
                <select name="rating" class="form-input">
                    <option value="5" <?= old('rating', $testimonial['rating'] ?? 5) == 5 ? 'selected' : '' ?>>5 Stars ★★★★★</option>
                    <option value="4" <?= old('rating', $testimonial['rating'] ?? 5) == 4 ? 'selected' : '' ?>>4 Stars ★★★★☆</option>
                    <option value="3" <?= old('rating', $testimonial['rating'] ?? 5) == 3 ? 'selected' : '' ?>>3 Stars ★★★☆☆</option>
                </select>
            </div>

            <!-- Photo Upload -->
            <div>
                <label class="form-label">Member Photo (Optional)</label>
                <?php if (!empty($testimonial['photo'])): ?>
                    <div class="mb-2 flex items-center space-x-3 bg-slate-50 p-2 rounded-lg border border-slate-200 w-max">
                        <img id="imagePreview" src="<?= base_url($testimonial['photo']) ?>" alt="Current Photo" class="w-12 h-12 rounded-full object-cover">
                        <span class="text-[11px] text-slate-500 font-semibold">Photo Loaded</span>
                    </div>
                <?php else: ?>
                    <img id="imagePreview" class="hidden w-12 h-12 rounded-full object-cover mb-2">
                <?php endif; ?>
                <input type="file" name="photo" accept="image/*" onchange="previewFile(this)" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100">
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $testimonial['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-brand-600 focus:ring-brand-600">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on homepage)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/testimonials') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="btn-admin px-6 py-2.5 shadow">
                    Save Testimonial
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
