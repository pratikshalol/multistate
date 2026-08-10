<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountApplicationModel;
use App\Models\BranchModel;

class AccountApplicationAdminController extends BaseController
{
    public function index()
    {
        $accountModel = new AccountApplicationModel();
        $applications = $accountModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'title'        => 'Manage Account Applications',
            'applications' => $applications,
        ];
        return view('admin/accounts/list', $data);
    }

    public function view($id)
    {
        $accountModel = new AccountApplicationModel();
        $branchModel  = new BranchModel();

        $application = $accountModel->find($id);

        if (!$application) {
            return redirect()->to('/admin/accounts')->with('error', 'Account application not found.');
        }

        $branch = null;
        if (!empty($application['branch_id'])) {
            $branch = $branchModel->find($application['branch_id']);
        }

        $data = [
            'title'       => 'Account Application Details #' . $id,
            'application' => $application,
            'branch'      => $branch,
        ];
        return view('admin/accounts/view', $data);
    }

    public function updateStatus($id)
    {
        $accountModel = new AccountApplicationModel();

        $status = $this->request->getPost('status');
        if (in_array($status, ['new', 'contacted', 'approved', 'rejected'])) {
            $accountModel->update($id, [
                'status'     => $status,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->to('/admin/accounts/view/' . $id)->with('success', 'Application status updated to: ' . ucfirst($status));
        }

        return redirect()->back()->with('error', 'Invalid status selected.');
    }

    public function delete($id)
    {
        $accountModel = new AccountApplicationModel();
        $accountModel->delete($id);
        return redirect()->to('/admin/accounts')->with('success', 'Account application deleted successfully!');
    }
}
