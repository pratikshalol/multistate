<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LoanModel;

class LoanAdminController extends BaseController
{
    public function index()
    {
        $loanModel = new LoanModel();
        $data = [
            'title' => 'Manage Loan Products',
            'loans' => $loanModel->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/loans/list', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Loan Product',
            'loan'  => null,
        ];
        return view('admin/loans/form', $data);
    }

    public function store()
    {
        $loanModel = new LoanModel();

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
            $file->move(FCPATH . 'uploads/loans', $newName);
            $imagePath = 'uploads/loans/' . $newName;
        }

        $slug = url_title($this->request->getPost('name'), '-', true);

        $loanData = [
            'name'               => $this->request->getPost('name'),
            'slug'               => $slug,
            'short_description'  => $this->request->getPost('short_description'),
            'description'        => $this->request->getPost('description'),
            'max_percentage'     => $this->request->getPost('max_percentage'),
            'interest_rate'      => $this->request->getPost('interest_rate'),
            'tenure'             => $this->request->getPost('tenure'),
            'eligibility'        => $this->request->getPost('eligibility'),
            'documents_required' => $this->request->getPost('documents_required'),
            'image'              => $imagePath,
            'is_active'          => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $loanModel->insert($loanData);
        return redirect()->to('/admin/loans')->with('success', 'Loan product created successfully!');
    }

    public function edit($id)
    {
        $loanModel = new LoanModel();
        $loan = $loanModel->find($id);

        if (!$loan) {
            return redirect()->to('/admin/loans')->with('error', 'Loan product not found.');
        }

        $data = [
            'title' => 'Edit Loan Product',
            'loan'  => $loan,
        ];
        return view('admin/loans/form', $data);
    }

    public function update($id)
    {
        $loanModel = new LoanModel();
        $loan = $loanModel->find($id);

        if (!$loan) {
            return redirect()->to('/admin/loans')->with('error', 'Loan product not found.');
        }

        $rules = [
            'name'          => 'required|min_length[3]|max_length[255]',
            'interest_rate' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = $loan['image'];
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/loans', $newName);
            $imagePath = 'uploads/loans/' . $newName;
        }

        $slug = url_title($this->request->getPost('name'), '-', true);

        $loanData = [
            'name'               => $this->request->getPost('name'),
            'slug'               => $slug,
            'short_description'  => $this->request->getPost('short_description'),
            'description'        => $this->request->getPost('description'),
            'max_percentage'     => $this->request->getPost('max_percentage'),
            'interest_rate'      => $this->request->getPost('interest_rate'),
            'tenure'             => $this->request->getPost('tenure'),
            'eligibility'        => $this->request->getPost('eligibility'),
            'documents_required' => $this->request->getPost('documents_required'),
            'image'              => $imagePath,
            'is_active'          => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $loanModel->update($id, $loanData);
        return redirect()->to('/admin/loans')->with('success', 'Loan product updated successfully!');
    }

    public function delete($id)
    {
        $loanModel = new LoanModel();
        $loanModel->delete($id);
        return redirect()->to('/admin/loans')->with('success', 'Loan product deleted successfully!');
    }
}
