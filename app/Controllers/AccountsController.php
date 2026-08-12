<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\SettingModel;

class AccountsController extends BaseController
{
    public function index()
    {
        $pageModel    = new PageModel();
        $settingModel = new SettingModel();

        $page = $pageModel->getBySlug('accounts');

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Page Not Found');
        }

        $data = [
            'page'     => $page,
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => $page['title'],
        ];

        return view('accounts/list', $data);
    }
}
