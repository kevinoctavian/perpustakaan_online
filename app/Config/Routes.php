<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/**
 * rute untuk autentikasi 
 */
$routes->match(['get', 'post'], 'register', 'UserAuth::registerPage');
$routes->match(['get', 'post'], 'login', 'UserAuth::loginPage');
$routes->get('logout', 'UserAuth::logout', ['filter' => 'auth']);


/**
 * rute ini untuk meembuat mengarahkan fitur menambakan fitur : judul, nama pengarang, penerbit, dan jumlah stok*/ 
$routes->get('book', 'Book::buku');
$routes->group('api/book',  ['filter' => 'auth'], function ($routes) {
    
});