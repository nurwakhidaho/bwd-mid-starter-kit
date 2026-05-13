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


    // Tampilkan halaman form register
    public function registerForm()
    {
        // Kalau sudah login, tidak perlu ke halaman register
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/dashboard'));
        }
        return view('register_view');
    }


    // Proses data dari form register
    public function registerProcess()
    {
        $model = new PenggunaModel();

        // Ambil semua input dari form
        $nama            = $this->request->getPost('nama');
        $username        = $this->request->getPost('username');
        $password        = $this->request->getPost('password');
        $konfirmasiPass  = $this->request->getPost('konfirmasi_password');

        // --- Validasi Manual ---

        // Semua field wajib diisi
        if (empty($nama) || empty($username) || empty($password) || empty($konfirmasiPass)) {
            session()->setFlashdata('error', 'Semua field wajib diisi.');
            return redirect()->to(base_url('index.php/auth/register'));
        }

        // Password minimal 6 karakter
        if (strlen($password) < 6) {
            session()->setFlashdata('error', 'Password minimal 6 karakter.');
            return redirect()->to(base_url('index.php/auth/register'));
        }

        // Konfirmasi password harus cocok
        if ($password !== $konfirmasiPass) {
            session()->setFlashdata('error', 'Konfirmasi password tidak cocok.');
            return redirect()->to(base_url('index.php/auth/register'));
        }

        // Username harus unik — cek ke database
        if ($model->isUsernameExist($username)) {
            session()->setFlashdata('error', 'Username sudah digunakan. Pilih username lain.');
            return redirect()->to(base_url('index.php/auth/register'));
        }

        // --- Semua validasi lolos, simpan ke database ---

        // Hash password menggunakan SHA256, konsisten dengan sistem login lama
        $passwordHashed = hash('sha256', $password);

        $model->insert([
            'nama'     => $nama,
            'username' => $username,
            'password' => $passwordHashed,
            'role'     => 'user', // Role default untuk pengguna baru
        ]);

        // Registrasi berhasil — arahkan ke login dengan pesan sukses
        session()->setFlashdata('success', 'Akun berhasil dibuat! Silakan masuk.');
        return redirect()->to(base_url('index.php/'));
    }
}