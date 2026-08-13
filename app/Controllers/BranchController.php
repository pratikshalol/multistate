<?php

namespace App\Controllers;

use App\Models\BranchModel;
use App\Models\SettingModel;

class BranchController extends BaseController
{
    public function index()
    {
        $branchModel  = new BranchModel();
        $settingModel = new SettingModel();

        $data = [
            'branches' => $branchModel->getActiveBranches(),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => 'Our Branch Network & Locations',
        ];

        return view('branches', $data);
    }
}
