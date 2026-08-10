<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountApplicationModel;
use App\Models\BannerModel;
use App\Models\BranchModel;
use App\Models\DepositModel;
use App\Models\EnquiryModel;
use App\Models\LoanModel;
use App\Models\NoticeModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $depositModel = new DepositModel();
        $loanModel    = new LoanModel();
        $branchModel  = new BranchModel();
        $accountModel = new AccountApplicationModel();
        $enquiryModel = new EnquiryModel();
        $bannerModel  = new BannerModel();
        $noticeModel   = new NoticeModel();

        $data = [
            'title'               => 'Admin Dashboard',
            'deposit_count'       => $depositModel->countAllResults(),
            'loan_count'          => $loanModel->countAllResults(),
            'branch_count'        => $branchModel->countAllResults(),
            'account_count'       => $accountModel->countAllResults(),
            'new_accounts'        => $accountModel->where('status', 'new')->countAllResults(),
            'enquiry_count'       => $enquiryModel->countAllResults(),
            'new_enquiries'       => $enquiryModel->where('status', 'new')->countAllResults(),
            'banner_count'        => $bannerModel->countAllResults(),
            'notice_count'        => $noticeModel->countAllResults(),
            'recent_applications' => $accountModel->orderBy('id', 'DESC')->findAll(5),
            'recent_enquiries'    => $enquiryModel->orderBy('id', 'DESC')->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }
}
