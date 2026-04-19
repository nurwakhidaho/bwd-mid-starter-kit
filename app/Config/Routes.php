<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Utama: Menuju halaman Login
$routes->get('/', 'Auth::index');

// Alur Autentikasi
$routes->post('auth/process', 'Auth::process');
$routes->get('auth/logout', 'Auth::logout');

// Halaman Katalog Marketplace
$routes->get('dashboard', 'Dashboard::index');

$routes->get('/tambah', 'Dashboard::tambah');
$routes->post('/simpan', 'Dashboard::simpan');
$routes->get('/hapus/(:num)', 'Dashboard::hapus/$1');

$routes->get('/edit/(:num)', 'Dashboard::edit/$1');
$routes->post('/update/(:num)', 'Dashboard::update/$1');