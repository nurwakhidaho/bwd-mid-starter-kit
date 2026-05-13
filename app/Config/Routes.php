<?php


use CodeIgniter\Router\RouteCollection;


/** @var RouteCollection $routes */


// Halaman publik: Login
$routes->get('/', 'Auth::index');
$routes->post('auth/process', 'Auth::process');
$routes->get('auth/logout', 'Auth::logout');

// Halaman publik: Register (tambahan baru)
$routes->get('auth/register', 'Auth::registerForm');
$routes->post('auth/register/process', 'Auth::registerProcess');


// Halaman yang DIJAGA oleh filter auth (harus login dulu)
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/tambah', 'Dashboard::tambah', ['filter' => 'auth']);
$routes->post('/simpan', 'Dashboard::simpan', ['filter' => 'auth']);
$routes->get('/hapus/(:num)', 'Dashboard::hapus/$1', ['filter' => 'auth']);
$routes->get('/edit/(:num)', 'Dashboard::edit/$1', ['filter' => 'auth']);
$routes->post('/update/(:num)', 'Dashboard::update/$1', ['filter' => 'auth']);