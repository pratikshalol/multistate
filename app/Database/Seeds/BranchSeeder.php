<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'          => 'Main Head Office - Pune',
                'address'       => 'Samarth Multistate Tower, Commercial Complex, FC Road, Shivajinagar, Pune, Maharashtra 411005',
                'phone'         => '+91 020 2553 9000 / +91 98220 12345',
                'email'         => 'headoffice@Samarthmultistate.com',
                'working_hours' => 'Monday - Saturday: 10:00 AM to 5:30 PM (2nd & 4th Sat Holiday)',
                'latitude'      => '18.520430',
                'longitude'     => '73.856744',
                'is_active'     => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Ahmednagar Branch',
                'address'       => 'Plot No. 12, Station Road, Opp. Market Yard, Ahmednagar, Maharashtra 414001',
                'phone'         => '+91 0241 243 8899 / +91 98220 54321',
                'email'         => 'ahmednagar@Samarthmultistate.com',
                'working_hours' => 'Monday - Saturday: 10:00 AM to 5:30 PM',
                'latitude'      => '19.095208',
                'longitude'     => '74.749592',
                'is_active'     => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'name'          => 'Nashik City Branch',
                'address'       => 'Shop No. 4-6, Ground Floor, Sharanpur Road, Near Canada Corner, Nashik, Maharashtra 422002',
                'phone'         => '+91 0253 231 7700 / +91 98220 67890',
                'email'         => 'nashik@Samarthmultistate.com',
                'working_hours' => 'Monday - Saturday: 10:00 AM to 5:30 PM',
                'latitude'      => '20.005886',
                'longitude'     => '73.789803',
                'is_active'     => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('branches')->insertBatch($data);
    }
}
