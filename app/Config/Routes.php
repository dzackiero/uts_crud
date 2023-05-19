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

// TESTING
$routes->get('/role/(:any)', 'Home::setRole/$1', ['as' => 'setRole']);

// Admin
$routes->get('/admin', 'Admin::index', ['as' => 'admin']);

// Employee
$routes->get('/admin/employees', 'Employee::index', ['as' => 'employees']);
$routes->get('/admin/employees/create', 'Employee::create', ['as' => 'create_employee']);
$routes->post('/admin/employees/store', 'Employee::store', ['as' => 'store_employee']);
$routes->get('/admin/employees/(:num)', 'Employee::get/$1', ['as' => 'edit_employee']);
$routes->post('/admin/employees/(:num)/update', 'Employee::update/$1', ['as' => 'update_employee']);
$routes->get('/admin/employees/(:num)/delete', 'Employee::delete/$1', ['as' => 'delete_employee']);

// Customer
$routes->get('/admin/customers', 'Customer::index', ['as' => 'customers']);
$routes->get('/admin/customers/create', 'Customer::create', ['as' => 'create_customer']);
$routes->post('/admin/customers/store', 'Customer::store', ['as' => 'store_customer']);
$routes->get('/admin/customers/(:num)', 'Customer::get/$1', ['as' => 'edit_customer']);
$routes->post('/admin/customers/(:num)/update', 'Customer::update/$1', ['as' => 'update_customer']);
$routes->get('/admin/customers/(:num)/delete', 'Customer::delete/$1', ['as' => 'delete_customer']);

// Products
$routes->get('/admin/products', 'Product::index', ['as' => 'products']);
$routes->get('/admin/products/create', 'Product::create', ['as' => 'create_product']);
$routes->post('/admin/products/store', 'Product::store', ['as' => 'store_product']);
$routes->get('/admin/products/(:num)', 'Product::get/$1', ['as' => 'edit_product']);
$routes->post('/admin/products/(:num)/update', 'Product::update/$1', ['as' => 'update_product']);
$routes->get('/admin/products/(:num)/delete', 'Product::delete/$1', ['as' => 'delete_product']);

// Category
$routes->get('/admin/categories', 'Category::index', ['as' => 'categories']);
$routes->get('/admin/categories/create', 'Category::create', ['as' => 'create_category']);
$routes->post('/admin/categories/store', 'Category::store', ['as' => 'store_category']);
$routes->get('/admin/categories/(:num)', 'Category::get/$1', ['as' => 'edit_category']);
$routes->post('/admin/categories/(:num)/update', 'Category::update/$1', ['as' => 'update_category']);
$routes->get('/admin/categories/(:num)/delete', 'Category::delete/$1', ['as' => 'delete_category']);

// Transaction
$routes->get('/admin/transactions', 'Transaction::index', ['as' => 'transactions']);
$routes->get('/admin/transactions/create', 'Transaction::create', ['as' => 'create_transaction']);
$routes->post('/admin/transactions/store', 'Transaction::store', ['as' => 'store_transaction']);
$routes->get('/admin/transactions/(:num)', 'Transaction::get/$1', ['as' => 'edit_transaction']);

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
