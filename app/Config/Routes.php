<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'SubjectsController::index');

// $routes->get('subjects/create', 'SubjectsController::create');
// $routes->post('subjects/store', 'SubjectsController::store');

// $routes->get('subjects/edit/(:num)', 'SubjectsController::edit/$1');
// $routes->post('subjects/update/(:num)', 'SubjectsController::update/$1');

// $routes->get('subjects/delete/(:num)', 'SubjectsController::delete/$1');

// Need to implement like these routes
// $routes->get('products', 'Product::feature');
// $routes->post('products', 'Product::feature');
// $routes->put('products/(:num)', 'Product::feature');
// $routes->delete('products/(:num)', 'Product::feature');


// routes for client form
$routes->get('/', 'ClientControl::startup');
$routes->get('Clients/start', 'ClientControl::startup');
$routes->get('Clients', 'ClientControl::index');
$routes->get('Clients/login', 'ClientControl::loginPage');
$routes->get('Clients/success', 'ClientControl::success');
$routes->get('Clients/signout', 'ClientControl::signout');
$routes->get('Clients/profile', 'ClientControl::profile',['filter' => 'auth']);
$routes->get('Clients/edit', 'ClientControl::edit',['filter' => 'auth']);
$routes->post('Clients/store', 'ClientControl::store');
$routes->post('Clients', 'ClientControl::update');


// admin route
$routes->get('Admins/login', 'AdminControl::loginPage');
$routes->get('signout', 'AdminControl::signout');
$routes->get('Admins', 'AdminControl::index',['filter' => 'adminAuth']);
$routes->get('Admins/create', 'AdminControl::create');
$routes->get('Admins/delete/(:num)', 'AdminControl::delete/$1');
$routes->post('Admins/createOrUpdate', 'AdminControl::createOrUpdate');
$routes->delete('Admins/(:num)', 'AdminControl::delete');

// approve route
$routes->get('Approves/list', 'ApproveControl::index',['filter' => 'adminAuth']);
$routes->get('Approves/export', 'ApproveControl::export');
$routes->get('Approved/export', 'ApproveControl::exportApprove');
$routes->get('Approves/search', 'ApproveControl::listSearch');
$routes->get('Approves/documentList/(:num)', 'ApproveControl::documentList/$1');
$routes->get('Approved/list', 'ApproveControl::getApproveData',['filter' => 'adminAuth']);
$routes->get('Approved/search', 'ApproveControl::searchApproveData');
$routes->get('Approves/approveData/(:num)', 'ApproveControl::approveData/$1');
$routes->post('Approves/save', 'ApproveControl::save');

// package route
$routes->get('Package', 'PackageControl::index',['filter' => 'adminAuth']);
$routes->get('Package/create', 'PackageControl::create');
$routes->get('Package/delete/(:num)', 'PackageControl::delete/$1');
$routes->post('Package/createOrUpdate', 'PackageControl::createOrUpdate');
$routes->delete('Package/(:num)', 'PackageControl::delete');

// package route
$routes->get('Types', 'TypeControl::index',['filter' => 'adminAuth']);
$routes->get('Types/create', 'TypeControl::create');
$routes->get('Types/delete/(:num)', 'TypeControl::delete/$1');
$routes->post('Types/createOrUpdate', 'TypeControl::createOrUpdate');
$routes->delete('Types/(:num)', 'TypeControl::delete');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
