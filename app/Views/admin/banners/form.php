<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">
            <?= $banner ? 'Edit Banner Slide' : 'Add New Banner Slide' ?>
        </h2>
        <a href="<?= base_url('admin/banners') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <!-- Validation Errors -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 text-xs p-4 rounded-xl space-y-1">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p>❌ <?= esc($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form
            action="<?= $banner ? base_url('admin/banners/update/' . $banner['id']) : base_url('admin/banners/store') ?>"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-5 text-xs"
        >
            <?= csrf_field() ?>

            <!-- Headline -->
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Headline <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="headline"
                    required
                    value="<?= old('headline', $banner['headline'] ?? '') ?>"
                    placeholder="e.g. Earn Up to 10.50% Returns on Your Savings"
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                >
                <p class="text-slate-400 mt-1">This is the large bold title text displayed on the slide.</p>
            </div>

            <!-- Subtext -->
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Sub-text / Description</label>
                <textarea
                    name="subtext"
                    rows="3"
                    placeholder="Supporting line under the headline..."
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                ><?= old('subtext', $banner['subtext'] ?? '') ?></textarea>
            </div>

            <!-- CTA Button -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">CTA Button Text</label>
                    <input
                        type="text"
                        name="cta_text"
                        value="<?= old('cta_text', $banner['cta_text'] ?? '') ?>"
                        placeholder="e.g. Open Account Online"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                    >
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">CTA Button Link</label>
                    <input
                        type="text"
                        name="cta_link"
                        value="<?= old('cta_link', $banner['cta_link'] ?? '') ?>"
                        placeholder="e.g. account-opening  or  deposits"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                    >
                    <p class="text-slate-400 mt-1">Relative path only — no leading slash needed.</p>
                </div>
            </div>

            <!-- Image Position & Sort Order -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Image Position</label>
                    <select
                        name="image_position"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white"
                    >
                        <option value="right" <?= old('image_position', $banner['image_position'] ?? 'right') === 'right' ? 'selected' : '' ?>>Right (Text left, Image right)</option>
                        <option value="left"  <?= old('image_position', $banner['image_position'] ?? 'right') === 'left'  ? 'selected' : '' ?>>Left (Image left, Text right)</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Sort Order</label>
                    <input
                        type="number"
                        name="sort_order"
                        min="0"
                        value="<?= old('sort_order', $banner['sort_order'] ?? 0) ?>"
                        placeholder="0"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-amber-500 focus:outline-none"
                    >
                    <p class="text-slate-400 mt-1">Lower number = shown first in the carousel.</p>
                </div>
            </div>

            <!-- Banner Image Upload -->
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Banner Image</label>

                <?php if (!empty($banner['image'])): ?>
                    <div class="mb-3 flex items-center space-x-3 bg-slate-50 p-3 rounded-xl border border-slate-200 w-max">
                        <img id="imagePreview" src="<?= base_url($banner['image']) ?>" alt="Current Banner" class="w-24 h-14 object-cover rounded-lg border border-slate-200">
                        <div>
                            <p class="font-semibold text-slate-600 text-[11px]">Current image</p>
                            <p class="text-slate-400 text-[10px] mt-0.5">Upload a new file below to replace it.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <div id="previewWrapper" class="hidden mb-3">
                        <img id="imagePreview" class="w-24 h-14 object-cover rounded-lg border border-slate-200">
                    </div>
                <?php endif; ?>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    onchange="previewBanner(this)"
                    class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100"
                >
                <p class="text-slate-400 mt-1">Recommended size: 800×500px or wider. JPG/PNG/WebP accepted.</p>
            </div>

            <!-- Active Toggle -->
            <div class="flex items-center space-x-2 pt-1">
                <input
                    type="checkbox"
                    name="is_active"
                    id="is_active"
                    value="1"
                    <?= old('is_active', $banner['is_active'] ?? 1) ? 'checked' : '' ?>
                    class="rounded text-amber-500 focus:ring-amber-500"
                >
                <label for="is_active" class="font-bold text-slate-700">Active — show this slide on the homepage</label>
            </div>

            <!-- Submit -->
            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/banners') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-2.5 rounded-lg shadow">
                    <?= $banner ? 'Update Banner Slide' : 'Save Banner Slide' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewBanner(input) {
        const preview  = document.getElementById('imagePreview');
        const wrapper  = document.getElementById('previewWrapper');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                if (wrapper) wrapper.classList.remove('hidden');
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?= $this->endSection() ?>
