<?php

namespace App\Controllers;

use App\Models\AccountApplicationModel;
use App\Models\BranchModel;
use App\Models\SettingModel;

class AccountController extends BaseController
{
    public function index()
    {
        $branchModel  = new BranchModel();
        $settingModel = new SettingModel();

        $data = [
            'branches' => $branchModel->getActiveBranches(),
            'settings' => $settingModel->getAllAsKeyValue(),
            'title'    => 'Online Account Opening Application',
        ];

        return view('account-opening', $data);
    }

    public function submit()
    {
        $accountModel = new AccountApplicationModel();

        $rules = [
            'full_name'       => 'required|min_length[3]|max_length[255]',
            'mobile'          => 'required|min_length[10]|max_length[15]',
            'address'         => 'required',
            'account_type'    => 'required',
            'id_proof_type'   => 'required',
            'id_proof_number' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $idProofPath = null;
        $file = $this->request->getFile('id_proof_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/applications';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            $idProofPath = 'uploads/applications/' . $newName;
        }

        $data = [
            'full_name'       => $this->request->getPost('full_name'),
            'mobile'          => $this->request->getPost('mobile'),
            'email'           => $this->request->getPost('email'),
            'dob'             => $this->request->getPost('dob'),
            'address'         => $this->request->getPost('address'),
            'account_type'    => $this->request->getPost('account_type'),
            'branch_id'       => $this->request->getPost('branch_id'),
            'id_proof_type'   => $this->request->getPost('id_proof_type'),
            'id_proof_number' => $this->request->getPost('id_proof_number'),
            'id_proof_file'   => $idProofPath,
            'status'          => 'new',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $accountModel->insert($data);

        return redirect()->to('/account-opening')->with('success', 'Your online account application has been submitted successfully! Application reference saved. Our branch team will contact you shortly.');
    }
}
