<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DepositPlanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'              => 'Fixed Deposit (FD)',
                'slug'              => 'fixed-deposit',
                'short_description' => 'High-yield fixed term deposit plan with maximum returns and financial security.',
                'description'       => 'Our Fixed Deposit scheme offers attractive interest rates for terms ranging from 12 months to 60 months. Enjoy guaranteed returns, flexible payout options (monthly, quarterly, or on maturity), and loan facilities against your FD up to 90%.',
                'interest_rate'     => '10.50% p.a.',
                'min_amount'        => '₹ 5,000',
                'tenure'            => '12 to 60 Months',
                'image'             => 'uploads/deposits/fixed_deposit.jpg',
                'is_active'         => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Pigmy / Daily Deposit',
                'slug'              => 'pigmy-daily-deposit',
                'short_description' => 'Doorstep daily collection scheme tailored for small traders, shopkeepers, and daily earners.',
                'description'       => 'Save small daily amounts conveniently through our authorized doorstep collection agents. Pigmy deposit encourages small savings habits with competitive returns and flexible withdrawal terms after 12 months.',
                'interest_rate'     => '7.50% p.a.',
                'min_amount'        => '₹ 20 / day',
                'tenure'            => '12 Months',
                'image'             => 'uploads/deposits/pigmy_deposit.jpg',
                'is_active'         => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Pension Deposit Scheme',
                'slug'              => 'pension-deposit',
                'short_description' => 'Secure monthly income scheme designed for senior citizens and retired individuals.',
                'description'       => 'Deposit a lump sum amount and earn fixed monthly pension payments directly deposited to your savings account. Provides additional 0.50% bonus interest rate for senior citizens.',
                'interest_rate'     => '11.00% p.a.',
                'min_amount'        => '₹ 1,00,000',
                'tenure'            => '36 to 84 Months',
                'image'             => 'uploads/deposits/pension_deposit.jpg',
                'is_active'         => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'name'              => 'Future / Recurring Deposit',
                'slug'              => 'future-recurring-deposit',
                'short_description' => 'Disciplined monthly savings plan to build wealth step-by-step for future goals.',
                'description'       => 'Deposit a fixed amount every month and watch your savings multiply over time with compound interest. Ideal for children\'s education, marriage planning, or purchasing asset goals.',
                'interest_rate'     => '9.75% p.a.',
                'min_amount'        => '₹ 500 / month',
                'tenure'            => '12 to 60 Months',
                'image'             => 'uploads/deposits/recurring_deposit.jpg',
                'is_active'         => 1,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('deposit_plans')->insertBatch($data);
    }
}
