<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('books', 'BooksController::index');
$routes->get('about', 'AboutController::index');
$routes->get('contact', 'ContactController::index');

service('auth')->routes($routes, ['except' => ['login', 'register']]);

/**
 * authtentication and autozion routes
 */
$routes->get('register', 'RegisterController::registerView', ['namespace' => '\App\Controllers\Auth']);
$routes->post('register', 'RegisterController::postRegister', ['namespace' => '\App\Controllers\Auth']);
$routes->get('login', 'LoginController::loginView', ['namespace' => '\App\Controllers\Auth']);
$routes->post('login', 'LoginController::postLogin', ['namespace' => '\App\Controllers\Auth']);

/**
 * Admin page routes
 */
$routes->group(
  'admin',
  ['namespace' => '\App\Controllers\Admin', 'filter' => 'session'],
  static function (RouteCollection $routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('users', 'UserController::index');
  }
);
