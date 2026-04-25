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
        $username      = $this->request->getPost('username');
        $passwordInput = $this->request->getPost('password');


        // Hash password yang diketik user menggunakan SHA256
        // Hasilnya akan sama persis dengan hash yang tersimpan di database
        $passwordHashed = hash('sha256', $passwordInput);


        $model    = new PenggunaModel();
        // Ambil data pengguna berdasarkan username saja
        $pengguna = $model->cariPengguna($username);


        // Cek: apakah user ada DAN hash password cocok?
        if ($pengguna && $passwordHashed === $pengguna['password']) {
            // Login berhasil — buat session ID Card
            session()->set([
                'isLoggedIn' => true,
                'username'   => $pengguna['username'],
                'role'       => $pengguna['role'],
            ]);
            return redirect()->to(base_url('index.php/dashboard'));
        }


        // Login gagal — kirim pesan error
        session()->setFlashdata('error', 'Username atau Password salah!');
        return redirect()->to(base_url('index.php/'));
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('index.php/'));
    }
}

