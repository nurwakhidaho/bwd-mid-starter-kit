<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// --- HALAMAN PUBLIK (Bisa diakses tanpa login) ---
$routes->get('/', 'Auth::index');
$routes->post('auth/process', 'Auth::process');
$routes->get('auth/logout', 'Auth::logout');

// Tambahan Fitur Register (Halaman Publik)
$routes->get('register', 'Auth::register');
$routes->post('auth/register_process', 'Auth::register_process');


// --- HALAMAN PRIVATE (Dijaga oleh Filter Auth) ---
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('tambah', 'Dashboard::tambah');
    $routes->post('simpan', 'Dashboard::simpan');
    $routes->get('hapus/(:num)', 'Dashboard::hapus/$1');
    $routes->get('edit/(:num)', 'Dashboard::edit/$1');
    $routes->post('update/(:num)', 'Dashboard::update/$1');
});