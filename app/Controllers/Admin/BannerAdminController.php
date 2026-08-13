<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class BannerAdminController extends BaseController
{
    public function index()
    {
        $model = new BannerModel();
        $data = [
            'title'   => 'Manage Hero Banners & Carousel',
            'banners' => $model->orderBy('sort_order', 'ASC')->findAll(),
        ];
        return view('admin/banners/list', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Add New Hero Banner Slide',
            'banner' => null,
        ];
        return view('admin/banners/form', $data);
    }

    public function store()
    {
        $model = new BannerModel();

        $rules = [
            'headline' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/banners', $newName);
            $imagePath = 'uploads/banners/' . $newName;
        }

        $data = [
            'headline'       => $this->request->getPost('headline'),
            'subtext'        => $this->request->getPost('subtext'),
            'image'          => $imagePath ?: 'uploads/banners/hero_deposit_graphic.png',
            'cta_text'       => $this->request->getPost('cta_text'),
            'cta_link'       => $this->request->getPost('cta_link'),
            'image_position' => $this->request->getPost('image_position') ?: 'right',
            'sort_order'     => $this->request->getPost('sort_order') ?: 0,
            'is_active'      => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->insert($data);
        return redirect()->to('/admin/banners')->with('success', 'Hero banner slide added successfully!');
    }

    public function edit($id)
    {
        $model = new BannerModel();
        $banner = $model->find($id);

        if (!$banner) {
            return redirect()->to('/admin/banners')->with('error', 'Banner not found.');
        }

        $data = [
            'title'  => 'Edit Hero Banner Slide',
            'banner' => $banner,
        ];
        return view('admin/banners/form', $data);
    }

    public function update($id)
    {
        $model = new BannerModel();
        $banner = $model->find($id);

        if (!$banner) {
            return redirect()->to('/admin/banners')->with('error', 'Banner not found.');
        }

        $rules = [
            'headline' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = $banner['image'];
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/banners', $newName);
            $imagePath = 'uploads/banners/' . $newName;
        }

        $data = [
            'headline'       => $this->request->getPost('headline'),
            'subtext'        => $this->request->getPost('subtext'),
            'image'          => $imagePath,
            'cta_text'       => $this->request->getPost('cta_text'),
            'cta_link'       => $this->request->getPost('cta_link'),
            'image_position' => $this->request->getPost('image_position') ?: 'right',
            'sort_order'     => $this->request->getPost('sort_order') ?: 0,
            'is_active'      => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/banners')->with('success', 'Hero banner slide updated successfully!');
    }

    public function delete($id)
    {
        $model = new BannerModel();
        $model->delete($id);
        return redirect()->to('/admin/banners')->with('success', 'Hero banner slide deleted successfully!');
    }
}
