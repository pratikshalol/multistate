<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LoanProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'               => 'Gold Loan',
                'slug'               => 'gold-loan',
                'short_description'  => 'Instant cash against your gold ornaments with minimal documentation and low interest rates.',
                'description'        => 'Unlock the true potential of your gold jewelry with Samarth Multistate Gold Loans. Fast 15-minute processing, secure vault storage, maximum loan value per gram, and hassle-free repayment options.',
                'max_percentage'     => 'Up to 85% of Gold Market Value',
                'interest_rate'      => '9.50% p.a.',
                'tenure'             => '1 to 12 Months',
                'eligibility'        => 'Any Indian resident aged 18 years and above owning gold ornaments.',
                'documents_required' => 'Aadhaar Card, PAN Card, Passport Size Photograph, Proof of Residence.',
                'image'              => 'uploads/loans/gold_loan.jpg',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'name'               => 'Property / Housing Loan',
                'slug'               => 'property-loan',
                'short_description'  => 'Fulfill your dream of building or buying a home or mortgaging property for business expansion.',
                'description'        => 'Attractive interest rates, higher loan amounts, and flexible repayment terms up to 15 years for residential property purchase, construction, renovation, or commercial property mortgage.',
                'max_percentage'     => 'Up to 75% of Property Valuation',
                'interest_rate'      => '11.00% p.a.',
                'tenure'             => '36 to 180 Months',
                'eligibility'        => 'Salaried individuals, self-employed businessmen, or professionals with verifiable income source.',
                'documents_required' => 'Property Title Deeds, Approved Construction Plan, Income Tax Returns (2 Years), Bank Statements (6 Months), KYC Documents.',
                'image'              => 'uploads/loans/property_loan.jpg',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'name'               => 'Two Wheeler Loan',
                'slug'               => 'two-wheeler-loan',
                'short_description'  => 'Easy financing options for purchasing your favorite motorcycle or scooter.',
                'description'        => 'Get quick approval and up to 90% financing on ex-showroom price for brand new 2-wheelers. Low processing fees and easy monthly EMI options.',
                'max_percentage'     => 'Up to 90% of On-Road Price',
                'interest_rate'      => '10.25% p.a.',
                'tenure'             => '12 to 36 Months',
                'eligibility'        => 'Salaried or self-employed individuals with minimum regular monthly income.',
                'documents_required' => 'Proforma Invoice of Vehicle, Aadhaar Card, PAN Card, Salary Slip / Bank Statement.',
                'image'              => 'uploads/loans/two_wheeler_loan.jpg',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
            [
                'name'               => 'Loan Against Deposit (LAD)',
                'slug'               => 'loan-against-deposit',
                'short_description'  => 'Instant liquidity without breaking your high-yield fixed deposits.',
                'description'        => 'Avail instant emergency loans against your existing Fixed Deposit (FD) or Recurring Deposit (RD) accounts with zero foreclosure penalty and minimal interest markup.',
                'max_percentage'     => 'Up to 90% of Deposit Amount',
                'interest_rate'      => '2.00% above Deposit Rate',
                'tenure'             => 'Up to Deposit Maturity Date',
                'eligibility'        => 'Existing Samarth Multistate FD/RD account holders.',
                'documents_required' => 'Original Deposit Receipt, Loan Application Form, KYC Verification.',
                'image'              => 'uploads/loans/loan_against_deposit.jpg',
                'is_active'          => 1,
                'created_at'         => date('Y-m-d H:i:s'),
                'updated_at'         => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('loan_products')->insertBatch($data);
    }
}

