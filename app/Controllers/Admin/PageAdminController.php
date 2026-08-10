<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PageModel;

class PageAdminController extends BaseController
{
    public function index()
    {
        $model = new PageModel();
        $data = [
            'title' => 'Manage Static Pages',
            'pages' => $model->orderBy('id', 'ASC')->findAll(),
        ];
        return view('admin/pages/list', $data);
    }

    public function edit($id)
    {
        $model = new PageModel();
        $page = $model->find($id);

        if (!$page) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }

        $data = [
            'title' => 'Edit Page: ' . $page['title'],
            'page'  => $page,
        ];
        return view('admin/pages/form', $data);
    }

    public function update($id)
    {
        $model = new PageModel();
        $page = $model->find($id);

        if (!$page) {
            return redirect()->to('/admin/pages')->with('error', 'Page not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
            'slug'  => 'required|min_length[2]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'            => $this->request->getPost('title'),
            'slug'             => url_title($this->request->getPost('slug'), '-', true),
            'content'          => $this->request->getPost('content'),
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/pages')->with('success', 'Page content updated successfully!');
    }
}
