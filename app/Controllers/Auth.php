<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, paksa ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/dashboard'));
        }
        return view('login_view');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Kredensial sesuai instruksi: admin / bisnis123
        if ($username === 'admin' && $password === 'bisnis123') {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $username,
                'role'       => 'Administrator'
            ]);
            // Redirect absolut ke dashboard untuk menghindari bug XAMPP
            return redirect()->to(base_url('index.php/dashboard'));
        } else {
            session()->setFlashdata('error', 'Identitas atau Kata Sandi salah!');
            return redirect()->to(base_url('index.php/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('index.php/'));
    }
}