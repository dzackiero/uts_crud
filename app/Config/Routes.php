<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Admin
$routes->get('/admin', 'Admin::index', ['as' => 'admin']);
$routes->get('/admin/employees', 'Admin::employees', ['as' => 'employees']);
$routes->get('/admin/customers', 'Admin::customers', ['as' => 'customers']);
$routes->get('/admin/products', 'Admin::products', ['as' => 'products']);
$routes->get('/admin/categories', 'Admin::categories', ['as' => 'categories']);
$routes->get('/admin/transactions', 'Admin::transactions', ['as' => 'transactions']);

// User
$routes->get('/', 'Home::index', ['as' => 'home']);

// Login
$routes->get('/login', 'Auth::login', ['as' => 'login']);
$routes->post('/login/auth', 'Auth::authenticating', ['as' => 'auth']);

// Register
$routes->get('/register', 'Auth::register', ['as' => 'register']);
$routes->post('/register/store', 'Auth::store', ['as' => 'store']);

// Logout
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
