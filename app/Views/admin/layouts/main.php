<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel') ?> - Shree Bhagwant Multistate</title>
    <?= $this->include('partials/theme') ?>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased flex min-h-screen">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-brand-900 text-brand-100 flex flex-col shrink-0">
        <div class="h-16 px-6 bg-brand-950 flex items-center justify-between border-b border-brand-800">
            <span class="font-black text-white text-base tracking-wide">Shree Bhagwant Admin</span>
            <span class="text-[10px] bg-brand-500/20 text-brand-200 font-bold px-2 py-0.5 rounded border border-brand-500/40">v1.0</span>
        </div>

        <nav class="flex-grow p-4 space-y-1 text-xs font-semibold overflow-y-auto">
            <div class="text-[10px] uppercase font-bold text-brand-300/80 px-3 pt-2 pb-1">Core Dashboard</div>
            <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>📊</span><span>Dashboard</span>
            </a>

            <div class="text-[10px] uppercase font-bold text-brand-300/80 px-3 pt-4 pb-1">Applications & Leads</div>
            <a href="<?= base_url('admin/accounts') ?>" class="flex items-center justify-between px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span class="flex items-center space-x-3"><span>📋</span><span>Account Applications</span></span>
            </a>
            <a href="<?= base_url('admin/enquiries') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>📬</span><span>Contact Enquiries</span>
            </a>

            <div class="text-[10px] uppercase font-bold text-brand-300/80 px-3 pt-4 pb-1">Content Management</div>
            <a href="<?= base_url('admin/banners') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>🖼️</span><span>Hero Banners</span>
            </a>
            <a href="<?= base_url('admin/deposits') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>💰</span><span>Deposit Plans</span>
            </a>
            <a href="<?= base_url('admin/loans') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>🤝</span><span>Loan Products</span>
            </a>
            <a href="<?= base_url('admin/account-services') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>🏧</span><span>Account Services</span>
            </a>
            <a href="<?= base_url('admin/banking-services') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>📱</span><span>Banking Services</span>
            </a>
            <a href="<?= base_url('admin/branches') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>🏦</span><span>Branch Locations</span>
            </a>
            <a href="<?= base_url('admin/notices') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>📢</span><span>Notices & Announcements</span>
            </a>
            <a href="<?= base_url('admin/testimonials') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>⭐</span><span>Testimonials</span>
            </a>
            <a href="<?= base_url('admin/pages') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>📄</span><span>Static Pages</span>
            </a>

            <div class="text-[10px] uppercase font-bold text-brand-300/80 px-3 pt-4 pb-1">Settings</div>
            <a href="<?= base_url('admin/settings') ?>" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg hover:bg-brand-800 hover:text-white transition-colors">
                <span>⚙️</span><span>Site Settings</span>
            </a>
        </nav>

        <div class="p-4 border-t border-brand-800 space-y-2 text-xs">
            <a href="<?= base_url() ?>" target="_blank" class="block text-center bg-brand-800 hover:bg-brand-700 text-brand-100 py-2 rounded-lg transition-colors font-semibold">
                🌐 Visit Public Site
            </a>
            <a href="<?= base_url('admin/logout') ?>" class="block text-center bg-red-600/20 hover:bg-red-600 text-red-300 hover:text-white py-2 rounded-lg transition-colors font-bold">
                🔒 Logout
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between shrink-0">
            <h1 class="font-bold text-lg text-slate-800"><?= esc($title ?? 'Dashboard') ?></h1>
            <div class="flex items-center space-x-3 text-xs">
                <span class="text-slate-500">Logged in as:</span>
                <span class="font-bold text-slate-900 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200"><?= session()->get('admin_email') ?></span>
            </div>
        </header>

        <!-- Flash Messages & Main Render -->
        <main class="p-6 flex-grow overflow-y-auto">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-brand-50 border border-brand-200 text-brand-800 text-xs p-4 rounded-xl font-bold mb-6 flex items-center justify-between">
                    <span>✅ <?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 text-xs p-4 rounded-xl font-bold mb-6 flex items-center justify-between">
                    <span>❌ <?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!-- Confirm Delete Modal Script -->
    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                window.location.href = url;
            }
        }
    </script>
</body>
</html>
