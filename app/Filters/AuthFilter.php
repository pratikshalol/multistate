<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $params = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'Please log in to access the admin panel.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $params = null)
    {
        // Do nothing after
    }
}
