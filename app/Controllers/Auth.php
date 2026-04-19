<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/dashboard'));
        }
        return view('login_view');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model    = new PenggunaModel();
        $pengguna = $model->cariPengguna($username, $password);

        if ($pengguna) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $pengguna['username'],
                'role'       => $pengguna['role'],
            ]);
            return redirect()->to(base_url('index.php/dashboard'));
        }

        session()->setFlashdata('error', 'Identitas atau Kata Sandi salah!');
        return redirect()->to(base_url('index.php/'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('index.php/'));
    }
}