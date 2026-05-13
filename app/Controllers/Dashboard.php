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
    // Gunakan method helper yang sudah kita buat:
    $namaGambar = $this->_prosesUploadGambar();
    // Jika tidak ada gambar di-upload, namaGambar akan null — itu wajar untuk tambah produk

    $model = new ProductModel();
    $model->save([
        'name'     => $this->request->getPost('name'),
        'price'    => $this->request->getPost('price'),
        'stock'    => $this->request->getPost('stock'),
        'akad'     => $this->request->getPost('akad'),
        'category' => $this->request->getPost('category'),
        'image'    => $namaGambar,   // bisa null jika tidak ada gambar
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
        if (!empty($produk['image']) && file_exists(FCPATH . 'uploads/produk/' . $produk['image'])) {
            @unlink(FCPATH . 'uploads/produk/' . $produk['image']);
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

    // SETELAH refactoring — satu baris ini menggantikan seluruh blok upload:
    $namaGambarBaru = $this->_prosesUploadGambar();

    // Jika tidak ada gambar baru di-upload, gunakan gambar lama dari database
    if ($namaGambarBaru === null) {
        $namaGambarBaru = $produkLama['image'];
    } else {
        // Ada gambar baru — hapus file foto lama agar folder tidak penuh
        if (!empty($produkLama['image']) && file_exists(FCPATH . 'uploads/produk/' . $produkLama['image'])) {
            @unlink(FCPATH . 'uploads/produk/' . $produkLama['image']);
        }
    }

    $model->update($id, [
        'name'     => $this->request->getPost('name'),
        'price'    => $this->request->getPost('price'),
        'stock'    => $this->request->getPost('stock'),
        'akad'     => $this->request->getPost('akad'),
        'category' => $this->request->getPost('category'),
        'image'    => $namaGambarBaru,
    ]);

    session()->setFlashdata('success', 'Produk berhasil diperbarui!');
    return redirect()->to(base_url('index.php/dashboard'));
}



/**
 * Method privat untuk memproses upload gambar produk.
 * Mengimplementasikan prinsip SRP (Single Responsibility Principle).
 *
 * @return string|null Nama file baru jika upload berhasil, null jika tidak ada file.
 */
private function _prosesUploadGambar(): ?string
{
    $gambar = $this->request->getFile('image');

    // Cek: apakah ada file yang di-upload, valid, dan belum dipindahkan?
    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {

        // Buat nama file unik agar tidak bentrok dengan file lain
 $namaFileBaru = $gambar->getRandomName();

        // KRUSIAL: gunakan FCPATH (bukan ROOTPATH) agar masuk ke public/uploads/produk/
        $gambar->move(FCPATH . 'uploads/produk/', $namaFileBaru);

        return $namaFileBaru; // Kembalikan nama file untuk disimpan ke database
    }

    return null; // Tidak ada gambar yang di-upload
}


} 