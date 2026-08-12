<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wide">Contact Form Enquiries</h2>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-500 font-bold border-b border-slate-200 uppercase">
                <tr>
                    <th class="p-4">Received Date</th>
                    <th class="p-4">Applicant Name</th>
                    <th class="p-4">Phone</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Product Requested</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if (!empty($enquiries)): ?>
                    <?php foreach ($enquiries as $e): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 text-slate-500"><?= esc($e['created_at']) ?></td>
                        <td class="p-4 font-bold text-slate-900"><?= esc($e['name']) ?></td>
                        <td class="p-4 font-bold text-brand-700"><?= esc($e['phone']) ?></td>
                        <td class="p-4 text-slate-600"><?= esc($e['email'] ?: 'N/A') ?></td>
                        <td class="p-4 text-slate-700"><?= esc($e['related_product'] ?: 'General Inquiry') ?></td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $e['status'] === 'new' ? 'bg-blue-100 text-blue-800' : 'bg-slate-100 text-slate-600' ?>">
                                <?= esc(strtoupper($e['status'])) ?>
                            </span>
                        </td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <a href="<?= base_url('admin/enquiries/view/' . $e['id']) ?>" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold px-3 py-1.5 rounded-md text-[11px]">View Message</a>
                            <button onclick="confirmDelete('<?= base_url('admin/enquiries/delete/' . $e['id']) ?>')" class="bg-red-50 hover:bg-red-100 text-red-600 font-bold px-3 py-1.5 rounded-md text-[11px]">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="p-12 text-center text-slate-400 font-semibold text-sm">
                            📭 No enquiries received yet. Submissions from the Contact form will appear here.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
