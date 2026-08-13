<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\ServiceModel;
use App\Models\SettingModel;

class AccountsController extends BaseController
{
    public function index()
    {
        $pageModel    = new PageModel();
        $serviceModel = new ServiceModel();
        $settingModel = new SettingModel();

        $page = $pageModel->getBySlug('accounts');

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Page Not Found');
        }

        $data = [
            'page'     => $page,
            'services' => $serviceModel->getActiveByCategory('account'),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => $page['title'],
        ];

        return view('accounts/list', $data);
    }
}
