<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide"><?= $branch ? 'Edit Branch' : 'Create Branch' ?></h2>
        <a href="<?= base_url('admin/branches') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800">&larr; Back to List</a>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <form action="<?= $branch ? base_url('admin/branches/update/' . $branch['id']) : base_url('admin/branches/store') ?>" method="POST" class="space-y-4 text-xs">
            <?= csrf_field() ?>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Branch Name *</label>
                <input type="text" name="name" required value="<?= old('name', $branch['name'] ?? '') ?>" placeholder="e.g. Head Office - Pune" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Full Postal Address *</label>
                <textarea name="address" required rows="3" placeholder="Building, Street, Landmark, City, Pincode" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none"><?= old('address', $branch['address'] ?? '') ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Phone Numbers *</label>
                    <input type="text" name="phone" required value="<?= old('phone', $branch['phone'] ?? '') ?>" placeholder="e.g. +91 020 2553 9000" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Branch Email Address</label>
                    <input type="email" name="email" value="<?= old('email', $branch['email'] ?? '') ?>" placeholder="headoffice@Samarthmultistate.com" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Working Hours & Days</label>
                <input type="text" name="working_hours" value="<?= old('working_hours', $branch['working_hours'] ?? 'Mon-Sat: 10:00 AM - 5:30 PM') ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Latitude (for Google Maps)</label>
                    <input type="text" name="latitude" value="<?= old('latitude', $branch['latitude'] ?? '') ?>" placeholder="e.g. 18.520430" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Longitude (for Google Maps)</label>
                    <input type="text" name="longitude" value="<?= old('longitude', $branch['longitude'] ?? '') ?>" placeholder="e.g. 73.856744" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                </div>
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?= old('is_active', $branch['is_active'] ?? 1) ? 'checked' : '' ?> class="rounded text-blue-600 focus:ring-blue-600">
                <label for="is_active" class="font-bold text-slate-700">Active (Visible on public site)</label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?= base_url('admin/branches') ?>" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 font-bold hover:bg-slate-50">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2.5 rounded-lg shadow">
                    Save Branch Location
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
