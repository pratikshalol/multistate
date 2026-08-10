<?php

namespace App\Controllers;

use App\Models\PageModel;
use App\Models\SettingModel;

class PageController extends BaseController
{
    public function show($slug)
    {
        $pageModel    = new PageModel();
        $settingModel = new SettingModel();

        $page = $pageModel->getBySlug($slug);

        if (!$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Page Not Found');
        }

        $data = [
            'page'     => $page,
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => $page['title'],
        ];

        return view('page', $data);
    }
}
