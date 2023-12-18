<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about', 'AboutController::index');
$routes->get('contact', 'ContactController::index');
$routes->get('search', 'SearchController::index');

$routes->group(
  'books',
  ['namespace' => '\App\Controllers\Books'],
  static function (RouteCollection $routes) {
    $routes->get('/', 'BooksController::index');
  }
);

service('auth')->routes($routes, ['except' => ['login', 'register']]);

/**
 * authtentication and autozion routes
 */

$routes->group(
  '',
  ['namespace' => '\App\Controllers\Auth'],
  static function (RouteCollection $routes) {
    $routes->get('register', 'RegisterController::registerView');
    $routes->post('register', 'RegisterController::postRegister');

    $routes->get('login', 'LoginController::loginView');
    $routes->post('login', 'LoginController::postLogin');
  }
);
/** Admin page routes */
$routes->group(
  'admin',
  ['namespace' => '\App\Controllers\Admin', 'filter' => 'group:superadmin,admin,developer'],
  static function (RouteCollection $routes) {
    $routes->get('/', 'AdminController::index');

    $routes->resource('users');
    $routes->resource('books');
  }
);
