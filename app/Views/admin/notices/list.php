<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Notices & Announcements</h2>
        <a href="<?= base_url('admin/notices/create') ?>" class="bg-brand-700 hover:bg-brand-800 text-white font-bold px-4 py-2 rounded-lg text-xs transition-all shadow">
            + Publish New Notice
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                <tr>
                    <th class="p-4">Publish Date</th>
                    <th class="p-4">Notice Title</th>
                    <th class="p-4">Attachment</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php foreach ($notices as $notice): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 font-bold text-amber-600"><?= esc($notice['publish_date']) ?></td>
                        <td class="p-4 font-bold text-slate-900"><?= esc($notice['title']) ?></td>
                        <td class="p-4">
                            <?php if (!empty($notice['file_path'])): ?>
                                <a href="<?= base_url($notice['file_path']) ?>" target="_blank" class="text-brand-700 font-bold hover:underline">📄 View Attachment</a>
                            <?php else: ?>
                                <span class="text-slate-400">None</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $notice['is_active'] ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-500' ?>">
                                <?= $notice['is_active'] ? 'PUBLISHED' : 'DRAFT' ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="<?= base_url('admin/notices/edit/' . $notice['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">Edit</a>
                            <button onclick="confirmDelete('<?= base_url('admin/notices/delete/' . $notice['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
