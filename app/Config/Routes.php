<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

/**
 * authtentication and autozion routes
 */
$routes->match(['get', 'post'], 'register', 'UserAuth::registerpage');
$routes->match(['get', 'post'], 'login', 'UserAuth::loginPage');
$routes->get('logout', 'UserAuth::logout', ['filter' => 'auth']);
