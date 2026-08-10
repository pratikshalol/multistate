<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class SettingsController extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        $data = [
            'title'    => 'Site Settings',
            'settings' => $settingModel->getAllAsKeyValue(),
        ];
        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $settingModel = new SettingModel();

        $posts = $this->request->getPost();
        foreach ($posts as $key => $value) {
            if ($key !== 'csrf_test_name') {
                $settingModel->setKeyValue($key, $value);
            }
        }

        // Handle logo upload
        $logoFile = $this->request->getFile('logo');
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $newName = $logoFile->getRandomName();
            $logoFile->move(FCPATH . 'uploads/settings', $newName);
            $settingModel->setKeyValue('logo', 'uploads/settings/' . $newName);
        }

        return redirect()->to('/admin/settings')->with('success', 'Site settings updated successfully!');
    }
}
