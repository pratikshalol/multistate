<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NoticeModel;

class NoticeAdminController extends BaseController
{
    public function index()
    {
        $model = new NoticeModel();
        $data = [
            'title'   => 'Manage Notices & Announcements',
            'notices' => $model->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/notices/list', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Add Notice',
            'notice' => null,
        ];
        return view('admin/notices/form', $data);
    }

    public function store()
    {
        $model = new NoticeModel();

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $filePath = null;
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/notices', $newName);
            $filePath = 'uploads/notices/' . $newName;
        }

        $data = [
            'title'        => $this->request->getPost('title'),
            'description'  => $this->request->getPost('description'),
            'file_path'    => $filePath,
            'publish_date' => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'is_active'    => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->insert($data);
        return redirect()->to('/admin/notices')->with('success', 'Notice published successfully!');
    }

    public function edit($id)
    {
        $model = new NoticeModel();
        $notice = $model->find($id);

        if (!$notice) {
            return redirect()->to('/admin/notices')->with('error', 'Notice not found.');
        }

        $data = [
            'title'  => 'Edit Notice',
            'notice' => $notice,
        ];
        return view('admin/notices/form', $data);
    }

    public function update($id)
    {
        $model = new NoticeModel();
        $notice = $model->find($id);

        if (!$notice) {
            return redirect()->to('/admin/notices')->with('error', 'Notice not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $filePath = $notice['file_path'];
        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/notices', $newName);
            $filePath = 'uploads/notices/' . $newName;
        }

        $data = [
            'title'        => $this->request->getPost('title'),
            'description'  => $this->request->getPost('description'),
            'file_path'    => $filePath,
            'publish_date' => $this->request->getPost('publish_date') ?: date('Y-m-d'),
            'is_active'    => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/notices')->with('success', 'Notice updated successfully!');
    }

    public function delete($id)
    {
        $model = new NoticeModel();
        $model->delete($id);
        return redirect()->to('/admin/notices')->with('success', 'Notice deleted successfully!');
    }
}
