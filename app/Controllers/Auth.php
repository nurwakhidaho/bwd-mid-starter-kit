<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, jangan kasih masuk ke halaman login lagi
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/dashboard'));
        }
        return view('login_view');
    }

    public function process()
    {
        $username      = $this->request->getPost('username');
        $passwordInput = $this->request->getPost('password');
        $passwordHashed = hash('sha256', $passwordInput);

        $model    = new PenggunaModel();
        $pengguna = $model->cariPengguna($username);

        if ($pengguna && $passwordHashed === $pengguna['password']) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $pengguna['username'],
                'role'       => $pengguna['role'],
            ]);
            return redirect()->to(base_url('index.php/dashboard'));
        }

        session()->setFlashdata('error', 'Username atau Password salah!');
        return redirect()->to(base_url('index.php/'));
    }

    // Menampilkan halaman pendaftaran
    public function register()
    {
        return view('register_view');
    }

    // Proses pendaftaran dengan fitur Email & Auto-Login
    public function register_process()
    {
        $model = new PenggunaModel();

        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // 1. Validasi: Cek apakah username sudah ada
        if ($model->cariPengguna($username)) {
            session()->setFlashdata('error', 'Username sudah terdaftar!');
            return redirect()->back()->withInput();
        }

        // 2. Siapkan data untuk simpan (Termasuk Email)
        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => hash('sha256', $password),
            'role'     => 'user'
        ];

        // 3. Simpan ke Database
        $model->save($data);

        // --- LOGIKA AUTO-LOGIN ---
        // 4. Set Session agar user tidak perlu login manual setelah daftar
        session()->set([
            'isLoggedIn' => true,
            'username'   => $username,
            'role'       => 'user',
        ]);

        // 5. Langsung ke Dashboard
        return redirect()->to(base_url('index.php/dashboard'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('index.php/'));
    }
}