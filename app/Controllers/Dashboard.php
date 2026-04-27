<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Dashboard extends BaseController
{
    // --- Tampilkan Halaman Utama Dashboard ---
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

    // --- Tampilkan Form Tambah Produk ---
    public function tambah()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
        return view('tambah_produk');
    }

    // --- Simpan Produk Baru (Termasuk Upload Foto) ---
    public function simpan()
    {
        $model = new ProductModel();
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = null;

        // Logika upload jika ada file
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/produk/', $namaGambar);
        }

        $model->save([
            'name'     => $this->request->getPost('name'),
            'price'    => $this->request->getPost('price'),
            'stock'    => $this->request->getPost('stock'),
            'akad'     => $this->request->getPost('akad'),
            'category' => $this->request->getPost('category'),
            'image'    => $namaGambar, // Sesuai kolom database Anda
        ]);

        session()->setFlashdata('success', 'Produk berhasil ditambahkan!');
        return redirect()->to(base_url('index.php/dashboard'));
    }

    // --- Hapus Produk & File Gambarnya ---
    public function hapus(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
        $model = new ProductModel();
        $produk = $model->find($id);

        // Hapus file fisik gambar jika ada
        if (!empty($produk['image']) && file_exists('uploads/produk/' . $produk['image'])) {
            @unlink('uploads/produk/' . $produk['image']);
        }

        $model->delete($id);
        session()->setFlashdata('success', 'Produk berhasil dihapus!');
        return redirect()->to(base_url('index.php/dashboard'));
    }

    // --- Tampilkan Form Edit ---
    public function edit(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
        $model = new ProductModel();
        $data  = [
            'nama_startup' => 'Bazaar',
            'username'     => session()->get('username'),
            'produk'       => $model->find($id),
        ];
        return view('edit_produk', $data);
    }

    // --- Perbarui Data Produk & Ganti Foto ---
    public function update(int $id)
    {
        $model = new ProductModel();
        $produkLama = $model->find($id);

        // Ambil file dari input name="gambar" di view
        $fileGambar = $this->request->getFile('gambar');
        $namaGambarBaru = $produkLama['image'];

        // Cek jika user mengunggah file baru
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('uploads/produk/', $namaGambarBaru);

            // Hapus file foto lama agar folder tidak penuh
            if (!empty($produkLama['image']) && file_exists('uploads/produk/' . $produkLama['image'])) {
                @unlink('uploads/produk/' . $produkLama['image']);
            }
        }

        $model->update($id, [
            'name'     => $this->request->getPost('name'),
            'price'    => $this->request->getPost('price'),
            'stock'    => $this->request->getPost('stock'),
            'akad'     => $this->request->getPost('akad'),
            'category' => $this->request->getPost('category'),
            'image'    => $namaGambarBaru, // Tetap gunakan 'image' sesuai struktur DB
        ]);

        session()->setFlashdata('success', 'Produk berhasil diperbarui!');
        return redirect()->to(base_url('index.php/dashboard'));
    }
}