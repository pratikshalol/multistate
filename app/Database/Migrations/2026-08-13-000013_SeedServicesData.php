<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedServicesData extends Migration
{
    public function up()
    {
        $exists = $this->db->table('services')->countAllResults();
        if ($exists > 0) {
            return; // already has data, don't duplicate
        }

        $now = date('Y-m-d H:i:s');

        $services = [
            // Account Services
            [
                'category'    => 'account',
                'icon'        => '📋',
                'icon_color'  => 'bg-brand-700',
                'title'       => 'Open New Account',
                'description' => 'Start your financial journey with us. Apply online for a new account in minutes — simple, paperless, and hassle-free.',
                'features'    => "Quick online application\nMinimal documentation\nSame-day processing",
                'link_url'    => '/account-opening',
                'link_text'   => 'Apply Now',
                'sort_order'  => 1,
            ],
            [
                'category'    => 'account',
                'icon'        => '🏦',
                'icon_color'  => 'bg-emerald-600',
                'title'       => 'Savings Account',
                'description' => 'Earn attractive interest on your daily balance while keeping your money safe and accessible at all times.',
                'features'    => "Competitive interest on daily balance\nFree passbook & SMS alerts\nNomination facility",
                'link_url'    => '/page/savings-account',
                'link_text'   => 'Learn More',
                'sort_order'  => 2,
            ],
            [
                'category'    => 'account',
                'icon'        => '💼',
                'icon_color'  => 'bg-sky-600',
                'title'       => 'Current Account',
                'description' => 'Designed for traders and businesses requiring high-frequency transactions, overdraft, and multi-signatory support.',
                'features'    => "Unlimited transactions\nOverdraft facility available\nUPI & QR code payments",
                'link_url'    => '/page/current-account',
                'link_text'   => 'Learn More',
                'sort_order'  => 3,
            ],
            // Banking Services
            [
                'category'    => 'banking',
                'icon'        => '📱',
                'icon_color'  => 'bg-brand-700',
                'title'       => 'Mobile & Net Banking',
                'description' => 'Access your account, transfer funds, check balances, and pay bills from your smartphone or desktop — 24/7.',
                'features'    => "Real-time fund transfers\nAccount statements and alerts\nSecure OTP-based login",
                'link_url'    => '/page/mobile-internet-banking',
                'link_text'   => 'Learn More about Mobile Banking',
                'sort_order'  => 1,
            ],
            [
                'category'    => 'banking',
                'icon'        => '📷',
                'icon_color'  => 'bg-emerald-600',
                'title'       => 'QR Code Payments',
                'description' => 'Accept or make instant payments using UPI-linked QR codes — fast, contactless, and compatible with all major payment apps.',
                'features'    => "Instant UPI settlements\nWorks with PhonePe, GPay and more\nZero transaction charges",
                'link_url'    => '/page/qr-code-payments',
                'link_text'   => 'Learn More about QR Payments',
                'sort_order'  => 2,
            ],
            [
                'category'    => 'banking',
                'icon'        => '🏧',
                'icon_color'  => 'bg-sky-600',
                'title'       => 'Branch Locator',
                'description' => 'Find your nearest Samarth Multistate branch — address, working hours, phone numbers, and directions.',
                'features'    => "All branches listed\nMap and directions\nWorking hours and contact info",
                'link_url'    => '/branches',
                'link_text'   => 'Find a Branch',
                'sort_order'  => 3,
            ],
        ];

        foreach ($services as $service) {
            $service['is_active']  = 1;
            $service['created_at'] = $now;
            $service['updated_at'] = $now;
            $this->db->table('services')->insert($service);
        }
    }

    public function down()
    {
        $this->db->table('services')->truncate();
    }
}
