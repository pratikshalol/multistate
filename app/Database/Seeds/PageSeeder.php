<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'slug'             => 'about',
                'title'            => 'About Samarth Multistate Co-operative Credit Society',
                'content'          => '<h2>Empowering Communities Through Transparent & Secure Financial Co-operation</h2><p>Samarth Multistate Co-operative Credit Society Ltd. is registered under the Multi-State Co-operative Societies Act. Built on principles of trust, transparency, and financial inclusion, we serve thousands of members across Maharashtra and neighboring states.</p><h3>Our Core Vision</h3><p>To foster financial self-reliance and economic growth by offering innovative deposit schemes, accessible credit solutions, and modern digital banking services tailored to the needs of rural and urban communities alike.</p><h3>Why Choose Samarth Multistate?</h3><ul><li>Multi-state operational license with strict regulatory compliance</li><li>Transparent operation with high capital adequacy ratio</li><li>Fully automated CBS (Core Banking Solution) with mobile banking app & UPI/QR payments</li><li>High return on fixed deposits & doorstep banking services</li></ul>',
                'meta_title'       => 'About Us - Samarth Multistate Co-operative Credit Society',
                'meta_description' => 'Learn about Samarth Multistate Co-operative Credit Society, our mission, vision, governance, and commitment to member prosperity.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'chairman-message',
                'title'            => 'Chairman\'s Message',
                'content'          => '<h2>Dear Valued Members & Partners,</h2><p>Warm greetings from Samarth Multistate Co-operative Credit Society Ltd. Since our inception, our mission has been simple yet profound: to empower every individual and business by making credit accessible, deposits rewarding, and banking effortless.</p><p>In today\'s dynamic financial landscape, we continue to bridge traditional co-operative values with state-of-the-art technology. From instant mobile banking and QR code payments to daily doorstep collections, we ensure that every member experiences world-class banking with a personal touch.</p><p>We remain deeply grateful for your unwavering trust and support. Together, we shall continue to achieve financial milestone after milestone.</p><p><strong>Warm Regards,</strong><br><em>Shri. Rameshwar G. Patil</em><br>Founder & Honorable Chairman<br>Samarth Multistate Co-operative Credit Society Ltd.</p>',
                'meta_title'       => 'Chairman Message - Samarth Multistate',
                'meta_description' => 'Read the official address and vision from our Honorable Chairman, Shri. Rameshwar G. Patil.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'privacy-policy',
                'title'            => 'Privacy Policy',
                'content'          => '<h2>Privacy Policy & Information Safety</h2><p>Samarth Multistate Co-operative Credit Society is committed to preserving the privacy and confidentiality of personal details provided by members and site visitors.</p><h3>Data Collection & Usage</h3><p>We collect essential personal information (name, email, phone, address, KYC documents) solely for account opening, loan processing, member identification, and regulatory compliance under Co-operative guidelines.</p><h3>Information Security</h3><p>We implement strict encryption protocols, firewalls, and secure socket layers (SSL) to safeguard your account records and financial transactions from unauthorized access.</p>',
                'meta_title'       => 'Privacy Policy - Samarth Multistate',
                'meta_description' => 'Official privacy policy outlining how Samarth Multistate protects customer and member data.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'terms-conditions',
                'title'            => 'Terms & Conditions',
                'content'          => '<h2>Terms of Service & Banking Rules</h2><p>By accessing our services or opening an account with Samarth Multistate Co-operative Credit Society Ltd., members agree to adhere to the bye-laws of the society and regulatory statutes.</p><h3>Membership & Eligibility</h3><p>Membership is open to individuals fulfilling criteria specified under the Multi-State Co-operative Societies Act. Account operations are subject to KYC verification.</p><h3>Interest Rates & Modifications</h3><p>Interest rates on deposit schemes and credit facilities are revised periodically based on Board decisions and market conditions.</p>',
                'meta_title'       => 'Terms & Conditions - Samarth Multistate',
                'meta_description' => 'Terms of service and operational rules for members of Samarth Multistate Co-operative Credit Society.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'mobile-internet-banking',
                'title'            => 'Mobile & Internet Banking',
                'content'          => '<h2>Bank Anytime, Anywhere with Samarth Mobile Banking</h2><p>Enjoy 24x7 control over your accounts with our feature-rich mobile app and online portal. Check balances, transfer funds instantly, download account statements, and manage deposit receipts with ease.</p><ul><li>Instant IMPS / NEFT fund transfers</li><li>Deposit receipt viewing & loan account status</li><li>Biometric fingerprint & PIN security</li><li>Downloadable e-passbook and tax statements</li></ul>',
                'meta_title'       => 'Mobile & Internet Banking - Samarth Multistate',
                'meta_description' => 'Discover Samarth Mobile Banking app and Internet Banking services for secure 24/7 digital transactions.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'qr-code-payments',
                'title'            => 'QR Code & Merchant Payments',
                'content'          => '<h2>Zero Fee Merchant QR Payment Solutions</h2><p>Empowering local merchants, shopkeepers, and micro-entrepreneurs with customized Samarth Multistate QR code stands. Accept payments from Google Pay, PhonePe, Paytm, BHIM UPI directly into your society savings account with instant SMS notifications.</p><ul><li>Zero setup fee and zero MDR charges</li><li>All UPI apps supported</li><li>Instant audio notification box support</li><li>Daily auto-settlement to account</li></ul>',
                'meta_title'       => 'QR Code Payments - Samarth Multistate',
                'meta_description' => 'Accept digital payments effortlessly with Samarth Multistate QR Code payment solutions for merchants and members.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pages')->insertBatch($data);

        // Insert additional pages (only if not already present)
        $extra = [
            [
                'slug'             => 'savings-account',
                'title'            => 'Savings Account',
                'content'          => '<h2>Savings Account — Secure & Rewarding</h2><p>A Savings Account with Samarth Multistate Co-operative Credit Society is the perfect way to start your financial journey. Earn attractive interest on your idle funds while keeping your money safe and accessible at all times.</p><h3>Key Features</h3><ul><li>Competitive interest rate on daily balance</li><li>Free passbook, e-statement, and SMS alerts</li><li>Mobile Banking App access</li><li>Doorstep deposit collection available</li><li>Nomination facility</li></ul><h3>Documents Required</h3><ul><li>Aadhaar Card / PAN Card</li><li>Passport-size photograph</li><li>Address proof</li></ul><p><a href="/account-opening" style="color:#2563eb;font-weight:bold;">Apply Online Here</a></p>',
                'meta_title'       => 'Savings Account - Samarth Multistate',
                'meta_description' => 'Open a Savings Account with Samarth Multistate and earn attractive interest on your deposits.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'current-account',
                'title'            => 'Current Account',
                'content'          => '<h2>Current Account — Built for Business</h2><p>Samarth Multistate\'s Current Account is designed for traders, merchants, and businesses requiring frequent transactions and higher liquidity.</p><h3>Key Features</h3><ul><li>Unlimited transactions — deposits and withdrawals</li><li>Overdraft facility available</li><li>NEFT / RTGS / IMPS transfers</li><li>Cheque book facility</li><li>UPI and QR code payment acceptance</li></ul><h3>Documents Required</h3><ul><li>PAN Card (mandatory)</li><li>Business registration / GST certificate</li><li>Aadhaar of all signatories</li></ul><p><a href="/account-opening" style="color:#2563eb;font-weight:bold;">Apply Online Here</a></p>',
                'meta_title'       => 'Current Account - Samarth Multistate',
                'meta_description' => 'Open a Current Account with Samarth Multistate for unlimited business transactions and overdraft facilities.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'career',
                'title'            => 'Career Opportunities',
                'content'          => '<h2>Build Your Career with Samarth Multistate</h2><p>We are always looking for passionate, dedicated individuals to join our growing team across Maharashtra.</p><h3>Current Openings</h3><ul><li><strong>Branch Manager</strong> — MBA/B.Com with 3+ years banking experience</li><li><strong>Loan Officer</strong> — Graduate with credit appraisal knowledge</li><li><strong>Field Agent (Pigmy Collection)</strong> — 10th pass, local area knowledge</li><li><strong>Customer Service Executive</strong> — Graduate, good communication skills</li><li><strong>IT / Software Executive</strong> — B.E./BCA with development skills</li></ul><h3>How to Apply</h3><p>Email your resume to: <strong>careers@samarthmultistate.com</strong> or <a href="/contact" style="color:#2563eb;font-weight:bold;">submit an enquiry here</a>.</p>',
                'meta_title'       => 'Career Opportunities - Samarth Multistate',
                'meta_description' => 'Explore career opportunities at Samarth Multistate Co-operative Credit Society across Maharashtra.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($extra as $page) {
            $exists = $this->db->table('pages')->where('slug', $page['slug'])->countAllResults();
            if (!$exists) {
                $this->db->table('pages')->insert($page);
            }
        }
    }
}
