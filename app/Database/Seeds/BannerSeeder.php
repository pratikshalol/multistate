<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'headline'       => 'Secure Your Family\'s Future with 10.50% Fixed Deposit Rate',
                'subtext'        => 'Maximize your savings with India\'s premier Multistate Co-operative Credit Society. Guaranteed returns, flexible terms & instant loan facility up to 90%.',
                'image'          => 'uploads/banners/hero_deposit_graphic.png',
                'cta_text'       => 'Open FD Account',
                'cta_link'       => '/account-opening',
                'image_position' => 'right',
                'sort_order'     => 1,
                'is_active'      => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'headline'       => 'Instant Gold Loans at 9.50% Interest Rate',
                'subtext'        => 'Turn your gold into liquid cash in just 15 minutes! Minimal paperwork, maximum per-gram valuation, and safe vault security.',
                'image'          => 'uploads/banners/hero_gold_loan.png',
                'cta_text'       => 'Apply for Loan',
                'cta_link'       => '/loans/gold-loan',
                'image_position' => 'left',
                'sort_order'     => 2,
                'is_active'      => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
            [
                'headline'       => 'Next-Gen Mobile Banking & Instant QR Payments',
                'subtext'        => 'Bank on the go with Shree Bhagwant Mobile Banking app. Transfer money 24/7, accept UPI payments, and track transactions seamlessly.',
                'image'          => 'uploads/banners/hero_mobile_banking.png',
                'cta_text'       => 'Explore Banking',
                'cta_link'       => '/page/mobile-internet-banking',
                'image_position' => 'right',
                'sort_order'     => 3,
                'is_active'      => 1,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('banners')->insertBatch($data);
    }
}

