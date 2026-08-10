<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('DepositPlanSeeder');
        $this->call('LoanProductSeeder');
        $this->call('BranchSeeder');
        $this->call('PageSeeder');
        $this->call('BannerSeeder');
        $this->call('SettingSeeder');
        $this->call('AdminUserSeeder');
        $this->call('TestimonialSeeder');
        $this->call('NoticeSeeder');
    }
}
