<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServiceAdminController extends BaseController
{
    /** Categories this controller is allowed to manage, and their labels/colors. */
    private array $categories = [
        'account' => ['label' => 'Account Services', 'color' => 'emerald'],
        'banking' => ['label' => 'Banking Services', 'color' => 'sky'],
    ];

    private function guardCategory(string $category): string
    {
        return array_key_exists($category, $this->categories) ? $category : 'account';
    }

    public function index($category = 'account')
    {
        $category = $this->guardCategory($category);
        $model    = new ServiceModel();

        $data = [
            'title'    => $this->categories[$category]['label'],
            'category' => $category,
            'color'    => $this->categories[$category]['color'],
            'services' => $model->getByCategory($category),
        ];

        return view('admin/services/list', $data);
    }

    public function create($category = 'account')
    {
        $category = $this->guardCategory($category);

        $data = [
            'title'    => 'Add ' . $this->categories[$category]['label'],
            'category' => $category,
            'color'    => $this->categories[$category]['color'],
            'service'  => null,
        ];

        return view('admin/services/form', $data);
    }

    public function store($category = 'account')
    {
        $category = $this->guardCategory($category);
        $model    = new ServiceModel();

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'category'    => $category,
            'icon'        => $this->request->getPost('icon'),
            'icon_color'  => $this->request->getPost('icon_color'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'features'    => $this->request->getPost('features'),
            'link_url'    => $this->request->getPost('link_url'),
            'link_text'   => $this->request->getPost('link_text'),
            'sort_order'  => (int) $this->request->getPost('sort_order') ?: 0,
            'is_active'   => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->insert($data);

        return redirect()->to('/admin/' . $category . '-services')
            ->with('success', $this->categories[$category]['label'] . ' item added successfully!');
    }

    public function edit($id)
    {
        $model   = new ServiceModel();
        $service = $model->find($id);

        if (!$service) {
            return redirect()->to('/admin/account-services')->with('error', 'Service not found.');
        }

        $category = $this->guardCategory($service['category']);

        $data = [
            'title'    => 'Edit ' . $this->categories[$category]['label'],
            'category' => $category,
            'color'    => $this->categories[$category]['color'],
            'service'  => $service,
        ];

        return view('admin/services/form', $data);
    }

    public function update($id)
    {
        $model   = new ServiceModel();
        $service = $model->find($id);

        if (!$service) {
            return redirect()->to('/admin/account-services')->with('error', 'Service not found.');
        }

        $category = $this->guardCategory($service['category']);

        $rules = [
            'title' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'icon'        => $this->request->getPost('icon'),
            'icon_color'  => $this->request->getPost('icon_color'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'features'    => $this->request->getPost('features'),
            'link_url'    => $this->request->getPost('link_url'),
            'link_text'   => $this->request->getPost('link_text'),
            'sort_order'  => (int) $this->request->getPost('sort_order') ?: 0,
            'is_active'   => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/' . $category . '-services')
            ->with('success', $this->categories[$category]['label'] . ' item updated successfully!');
    }

    public function delete($id)
    {
        $model   = new ServiceModel();
        $service = $model->find($id);

        if (!$service) {
            return redirect()->to('/admin/account-services')->with('error', 'Service not found.');
        }

        $category = $this->guardCategory($service['category']);
        $model->delete($id);

        return redirect()->to('/admin/' . $category . '-services')
            ->with('success', 'Item deleted successfully!');
    }
}
