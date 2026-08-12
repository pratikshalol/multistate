<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertMissingPages extends Migration
{
    public function up()
    {
        $pages = [
            [
                'slug'             => 'savings-account',
                'title'            => 'Savings Account',
                'content'          => '<h2>Savings Account — Secure & Rewarding</h2>
<p>A Savings Account with Samarth Multistate Co-operative Credit Society is the perfect way to start your financial journey. Earn attractive interest on your idle funds while keeping your money safe and accessible at all times.</p>
<h3>Key Features</h3>
<ul>
<li>Competitive interest rate on daily balance</li>
<li>Unlimited deposits; withdrawals as per society norms</li>
<li>Free passbook, e-statement, and SMS alerts</li>
<li>Access via Mobile Banking App and branch</li>
<li>Doorstep deposit collection available</li>
<li>Nomination facility for all account holders</li>
</ul>
<h3>Eligibility</h3>
<ul>
<li>Any individual above 18 years with valid KYC</li>
<li>Minor accounts operated by guardian</li>
<li>Joint accounts permitted</li>
</ul>
<h3>Documents Required</h3>
<ul>
<li>Aadhaar Card / PAN Card / Voter ID</li>
<li>Passport-size photograph</li>
<li>Address proof</li>
</ul>
<p>To open your Savings Account today, <a href="/account-opening" style="color:#2563eb;font-weight:bold;">click here to apply online</a> or visit your nearest branch.</p>',
                'meta_title'       => 'Savings Account - Samarth Multistate Co-operative Credit Society',
                'meta_description' => 'Open a Savings Account with Samarth Multistate and earn attractive interest on your deposits with doorstep banking services.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'current-account',
                'title'            => 'Current Account',
                'content'          => '<h2>Current Account — Built for Business</h2>
<p>Samarth Multistate Co-operative Credit Society\'s Current Account is designed for traders, merchants, and businesses that require frequent transactions and higher liquidity.</p>
<h3>Key Features</h3>
<ul>
<li>Unlimited transactions — deposits and withdrawals</li>
<li>Overdraft facility available against eligible security</li>
<li>Multi-signatory and partnership accounts supported</li>
<li>NEFT / RTGS / IMPS fund transfers</li>
<li>Cheque book facility</li>
<li>UPI and QR code payment acceptance</li>
<li>Monthly account statements via email</li>
</ul>
<h3>Eligibility</h3>
<ul>
<li>Individual traders, proprietors, and self-employed professionals</li>
<li>Partnership firms and HUFs</li>
<li>Registered societies and trusts</li>
</ul>
<h3>Documents Required</h3>
<ul>
<li>PAN Card (mandatory)</li>
<li>Business registration certificate / GST certificate</li>
<li>Aadhaar / address proof of all signatories</li>
<li>Passport-size photographs</li>
</ul>
<p>To open your Current Account, <a href="/account-opening" style="color:#2563eb;font-weight:bold;">apply online here</a> or visit any of our branches.</p>',
                'meta_title'       => 'Current Account - Samarth Multistate Co-operative Credit Society',
                'meta_description' => 'Open a Current Account with Samarth Multistate for unlimited business transactions, overdraft facilities, and UPI/QR payments.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'career',
                'title'            => 'Career Opportunities',
                'content'          => '<h2>Build Your Career with Samarth Multistate</h2>
<p>We are always looking for passionate, dedicated, and skilled individuals to join our growing team. At Samarth Multistate Co-operative Credit Society, we believe our people are our greatest strength.</p>
<h3>Why Work With Us?</h3>
<ul>
<li>Stable and growing co-operative institution</li>
<li>Competitive salary and performance incentives</li>
<li>Career growth and skill development programs</li>
<li>Positive and inclusive work environment</li>
<li>Opportunities across branches in Maharashtra</li>
</ul>
<h3>Current Openings</h3>
<p>We periodically recruit for the following roles:</p>
<ul>
<li><strong>Branch Manager</strong> — MBA / B.Com with 3+ years banking experience</li>
<li><strong>Loan Officer</strong> — Graduate with knowledge of credit appraisal</li>
<li><strong>Field Agent (Pigmy Collection)</strong> — 10th pass, local area knowledge required</li>
<li><strong>Customer Service Executive</strong> — Graduate, good communication skills</li>
<li><strong>IT / Software Executive</strong> — B.E. / BCA with web / software development skills</li>
</ul>
<h3>How to Apply</h3>
<p>Send your updated resume and a brief cover letter to: <strong>careers@samarthmultistate.com</strong></p>
<p>Or walk in with your resume to any of our branch offices during working hours (Mon–Sat, 10 AM – 5:30 PM).</p>
<p>You can also <a href="/contact" style="color:#2563eb;font-weight:bold;">submit an enquiry through our Contact page</a> and our HR team will get in touch with you.</p>',
                'meta_title'       => 'Career Opportunities - Samarth Multistate Co-operative Credit Society',
                'meta_description' => 'Explore career opportunities at Samarth Multistate Co-operative Credit Society. Join our growing team across Maharashtra.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($pages as $page) {
            // Only insert if slug doesn't already exist
            $exists = $this->db->table('pages')->where('slug', $page['slug'])->countAllResults();
            if (!$exists) {
                $this->db->table('pages')->insert($page);
            }
        }
    }

    public function down()
    {
        $this->db->table('pages')
            ->whereIn('slug', ['savings-account', 'current-account', 'career'])
            ->delete();
    }
}
