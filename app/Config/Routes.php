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
$routes->setDefaultController('Login');
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

// =======================
// Rutas Públicas (Portal)
// =======================
$routes->get('/', 'Portal\Portal::index', ['as' => '']);
$routes->get('/portal', 'Portal\Portal::index', ['as' => 'portal']);
$routes->get('/nosotros', 'Portal\Nosotros::index', ['as' => 'nosotros']);
$routes->get('/servicios', 'Portal\Servicios::index', ['as' => 'servicios']);
$routes->get('/reportar', 'Portal\Reportar::index', ['as' => 'reportar']);
$routes->post('/reportar', 'Portal\Creacion_Reportes::guardar', ['as' => 'generar_reporte']);
$routes->get('/adoptar', 'Portal\Adoptar::index',['as' => 'adoptar']);
$routes->get('/contactanos', 'Portal\Contactanos::index',['as' => 'contactanos']);
$routes->get('/reportes_activos', 'Portal\Ver_reportes::index', ['as' => 'reportes_activos']);

// =======================
// Autenticación (Usuarios)
// =======================
$routes->get('/login', 'Usuario\Login::index');
$routes->post('/validar_usuario', 'Usuario\Login::validar_usuario', ['as' => 'validar_usuario']);
$routes->get('/logout', 'Usuario\Logout::index', ['as' => 'logout']);
$routes->get('/registro', 'Usuario\Registro::index');

// =======================
// Panel de Administración
// =======================
$routes->get('/inicio', 'Panel\Inicio::index');
$routes->get('/dashboard', 'Panel\Dashboard::index');

// -----------------
// Gestión Usuarios
// -----------------
$routes->get('/usuarios', 'Panel\Usuarios::index');
//$routes->get('/usuarios_aceptados', 'Panel\Usuarios_Aceptados::index');
$routes->get('/usuarios_pendientes', 'Panel\Usuarios_Pendientes::index');

// CRUD Usuarios
$routes->get('/administracion_usuarios', 'Panel\Usuarios::index', ['as' => 'administracion_usuarios']);
$routes->get('/usuario_nuevo', 'Panel\Usuario_Nuevo::index', ['as' => 'usuario_nuevo']);
$routes->post('/registrar_usuario', 'Panel\Usuarios::registrar_usuario', ['as' => 'registrar_usuario']);
$routes->get('/obtener_usuario/(:num)', 'Panel\Usuarios::obtener_datos_usuario/$1', ['as' => 'obtener_usuario']);
$routes->post('/editar_usuario', 'Panel\Usuarios::actualizar', ['as' => 'editar_usuario']);
$routes->get('/estatus_usuario/(:num)/(:num)', 'Panel\Usuarios::estatus/$1/$2', ['as' => 'estatus_usuario']);
$routes->get('/eliminar_usuario/(:num)', 'Panel\Usuarios::eliminar/$1', ['as' => 'eliminar_usuario']);

// -----------------
// Gestión Reportes
// -----------------
$routes->get('/reportes_aceptados', 'Panel\Reportes_Aceptados::index');
$routes->get('/reportes_pendientes', 'Panel\Reportes_Pendientes::index');
$routes->get('/reporte_visualizar/(:num)', 'Panel\Reporte_Visualizar::vizualizar/$1', ['as' => 'reporte_visualizar']);
$routes->post('/reporte_visualizar/(:num)', 'Panel\Reporte_Visualizar::vizualizar/$1');
$routes->get('/reporte_eliminar/(:num)', 'Panel\Reportes_Aceptados::eliminar/$1', ['as' => 'eliminar_reporte']);
$routes->get('/reporte_eliminar_pendiente/(:num)', 'Panel\Reportes_Pendientes::eliminar/$1', ['as' => 'eliminar_reporte_pendiente']);
$routes->get('/reporte_activar/(:num)', 'Panel\Reportes_Pendientes::activar/$1', ['as' => 'activar_reporte_pendiente']);
$routes->post('/reporte_agregar', 'Panel\Reportes_Pendientes::guardar');

// -----------------
// Gestión Refugios
// -----------------
$routes->get('/refugios', 'Panel\Refugios::index');
$routes->get('/refugios_agregar', 'Panel\Refugios::agregar', ['as' => 'agregar_refugio']);
$routes->post('/refugios_agregar', 'Panel\Refugios::guardar', ['as' => 'guardar_refugio']);
$routes->post('/refugios_eliminar/(:num)', 'Panel\Refugios::eliminar/$1', ['as' => 'eliminar_refugio']);

// -----------------
// Gestión Adopciones
// -----------------
$routes->get('/adopciones', 'Panel\Adopciones::index');
$routes->get('/adopciones_agregar', 'Panel\Adopciones::agregar', ['as' => 'agregar_adopcion']);
$routes->post('/adopciones_agregar', 'Panel\Adopciones::guardar', ['as' => 'guardar_adopcion']);
$routes->post('/adopciones_eliminar/(:num)', 'Panel\Adopciones::eliminar/$1', ['as' => 'eliminar_adopcion']);


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
