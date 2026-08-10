<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Samarth Multistate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 space-y-6">
        
        <div class="text-center space-y-2">
            <div class="w-12 h-12 bg-slate-900 rounded-full mx-auto flex items-center justify-center text-amber-400 font-extrabold text-2xl shadow">S</div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Samarth Admin Control</h1>
            <p class="text-xs text-slate-500 font-semibold">Sign in to manage society plans, applications, & settings</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 text-xs p-3 rounded-lg font-bold">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs p-3 rounded-lg font-bold">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-4">
            <?= csrf_field() ?>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Admin Email Address</label>
                <input type="email" name="email" required value="<?= old('email', 'admin@Samarthmultistate.com') ?>" placeholder="admin@Samarthmultistate.com" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-slate-900 focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Password</label>
                <input type="password" name="password" required value="Admin@123" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-slate-900 focus:outline-none">
            </div>

            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 rounded-xl text-xs transition-all shadow-lg">
                Log In to Admin Panel &rarr;
            </button>
        </form>

        <div class="bg-slate-50 p-3 rounded-lg border border-slate-200 text-center text-[11px] text-slate-500 space-y-0.5">
            <p class="font-bold text-slate-700">Seeded Credentials for Quick Access:</p>
            <p>Email: <code class="bg-slate-200 px-1 py-0.5 rounded text-slate-800">admin@Samarthmultistate.com</code></p>
            <p>Password: <code class="bg-slate-200 px-1 py-0.5 rounded text-slate-800">Admin@123</code></p>
        </div>

        <div class="text-center pt-2">
            <a href="<?= base_url() ?>" class="text-xs font-semibold text-slate-500 hover:text-slate-800">&larr; Return to Public Website</a>
        </div>
    </div>

</body>
</html>
