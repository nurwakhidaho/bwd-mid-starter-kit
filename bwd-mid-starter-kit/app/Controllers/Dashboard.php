<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }

        $model = new ProductModel();

        $data = [
            'nama_startup' => 'Bazaar',
            'tagline'      => 'Belanja Berkah, Hidup Bermakna',
            'username'     => session()->get('username'),
            'products'     => $model->findAll(),
        ];

        return view('dashboard_view', $data);
    }

    public function tambah()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
        return view('tambah_produk');
    }

    public function simpan()
    {
        $model = new ProductModel();
        $model->save([
            'name'     => $this->request->getPost('name'),
            'price'    => $this->request->getPost('price'),
            'stock'    => $this->request->getPost('stock'),
            'akad'     => $this->request->getPost('akad'),
            'category' => $this->request->getPost('category'),
            'image'    => $this->request->getPost('image'),
        ]);
        session()->setFlashdata('success', 'Produk berhasil ditambahkan!');
        return redirect()->to(base_url('index.php/dashboard'));
    }

    public function hapus(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
        $model = new ProductModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Produk berhasil dihapus!');
        return redirect()->to(base_url('index.php/dashboard'));
    }

    public function edit(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
        $model = new ProductModel();
        $data = [
            'nama_startup' => 'Bazaar',
            'username'     => session()->get('username'),
            'produk'       => $model->find($id),
        ];
        return view('edit_produk', $data);
    }

    public function update(int $id)
    {
        $model = new ProductModel();
        $model->update($id, [
            'name'     => $this->request->getPost('name'),
            'price'    => $this->request->getPost('price'),
            'stock'    => $this->request->getPost('stock'),
            'akad'     => $this->request->getPost('akad'),
            'category' => $this->request->getPost('category'),
        ]);
        session()->setFlashdata('success', 'Produk berhasil diperbarui!');
        return redirect()->to(base_url('index.php/dashboard'));
    }
    
}