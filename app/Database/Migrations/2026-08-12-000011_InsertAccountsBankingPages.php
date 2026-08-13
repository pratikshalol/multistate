<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertAccountsBankingPages extends Migration
{
    public function up()
    {
        $pages = [
            [
                'slug'             => 'accounts',
                'title'            => 'Account Services & Types',
                'content'          => '<h2>Account Services</h2><p>Explore our account offerings including Savings, Current and Joint accounts. Open an account online or visit any branch.</p><ul><li>Savings Account — competitive interest and easy access</li><li>Current Account — for businesses and frequent transactions</li><li>Fixed & Recurring Deposits — secure long-term savings</li></ul><p>To apply online, visit <a href="/account-opening">Account Opening</a>.</p>',
                'meta_title'       => 'Accounts - Samarth Multistate',
                'meta_description' => 'Overview of account types and services available at Samarth Multistate Co-operative Credit Society.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'slug'             => 'banking',
                'title'            => 'Banking Services & Digital Access',
                'content'          => '<h2>Banking Services</h2><p>Learn about our digital banking, mobile app, NEFT/IMPS transfers, QR code payments, and branch services designed for convenience and security.</p><ul><li>Mobile & Internet Banking</li><li>UPI & QR Code Payments</li><li>Doorstep Deposit Collections</li><li>Account Statements & e-Passbook</li></ul><p>For assistance, contact your nearest branch.</p>',
                'meta_title'       => 'Banking Services - Samarth Multistate',
                'meta_description' => 'Digital banking, payments, and branch services provided by Samarth Multistate.',
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($pages as $page) {
            $exists = $this->db->table('pages')->where('slug', $page['slug'])->countAllResults();
            if (!$exists) {
                $this->db->table('pages')->insert($page);
            }
        }
    }

    public function down()
    {
        $this->db->table('pages')->whereIn('slug', ['accounts', 'banking'])->delete();
    }
}
