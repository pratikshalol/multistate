<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Samarth Multistate</title>
    <?= $this->include('partials/theme') ?>
</head>
<body class="bg-brand-950 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 space-y-6">
        
        <div class="text-center space-y-2">
            <div class="w-12 h-12 bg-brand-600 rounded-full mx-auto flex items-center justify-center text-white font-extrabold text-2xl shadow">S</div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Samarth Admin Control</h1>
            <p class="text-xs text-slate-500 font-semibold">Sign in to manage society plans, applications, & settings</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 text-xs p-3 rounded-lg font-bold">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-brand-50 border border-brand-200 text-brand-800 text-xs p-3 rounded-lg font-bold">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-4">
            <?= csrf_field() ?>

            <div>
                <label class="form-label">Admin Email Address</label>
                <input type="email" name="email" required value="<?= old('email', 'admin@sainathmultistate.com') ?>" placeholder="admin@sainathmultistate.com" class="form-input text-xs">
            </div>

            <div>
                <label class="form-label">Password</label>
                <input type="password" name="password" required value="Admin@123" placeholder="••••••••" class="form-input text-xs">
            </div>

            <button type="submit" class="btn-admin w-full justify-center py-3 rounded-xl shadow-lg">
                Log In to Admin Panel &rarr;
            </button>
        </form>

        <div class="bg-slate-50 p-3 rounded-lg border border-slate-200 text-center text-[11px] text-slate-500 space-y-0.5">
            <p class="font-bold text-slate-700">Seeded Credentials for Quick Access:</p>
            <p>Email: <code class="bg-slate-200 px-1 py-0.5 rounded text-slate-800">admin@sainathmultistate.com</code></p>
            <p>Password: <code class="bg-slate-200 px-1 py-0.5 rounded text-slate-800">Admin@123</code></p>
        </div>

        <div class="text-center pt-2">
            <a href="<?= base_url() ?>" class="text-xs font-semibold text-slate-500 hover:text-slate-800">&larr; Return to Public Website</a>
        </div>
    </div>

</body>
</html>
