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
$routes->setDefaultController('');
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
//$routes->get('/', 'Home::index');

//Routes of login
$routes->get('/login', 'Usuario/Login::index');
$routes->post('/validar_usuario', 'Usuario/Login::validar_usuario', ['as' => 'validar_usuario']);
$routes->get('/logout', 'Usuario/Logout::index', ['as' => 'logout']);


//Routes of panel admin
$routes->get('/Inicio', 'Inicio::index');
$routes->get('/Dashboard', 'Panel/Dashboard::index');
$routes->get('/Usuarios', 'Panel/Usuarios::index');
//$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');
//$routes->get('/usuarios_pendientes', 'Panel/usuarios_pendientes::index');
$routes->get('/Reportes_Aceptados', 'Panel/Reportes_Aceptados::index');
$routes->get('/Reportes_Pendientes', 'Panel/Reportes_Pendientes::index');
$routes->get('/Adopciones', 'Panel/Adopciones::index');
//$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');

//Routes of public
$routes->get('/Portal', 'Portal/Portal::index' );
$routes->get('/Nosotros', 'Portal/Nosotros::index');
$routes->get('/Servicios', 'Portal/Servicios::index');
$routes->get('/Reportar', 'Portal/Reportar::index');
$routes->get('/Mascotas_Perdidas', 'Portal/Mascotas_Perdidas::index');
$routes->get('/Contactanos', 'Portal/Contactanos::index');


// =====================================
// USUARIOS ACEPTADOS (CRUD PRINCIPAL)
// =====================================
$routes->get('/usuarios_aceptados', 'Panel\usuarios_aceptados::index', ['as' => 'usuarios_aceptados']);
$routes->get('/usuarios_aceptados/obtener', 'Panel\Usuarios_aceptados::generar_datatable', ['as' => 'obtener_usuarios_aceptados']);
$routes->post('/usuarios_aceptados/estatus', 'Panel\Usuarios_aceptados::estatus', ['as' => 'estatus_usuario']);
$routes->post('/usuarios_aceptados/eliminar', 'Panel\Usuarios_aceptados::eliminar', ['as' => 'eliminar_usuario']);
$routes->get('/usuarios_aceptados/nuevo', 'Panel\Usuarios_aceptados::nuevo', ['as' => 'nuevo_usuario']);
$routes->post('/usuarios_aceptados/registrar', 'Panel\Usuarios_aceptados::registrar', ['as' => 'registrar_usuario']);
$routes->post('/usuarios_aceptados/editar', 'Panel\Usuarios_aceptados::editar', ['as' => 'editar_usuario']);

// =====================================
// USUARIOS PENDIENTES (Aprobación)
// =====================================
$routes->get('/usuarios_pendientes', 'Panel\usuarios_pendientes::index', ['as' => 'usuarios_pendientes']);
$routes->get('/usuarios_pendientes/obtener', 'Panel\Usuarios_pendientes::generar_datatable', ['as' => 'obtener_usuarios_pendientes']);
$routes->post('/usuarios_pendientes/aprobar', 'Panel\Usuarios_pendientes::aprobar', ['as' => 'aprobar_usuario']);
$routes->post('/usuarios_pendientes/rechazar', 'Panel\Usuarios_pendientes::rechazar', ['as' => 'rechazar_usuario']);


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
