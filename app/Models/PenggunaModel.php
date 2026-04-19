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

    public function cariPengguna(string $username, string $password): ?array
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->first();
    }
}