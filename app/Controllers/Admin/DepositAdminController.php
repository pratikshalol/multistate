<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepositModel;

class DepositAdminController extends BaseController
{
    public function index()
    {
        $depositModel = new DepositModel();
        $data = [
            'title'    => 'Manage Deposit Plans',
            'deposits' => $depositModel->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/deposits/list', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Add New Deposit Plan',
            'deposit' => null,
        ];
        return view('admin/deposits/form', $data);
    }

    public function store()
    {
        $depositModel = new DepositModel();

        $rules = [
            'name'          => 'required|min_length[3]|max_length[255]',
            'interest_rate' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/deposits', $newName);
            $imagePath = 'uploads/deposits/' . $newName;
        }

        $slug = url_title($this->request->getPost('name'), '-', true);

        $depositData = [
            'name'              => $this->request->getPost('name'),
            'slug'              => $slug,
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'interest_rate'     => $this->request->getPost('interest_rate'),
            'min_amount'        => $this->request->getPost('min_amount'),
            'tenure'            => $this->request->getPost('tenure'),
            'image'             => $imagePath,
            'is_active'         => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $depositModel->insert($depositData);
        return redirect()->to('/admin/deposits')->with('success', 'Deposit plan created successfully!');
    }

    public function edit($id)
    {
        $depositModel = new DepositModel();
        $deposit = $depositModel->find($id);

        if (!$deposit) {
            return redirect()->to('/admin/deposits')->with('error', 'Deposit plan not found.');
        }

        $data = [
            'title'   => 'Edit Deposit Plan',
            'deposit' => $deposit,
        ];
        return view('admin/deposits/form', $data);
    }

    public function update($id)
    {
        $depositModel = new DepositModel();
        $deposit = $depositModel->find($id);

        if (!$deposit) {
            return redirect()->to('/admin/deposits')->with('error', 'Deposit plan not found.');
        }

        $rules = [
            'name'          => 'required|min_length[3]|max_length[255]',
            'interest_rate' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = $deposit['image'];
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/deposits', $newName);
            $imagePath = 'uploads/deposits/' . $newName;
        }

        $slug = url_title($this->request->getPost('name'), '-', true);

        $depositData = [
            'name'              => $this->request->getPost('name'),
            'slug'              => $slug,
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'interest_rate'     => $this->request->getPost('interest_rate'),
            'min_amount'        => $this->request->getPost('min_amount'),
            'tenure'            => $this->request->getPost('tenure'),
            'image'             => $imagePath,
            'is_active'         => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $depositModel->update($id, $depositData);
        return redirect()->to('/admin/deposits')->with('success', 'Deposit plan updated successfully!');
    }

    public function delete($id)
    {
        $depositModel = new DepositModel();
        $depositModel->delete($id);
        return redirect()->to('/admin/deposits')->with('success', 'Deposit plan deleted successfully!');
    }
}
