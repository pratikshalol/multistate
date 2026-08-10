<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\SettingModel;

class LoanController extends BaseController
{
    public function index()
    {
        $loanModel    = new LoanModel();
        $settingModel = new SettingModel();

        $data = [
            'loans'    => $loanModel->getActiveLoans(),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => 'Loan Products & Financial Solutions',
        ];

        return view('loans/list', $data);
    }

    public function show($slug)
    {
        $loanModel    = new LoanModel();
        $settingModel = new SettingModel();

        $loan = $loanModel->where('slug', $slug)->where('is_active', 1)->first();

        if (!$loan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Loan Product Not Found');
        }

        $data = [
            'loan'         => $loan,
            'other_loans'  => $loanModel->where('slug !=', $slug)->where('is_active', 1)->findAll(),
            'settings'     => $settingModel->getAllAsKeyValue(),
            'title'        => $loan['name'] . ' - Loan Details',
        ];

        return view('loans/single', $data);
    }
}
