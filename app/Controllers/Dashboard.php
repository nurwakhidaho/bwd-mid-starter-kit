<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Proteksi Halaman: Jika belum login, tendang ke login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }

        $model = new ProductModel();
        
        $data = [
            'nama_startup' => 'Bazaar',
            'tagline'      => 'Belanja Berkah, Hidup Bermakna',
            'username'     => session()->get('username'),
            'products'     => $model->getDummyData()
        ];

        return view('dashboard_view', $data);
    }
}