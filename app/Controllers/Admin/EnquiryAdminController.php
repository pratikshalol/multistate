<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;

class EnquiryAdminController extends BaseController
{
    public function index()
    {
        $model = new EnquiryModel();
        $data = [
            'title'     => 'Manage Form Submissions & Enquiries',
            'enquiries' => $model->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/enquiries/list', $data);
    }

    public function view($id)
    {
        $model = new EnquiryModel();
        $enquiry = $model->find($id);

        if (!$enquiry) {
            return redirect()->to('/admin/enquiries')->with('error', 'Enquiry not found.');
        }

        if ($enquiry['status'] === 'new') {
            $model->update($id, ['status' => 'viewed']);
        }

        $data = [
            'title'   => 'Enquiry Details #' . $id,
            'enquiry' => $enquiry,
        ];
        return view('admin/enquiries/view', $data);
    }

    public function delete($id)
    {
        $model = new EnquiryModel();
        $model->delete($id);
        return redirect()->to('/admin/enquiries')->with('success', 'Enquiry deleted successfully!');
    }
}
