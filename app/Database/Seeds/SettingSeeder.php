<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['key' => 'site_name', 'value' => 'Samarth Multistate Co-operative Credit Society Ltd.'],
            ['key' => 'tagline', 'value' => 'Building Trust, Empowering Prosperity'],
            ['key' => 'logo', 'value' => 'uploads/settings/logo.png'],
            ['key' => 'contact_phone', 'value' => '+91 020 2553 9000'],
            ['key' => 'contact_email', 'value' => 'info@samarthmultistate.com'],
            ['key' => 'helpline', 'value' => '1800 233 4455 (Toll Free)'],
            ['key' => 'address', 'value' => 'Samarth Multistate Tower, Commercial Complex, FC Road, Shivajinagar, Pune, Maharashtra 411005'],
            ['key' => 'working_hours', 'value' => 'Mon-Sat: 10:00 AM - 5:30 PM (2nd & 4th Sat Holiday)'],
            ['key' => 'announcement_ticker', 'value' => 'Welcome to Samarth Multistate! Earn up to 10.50% p.a. on Fixed Deposits. Instant Gold Loans processed in 15 minutes! Open your account online now.'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/samarthmultistate'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/samarthmultistate'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/samarthmultistate'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/samarthmultistate'],
            ['key' => 'meta_title', 'value' => 'Samarth Multistate Co-operative Credit Society Ltd. - Official Portal'],
            ['key' => 'meta_description', 'value' => 'Samarth Multistate Co-operative Credit Society offers high-yield deposit plans, instant gold & property loans, mobile banking, and doorstep collection.'],
        ];

        $this->db->table('settings')->insertBatch($data);
    }
}
