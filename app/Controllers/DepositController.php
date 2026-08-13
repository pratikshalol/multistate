<?php

namespace App\Controllers;

use App\Models\DepositModel;
use App\Models\SettingModel;

class DepositController extends BaseController
{
    public function index()
    {
        $depositModel = new DepositModel();
        $settingModel = new SettingModel();

        $data = [
            'deposits' => $depositModel->getActivePlans(),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => 'Deposit Schemes & Plans',
        ];

        return view('deposits/list', $data);
    }

    public function show($slug)
    {
        $depositModel = new DepositModel();
        $settingModel = new SettingModel();

        $deposit = $depositModel->where('slug', $slug)->where('is_active', 1)->first();

        if (!$deposit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Deposit Scheme Not Found');
        }

        $data = [
            'deposit'       => $deposit,
            'other_plans'   => $depositModel->where('slug !=', $slug)->where('is_active', 1)->findAll(),
            'settings'      => $settingModel->getAllAsKeyValue(),
            'title'         => $deposit['name'] . ' - Deposit Scheme',
        ];

        return view('deposits/single', $data);
    }
}
