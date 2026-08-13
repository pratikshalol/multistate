<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\ServiceModel;
use App\Models\SettingModel;

class BankingController extends BaseController
{
    public function index()
    {
        $pageModel    = new PageModel();
        $serviceModel = new ServiceModel();
        $settingModel = new SettingModel();

        $page = $pageModel->getBySlug('banking');

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Page Not Found');
        }

        $data = [
            'page'     => $page,
            'services' => $serviceModel->getActiveByCategory('banking'),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => $page['title'],
        ];

        return view('banking/list', $data);
    }
}
