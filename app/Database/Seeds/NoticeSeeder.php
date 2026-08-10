<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NoticeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'        => 'Annual General Body Meeting (AGM) Notice 2026',
                'description'  => 'Notice is hereby given to all honored members that the 12th Annual General Body Meeting will be held on August 25, 2026 at the Main Head Office Auditorium, Pune.',
                'file_path'    => 'uploads/notices/agm_notice_2026.pdf',
                'publish_date' => date('Y-m-d'),
                'is_active'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'title'        => 'Special Festive Bonus Interest Rate on Fixed Deposits',
                'description'  => 'Avail an extra 0.50% interest rate on new Fixed Deposits opened between 1st August and 31st August 2026 across all branches.',
                'file_path'    => '',
                'publish_date' => date('Y-m-d'),
                'is_active'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'title'        => 'Free Financial & Healthcare Checkup Camp Organized by Society',
                'description'  => 'Samarth Multistate is organizing a free health checkup and financial literacy drive for all society members at Ahmednagar Branch on Sunday.',
                'file_path'    => '',
                'publish_date' => date('Y-m-d'),
                'is_active'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('notices')->insertBatch($data);
    }
}
