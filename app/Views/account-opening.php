<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="bg-brand-700 text-white py-10">
    <div class="max-w-3xl mx-auto px-4 text-center space-y-2">
        <span class="bg-amber-500 text-slate-950 text-[10px] font-black uppercase px-3 py-1 rounded-full">Fast Track Application</span>
        <h1 class="text-3xl font-extrabold">Online Account Opening Application</h1>
        <p class="text-slate-300 text-xs">Fill out the quick 3-step membership & account application form below.</p>
    </div>
</div>

<div class="py-12 bg-slate-50">
    <div class="max-w-2xl mx-auto px-4">
        
        <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm p-4 rounded-xl font-bold flex items-start space-x-2">
                    <span>✅</span>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 text-xs p-4 rounded-xl space-y-1">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <p>• <?= esc($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('account-opening') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Section 1: Personal Details -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-200 pb-2">
                        <span class="w-6 h-6 rounded-full bg-amber-500 text-slate-950 font-black text-xs flex items-center justify-center">1</span>
                        <h2 class="font-bold text-sm text-slate-900 uppercase tracking-wide">Personal Details</h2>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Full Applicant Name *</label>
                        <input type="text" name="full_name" required value="<?= old('full_name') ?>" placeholder="As printed on Aadhaar / PAN card" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Mobile Phone Number *</label>
                            <input type="tel" name="mobile" required value="<?= old('mobile') ?>" placeholder="10 digit number" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Date of Birth</label>
                            <input type="date" name="dob" value="<?= old('dob') ?>" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="<?= old('email') ?>" placeholder="name@example.com" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Full Residential Address *</label>
                        <textarea name="address" required rows="2" placeholder="House/Flat No., Street, City, Pincode" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none"><?= old('address') ?></textarea>
                    </div>
                </div>

                <!-- Section 2: Account Details -->
                <div class="space-y-4 pt-2">
                    <div class="flex items-center space-x-2 border-b border-slate-200 pb-2">
                        <span class="w-6 h-6 rounded-full bg-amber-500 text-slate-950 font-black text-xs flex items-center justify-center">2</span>
                        <h2 class="font-bold text-sm text-slate-900 uppercase tracking-wide">Account Preference</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Account Type *</label>
                            <select name="account_type" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                                <option value="">-- Select Account Type --</option>
                                <option value="Savings Deposit Account" <?= old('account_type') == 'Savings Deposit Account' ? 'selected' : '' ?>>Savings Deposit Account</option>
                                <option value="Fixed Deposit (FD)" <?= old('account_type') == 'Fixed Deposit (FD)' ? 'selected' : '' ?>>Fixed Deposit (FD - 10.50%)</option>
                                <option value="Pigmy / Daily Collection Account" <?= old('account_type') == 'Pigmy / Daily Collection Account' ? 'selected' : '' ?>>Pigmy / Daily Collection Account</option>
                                <option value="Future / Recurring Deposit" <?= old('account_type') == 'Future / Recurring Deposit' ? 'selected' : '' ?>>Future / Recurring Deposit (RD)</option>
                                <option value="Current Account" <?= old('account_type') == 'Current Account' ? 'selected' : '' ?>>Current Account</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Preferred Home Branch</label>
                            <select name="branch_id" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                                <option value="">-- Select Branch --</option>
                                <?php foreach ($branches as $b): ?>
                                    <option value="<?= $b['id'] ?>" <?= old('branch_id') == $b['id'] ? 'selected' : '' ?>><?= esc($b['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Identity Document Upload -->
                <div class="space-y-4 pt-2">
                    <div class="flex items-center space-x-2 border-b border-slate-200 pb-2">
                        <span class="w-6 h-6 rounded-full bg-amber-500 text-slate-950 font-black text-xs flex items-center justify-center">3</span>
                        <h2 class="font-bold text-sm text-slate-900 uppercase tracking-wide">ID Proof Verification</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">ID Proof Type *</label>
                            <select name="id_proof_type" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none bg-white">
                                <option value="Aadhaar Card" <?= old('id_proof_type') == 'Aadhaar Card' ? 'selected' : '' ?>>Aadhaar Card</option>
                                <option value="PAN Card" <?= old('id_proof_type') == 'PAN Card' ? 'selected' : '' ?>>PAN Card</option>
                                <option value="Voter ID Card" <?= old('id_proof_type') == 'Voter ID Card' ? 'selected' : '' ?>>Voter ID Card</option>
                                <option value="Passport" <?= old('id_proof_type') == 'Passport' ? 'selected' : '' ?>>Passport</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">ID Proof Document Number *</label>
                            <input type="text" name="id_proof_number" required value="<?= old('id_proof_number') ?>" placeholder="e.g. 1234-5678-9012" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 text-xs focus:ring-2 focus:ring-amber-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Upload ID Proof File (JPG, PNG, PDF)</label>
                        <input type="file" name="id_proof_file" accept=".jpg,.jpeg,.png,.pdf" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200">
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-slate-950 font-black py-3.5 rounded-xl text-base transition-all shadow-lg hover:shadow-xl">
                        Submit Account Application &rarr;
                    </button>
                    <p class="text-[11px] text-slate-500 text-center mt-2">Our representative will verify your submission and issue your account number within 24 business hours.</p>
                </div>
            </form>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
