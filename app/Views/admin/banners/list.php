<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Hero Banner Slides</h2>
        <a href="<?= base_url('admin/banners/create') ?>" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-4 py-2 rounded-lg text-xs transition-all shadow">
            + Add New Banner Slide
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                <tr>
                    <th class="p-4">Preview</th>
                    <th class="p-4">Headline</th>
                    <th class="p-4">CTA Button</th>
                    <th class="p-4">Image Side</th>
                    <th class="p-4">Order</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!empty($banners)): ?>
                    <?php foreach ($banners as $banner): ?>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4">
                                <?php if (!empty($banner['image'])): ?>
                                    <img src="<?= base_url($banner['image']) ?>" alt="Banner" class="w-20 h-12 object-cover rounded-lg border border-slate-200">
                                <?php else: ?>
                                    <div class="w-20 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-2xl">🖼️</div>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 font-bold text-slate-900 max-w-xs">
                                <div class="truncate"><?= esc($banner['headline']) ?></div>
                                <?php if (!empty($banner['subtext'])): ?>
                                    <div class="text-slate-400 font-normal mt-0.5 truncate"><?= esc($banner['subtext']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-slate-600">
                                <?php if (!empty($banner['cta_text'])): ?>
                                    <span class="font-semibold text-amber-700"><?= esc($banner['cta_text']) ?></span>
                                    <?php if (!empty($banner['cta_link'])): ?>
                                        <div class="text-slate-400 mt-0.5 truncate max-w-[120px]"><?= esc($banner['cta_link']) ?></div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-slate-400">—</span>
                                <?php endif; ?>
                            </td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-100 text-slate-600 uppercase">
                                    <?= esc($banner['image_position'] ?? 'right') ?>
                                </span>
                            </td>
                            <td class="p-4 text-slate-600 font-semibold"><?= esc($banner['sort_order']) ?></td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $banner['is_active'] ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-500' ?>">
                                    <?= $banner['is_active'] ? 'ACTIVE' : 'INACTIVE' ?>
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                <a href="<?= base_url('admin/banners/edit/' . $banner['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">Edit</a>
                                <button onclick="confirmDelete('<?= base_url('admin/banners/delete/' . $banner['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="p-10 text-center text-slate-400 font-semibold">
                            No banner slides yet. <a href="<?= base_url('admin/banners/create') ?>" class="text-amber-600 hover:underline font-bold">Add your first one →</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <p class="text-[11px] text-slate-400 px-1">
        💡 Tip: Use <strong>Sort Order</strong> (lower = first) to control the slide sequence. Only <strong>Active</strong> banners appear on the homepage.
    </p>
</div>

<?= $this->endSection() ?>
