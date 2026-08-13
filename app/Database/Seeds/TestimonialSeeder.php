<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'       => 'Rajesh Sharma',
                'message'    => 'I have been an FD customer with Samarth Multistate for over 3 years. The 10.50% interest rate and monthly payout options have given my family complete financial peace of mind.',
                'photo'      => 'uploads/testimonials/user1.jpg',
                'rating'     => 5,
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Sunita Deshmukh',
                'message'    => 'The Pigmy daily deposit scheme is a game-changer for small business owners like me. The collection agent visits my store daily, making saving effortless!',
                'photo'      => 'uploads/testimonials/user2.jpg',
                'rating'     => 5,
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Vikram Joshi',
                'message'    => 'Got my Gold Loan sanctioned within 15 minutes at the Ahmednagar branch with very low interest rates. Excellent staff service and complete transparency.',
                'photo'      => 'uploads/testimonials/user3.jpg',
                'rating'     => 5,
                'is_active'  => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('testimonials')->insertBatch($data);
    }
}

