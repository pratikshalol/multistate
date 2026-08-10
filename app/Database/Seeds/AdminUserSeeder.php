<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'       => 'Super Administrator',
            'email'      => 'admin@Samarthmultistate.com',
            'password'   => password_hash('Admin@123', PASSWORD_DEFAULT),
            'role'       => 'super_admin',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('admin_users')->insert($data);
    }
}
