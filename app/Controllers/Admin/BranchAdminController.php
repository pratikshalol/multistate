<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BranchModel;

class BranchAdminController extends BaseController
{
    public function index()
    {
        $branchModel = new BranchModel();
        $data = [
            'title'    => 'Manage Branches',
            'branches' => $branchModel->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/branches/list', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Add New Branch',
            'branch' => null,
        ];
        return view('admin/branches/form', $data);
    }

    public function store()
    {
        $branchModel = new BranchModel();

        $rules = [
            'name'    => 'required|min_length[3]|max_length[255]',
            'address' => 'required',
            'phone'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $branchData = [
            'name'          => $this->request->getPost('name'),
            'address'       => $this->request->getPost('address'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email'),
            'working_hours' => $this->request->getPost('working_hours'),
            'latitude'      => $this->request->getPost('latitude'),
            'longitude'     => $this->request->getPost('longitude'),
            'is_active'     => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $branchModel->insert($branchData);
        return redirect()->to('/admin/branches')->with('success', 'Branch created successfully!');
    }

    public function edit($id)
    {
        $branchModel = new BranchModel();
        $branch = $branchModel->find($id);

        if (!$branch) {
            return redirect()->to('/admin/branches')->with('error', 'Branch not found.');
        }

        $data = [
            'title'  => 'Edit Branch',
            'branch' => $branch,
        ];
        return view('admin/branches/form', $data);
    }

    public function update($id)
    {
        $branchModel = new BranchModel();
        $branch = $branchModel->find($id);

        if (!$branch) {
            return redirect()->to('/admin/branches')->with('error', 'Branch not found.');
        }

        $rules = [
            'name'    => 'required|min_length[3]|max_length[255]',
            'address' => 'required',
            'phone'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $branchData = [
            'name'          => $this->request->getPost('name'),
            'address'       => $this->request->getPost('address'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email'),
            'working_hours' => $this->request->getPost('working_hours'),
            'latitude'      => $this->request->getPost('latitude'),
            'longitude'     => $this->request->getPost('longitude'),
            'is_active'     => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $branchModel->update($id, $branchData);
        return redirect()->to('/admin/branches')->with('success', 'Branch updated successfully!');
    }

    public function delete($id)
    {
        $branchModel = new BranchModel();
        $branchModel->delete($id);
        return redirect()->to('/admin/branches')->with('success', 'Branch deleted successfully!');
    }
}
