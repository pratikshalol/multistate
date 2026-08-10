<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class TestimonialAdminController extends BaseController
{
    public function index()
    {
        $model = new TestimonialModel();
        $data = [
            'title'        => 'Manage Testimonials',
            'testimonials' => $model->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/testimonials/list', $data);
    }

    public function create()
    {
        $data = [
            'title'       => 'Add Testimonial',
            'testimonial' => null,
        ];
        return view('admin/testimonials/form', $data);
    }

    public function store()
    {
        $model = new TestimonialModel();

        $rules = [
            'name'    => 'required|min_length[2]|max_length[255]',
            'message' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $photoPath = null;
        $file = $this->request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/testimonials', $newName);
            $photoPath = 'uploads/testimonials/' . $newName;
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'message'   => $this->request->getPost('message'),
            'photo'     => $photoPath,
            'rating'    => $this->request->getPost('rating') ?? 5,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->insert($data);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial created successfully!');
    }

    public function edit($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);

        if (!$testimonial) {
            return redirect()->to('/admin/testimonials')->with('error', 'Testimonial not found.');
        }

        $data = [
            'title'       => 'Edit Testimonial',
            'testimonial' => $testimonial,
        ];
        return view('admin/testimonials/form', $data);
    }

    public function update($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);

        if (!$testimonial) {
            return redirect()->to('/admin/testimonials')->with('error', 'Testimonial not found.');
        }

        $rules = [
            'name'    => 'required|min_length[2]|max_length[255]',
            'message' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $photoPath = $testimonial['photo'];
        $file = $this->request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/testimonials', $newName);
            $photoPath = 'uploads/testimonials/' . $newName;
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'message'   => $this->request->getPost('message'),
            'photo'     => $photoPath,
            'rating'    => $this->request->getPost('rating') ?? 5,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial updated successfully!');
    }

    public function delete($id)
    {
        $model = new TestimonialModel();
        $model->delete($id);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial deleted successfully!');
    }
}
