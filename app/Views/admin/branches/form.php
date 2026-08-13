<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="admin-section max-w-3xl mx-auto">
    <div class="admin-head">
        <h2 class="admin-head-title"><?= $branch ? 'Edit Branch' : 'Create Branch' ?></h2>
        <a href="<?= base_url('admin/branches') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="admin-panel admin-panel-pad">
        <form action="<?= $branch ? base_url('admin/branches/update/' . $branch['id']) : base_url('admin/branches/store') ?>" method="POST" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="form-label">Branch Name *</label>
                <input type="text" name="name" required value="<?= old('name', $branch['name'] ?? '') ?>" placeholder="e.g. Head Office - Pune" class="form-input">
            </div>

            <div>
                <label class="form-label">Full Postal Address *</label>
                <textarea name="address" required rows="3" placeholder="Building, Street, Landmark, City, Pincode" class="form-input"><?= old('address', $branch['address'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Phone Numbers *</label>
                    <input type="text" name="phone" required value="<?= old('phone', $branch['phone'] ?? '') ?>" placeholder="e.g. +91 020 2553 9000" class="form-input">
                </div>
                <div>
                    <label class="form-label">Branch Email Address</label>
                    <input type="email" name="email" value="<?= old('email', $branch['email'] ?? '') ?>" placeholder="headoffice@shreebhagwantmultistate.com" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Working Hours & Days</label>
                <input type="text" name="working_hours" value="<?= old('working_hours', $branch['working_hours'] ?? 'Mon-Sat: 10:00 AM - 5:30 PM') ?>" class="form-input">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Latitude (for Google Maps)</label>
                    <input type="text" name="latitude" value="<?= old('latitude', $branch['latitude'] ?? '') ?>" placeholder="e.g. 18.520430" class="form-input">
                </div>
                <div>
                    <label class="form-label">Longitude (for Google Maps)</label>
                    <input type="text" name="longitude" value="<?= old('longitude', $branch['longitude'] ?? '') ?>" placeholder="e.g. 73.856744" class="form-input">
                </div>
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $branch['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-brand-600 focus:ring-brand-600">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public site)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/branches') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="btn-admin px-6 py-2.5 shadow">
                    Save Branch Location
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
