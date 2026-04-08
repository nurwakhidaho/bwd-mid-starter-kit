<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Menentukan halaman default ke Login
$routes->get('/', 'Auth::index');

// Route untuk fungsionalitas Auth
$routes->post('/auth/process', 'Auth::process');
$routes->get('/auth/logout', 'Auth::logout');

// Route untuk Dashboard
$routes->get('/dashboard', 'Dashboard::index');