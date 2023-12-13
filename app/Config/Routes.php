<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes, ['except' => ['login', 'register']]);

/**
 * authtentication and autozion routes
 */
$routes->get('register', 'RegisterController::registerView', ['namespace' => '\App\Controllers\Auth']);
$routes->post('register', 'RegisterController::postRegister', ['namespace' => '\App\Controllers\Auth']);
$routes->get('login', 'LoginController::loginView', ['namespace' => '\App\Controllers\Auth']);
$routes->post('login', 'LoginController::postLogin', ['namespace' => '\App\Controllers\Auth']);
