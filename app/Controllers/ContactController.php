<?php

namespace App\Controllers;

use App\Models\BranchModel;
use App\Models\EnquiryModel;
use App\Models\SettingModel;

class ContactController extends BaseController
{
    public function index()
    {
        $branchModel  = new BranchModel();
        $settingModel = new SettingModel();

        $data = [
            'branches' => $branchModel->getActiveBranches(),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => 'Contact Us & Enquiry',
        ];

        return view('contact', $data);
    }

    public function submit()
    {
        $enquiryModel = new EnquiryModel();

        $rules = [
            'name'    => 'required|min_length[2]|max_length[255]',
            'phone'   => 'required|min_length[10]',
            'message' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $enquiryData = [
            'name'            => $this->request->getPost('name'),
            'phone'           => $this->request->getPost('phone'),
            'email'           => $this->request->getPost('email'),
            'message'         => $this->request->getPost('message'),
            'related_product' => $this->request->getPost('related_product'),
            'status'          => 'new',
            'created_at'      => date('Y-m-d H:i:s'),
        ];

        $enquiryModel->insert($enquiryData);

        return redirect()->to('/contact')->with('success', 'Thank you for reaching out! Our branch team will get back to you shortly.');
    }
}
