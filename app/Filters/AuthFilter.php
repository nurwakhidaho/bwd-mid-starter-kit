<?php


namespace App\Filters;


use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah session isLoggedIn ada
        // Kalau tidak ada (belum login), tendang ke halaman login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/'));
        }
    }


    public function after(
        RequestInterface  $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Kosongkan — tidak perlu aksi setelah response
    }
}

