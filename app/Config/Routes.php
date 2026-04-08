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