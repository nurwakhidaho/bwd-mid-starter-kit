<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    // Karena belum pakai SQL, kita simpan data dummy di sini (sebagai Gudang Data)
    // TODO: TUGAS MAHASISWA!
    // Ubah struktur data menjadi data yang sesuai dengan produk startup kalian
    public function getDummyData()
    {
        return [
             [
                'id' => 1, 
                'name' => 'Mukena Silk Premium', 
                'price' => 350000, 
                'stock' => 15, 
                'category' => 'Ibadah', 
                'akad' => 'Murabahah'
            ],
            [
                'id' => 2, 
                'name' => 'Kurma Ajwa 1kg', 
                'price' => 180000, 
                'stock' => 40, 
                'category' => 'Makanan', 
                'akad' => 'Murabahah'
            ],
            [
                'id' => 3, 
                'name' => 'Madu Murni Al-Barokah', 
                'price' => 125000, 
                'stock' => 20, 
                'category' => 'Kesehatan', 
                'akad' => 'Murabahah'
            ],
            [
                'id' => 4, 
                'name' => 'E-Book Fiqih Muamalah', 
                'price' => 50000, 
                'stock' => 999, 
                'category' => 'Digital', 
                'akad' => 'Ijarah'
            ],
        ];
    }
}