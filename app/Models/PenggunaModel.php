<?php


namespace App\Models;


use CodeIgniter\Model;


class PenggunaModel extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';


    protected $allowedFields = [
        'username',
        'password',
        'role'
    ];


    // Cari pengguna berdasarkan username saja
    // Password dicek terpisah di Controller menggunakan hash SHA256
    public function cariPengguna(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }
}

