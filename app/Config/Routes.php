<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}


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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
//Routes of panel admin
$routes->get('/Inicio', 'Inicio::index');
$routes->get('/Dashboard', 'Panel/Dashboard::index');

//Routes of usuarios
$routes->get('/Usuarios', 'Panel/Usuarios::index');
$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');
$routes->get('/usuarios_pendientes', 'Panel/usuarios_pendientes::index');
$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');

//Routes of reportes
$routes->get('/Reportes_Aceptados', 'Panel/Reportes_Aceptados::index');
$routes->get('/Reportes_Pendientes', 'Panel/Reportes_Pendientes::index');
$routes->get('/Reporte_Visualizar/(:num)', 'Panel\Reporte_Visualizar::vizualizar/$1', ['as' => 'Reporte_Visualizar']);
$routes->post('/Reporte_Visualizar/(:num)', 'Panel\Reporte_Visualizar::vizualizar/$1');

$routes->get('/Reporte_eliminar/(:num)', 'Panel\Reportes_Aceptados::eliminar/$1', ['as' => 'eliminar_reporte']);




$routes->get('/Adopciones', 'Panel/Adopciones::index');


//Routes of public
$routes->get('/Portal', 'Portal/Portal::index' );
$routes->get('/Nosotros', 'Portal/Nosotros::index');
$routes->get('/Servicios', 'Portal/Servicios::index');
$routes->get('/Reportar', 'Portal/Reportar::index');
$routes->get('/Mascotas_Perdidas', 'Portal/Mascotas_Perdidas::index');
$routes->get('/Contactanos', 'Portal/Contactanos::index');

//Routes of Usuario
$routes->get('/login', 'Usuario/Login::index');


$routes->post('/validar_usuario', 'Usuario/Login::validar_usuario', ['as' => 'validar_usuario']);


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
