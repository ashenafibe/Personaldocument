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
$routes->get('/', 'Home::index');
// Campany type
$routes->get('/Create-company','Admin\CompanyController::Create');
$routes->match(['get','Post'],'/Store-Company','Admin\CompanyController::Store');
$routes->get('/Display-company','Admin\CompanyController::List');
$routes->get('/Edit-company/(:num)','Admin\CompanyController::Edit/$1');
$routes->match(['get','post'],'/Update-company','Admin\CompanyController::update');
// Role
$routes->get('/Create-Role','Admin\RolesController::Create');
$routes->match(['get','Post'],'/Store-Role','Admin\RolesController::Store');
$routes->get('/Display-Role','Admin\RolesController::List');
$routes->get('/Edit-Role/(:num)','Admin\RolesController::Edit/$1');
$routes->match(['get','post'],'/Update-Role','Admin\RolesController::update');
$routes->get('/Selectrole','Admin\RolesController::Selectrole');//Select role for from company


// Prev
$routes->get('/Create-Prev','Admin\PrevController::Create');
$routes->match(['get','Post'],'/Store-Prev','Admin\PrevController::Store');
$routes->get('/Display-Prev','Admin\PrevController::List');
$routes->get('/Edit-Prev/(:num)','Admin\PrevController::Edit/$1');
$routes->match(['get','post'],'/Update-Prev','Admin\PrevController::update');
// Role previlage
$routes->get('/Create-RolePrev','Admin\RolePrevController::Create');
$routes->match(['get','Post'],'/Store-RolePrev','Admin\RolePrevController::Store');
$routes->get('/Display-RolePrev','Admin\RolePrevController::List');
$routes->get('/Edit-RolePrev/(:num)','Admin\RolePrevController::Edit/$1');
$routes->match(['get','post'],'/Update-RolePrev','Admin\RolePrevController::update');
//Users 
$routes->get('/Create-users','Admin\UsersController::Create');
$routes->match(['get','Post'],'/Store-users','Admin\UsersController::Store');
$routes->get('/Display-users','Admin\UsersController::List');
$routes->get('/Edit-users/(:num)','Admin\UsersController::Edit/$1');
$routes->match(['get','post'],'/Update-users','Admin\UsersController::update');
//login
$routes->get('/User-login','Admin\UsersController::login');
$routes->get('/User-Auth','Admin\UsersController::loginAuth');

//DashBoard
$routes->get('/Dashboard','DashboardController::index');

//



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
