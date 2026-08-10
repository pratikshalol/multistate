<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\BranchModel;
use App\Models\DepositModel;
use App\Models\LoanModel;
use App\Models\NoticeModel;
use App\Models\SettingModel;
use App\Models\TestimonialModel;

class Home extends BaseController
{
    public function index()
    {
        $bannerModel      = new BannerModel();
        $depositModel     = new DepositModel();
        $loanModel        = new LoanModel();
        $branchModel      = new BranchModel();
        $testimonialModel = new TestimonialModel();
        $noticeModel       = new NoticeModel();
        $settingModel     = new SettingModel();

        $data = [
            'banners'      => $bannerModel->getActiveBanners(),
            'deposits'     => $depositModel->getActivePlans(),
            'loans'        => $loanModel->getActiveLoans(),
            'branches'     => $branchModel->getActiveBranches(),
            'testimonials' => $testimonialModel->getActiveTestimonials(),
            'notices'      => $noticeModel->getActiveNotices(),
            'settings'     => $settingModel->getAllAsKeyValue(),
            'title'        => 'Home - Multistate Co-operative Credit Society',
        ];

        return view('home', $data);
    }
}
