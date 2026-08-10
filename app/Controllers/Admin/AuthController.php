<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login', ['title' => 'Admin Login']);
    }

    public function authenticate()
    {
        $adminModel = new AdminUserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $adminModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'admin_id'   => $user['id'],
                'admin_name' => $user['name'],
                'admin_email'=> $user['email'],
                'admin_role' => $user['role'],
                'isLoggedIn' => true,
            ];
            session()->set($sessionData);
            return redirect()->to('/admin/dashboard')->with('success', 'Welcome back, ' . $user['name']);
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid email address or password.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login')->with('success', 'Logged out successfully.');
    }
}
