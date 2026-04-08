<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    /**
     * Data dummy untuk simulasi marketplace Bazaar.
     * Sudah dilengkapi URL gambar untuk tampilan katalog.
     */
    public function getDummyData(): array
    {
        return [
            ['id' => 1, 'name' => 'Mukena Silk Premium Special', 'price' => 450000, 'stock' => 12, 'category' => 'Busana', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1585036156171-384164a8c675?w=500'],
            ['id' => 2, 'name' => 'Kurma Ajwa Madinah 1kg', 'price' => 220000, 'stock' => 50, 'category' => 'Makanan', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1596450514735-e11a9fa0eedd?w=500'],
            ['id' => 3, 'name' => 'Madu Murni Hutan Sumbawa', 'price' => 135000, 'stock' => 25, 'category' => 'Kesehatan', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1587049352847-4d4b1ed7ec1d?w=500'],
            ['id' => 4, 'name' => 'Sajadah Turki Anti Slip', 'price' => 320000, 'stock' => 15, 'category' => 'Ibadah', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?w=500'],
            ['id' => 5, 'name' => 'E-Book Fiqih Muamalah Digital', 'price' => 75000, 'stock' => 999, 'category' => 'Digital', 'akad' => 'Ijarah', 'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=500'],
            ['id' => 6, 'name' => 'Habbatussauda 210 Kapsul', 'price' => 95000, 'stock' => 40, 'category' => 'Kesehatan', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1611078518335-502a50682283?w=500'],
            ['id' => 7, 'name' => 'Gamis Pria Linen Modern', 'price' => 275000, 'stock' => 20, 'category' => 'Busana', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1589310065099-b1d5a6c117d0?w=500'],
            ['id' => 8, 'name' => 'Al-Quran Terjemah Per Kata', 'price' => 115000, 'stock' => 30, 'category' => 'Ibadah', 'akad' => 'Murabahah', 'image' => 'https://images.unsplash.com/photo-1604085572502-b2d39230ee9e?w=500'],
        ];
    }
}