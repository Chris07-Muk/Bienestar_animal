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

//Routes of usuarios
$routes->get('/Usuarios', 'Panel/Usuarios::index');
//$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');
//$routes->get('/usuarios_pendientes', 'Panel/usuarios_pendientes::index');
$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');
$routes->get('/usuarios_pendientes', 'Panel/usuarios_pendientes::index');
$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');

//Routes of reportes
$routes->get('/Reportes_Aceptados', 'Panel/Reportes_Aceptados::index');
$routes->get('/Reportes_Pendientes', 'Panel/Reportes_Pendientes::index');
$routes->get('/Reporte_Visualizar/(:num)', 'Panel\Reporte_Visualizar::vizualizar/$1', ['as' => 'Reporte_Visualizar']);
$routes->post('/Reporte_Visualizar/(:num)', 'Panel\Reporte_Visualizar::vizualizar/$1');

$routes->get('/Reporte_eliminar/(:num)', 'Panel\Reportes_Aceptados::eliminar/$1', ['as' => 'eliminar_reporte']);
$routes->get('/Reporte_eliminar/(:num)', 'Panel\Reportes_Pendientes::eliminar/$1', ['as' => 'eliminar_reporte_pendiente']);

$routes->get('/Reporte_activar/(:num)', 'Panel\Reportes_Pendientes::activar/$1', ['as' => 'activar_reporte_pendiente']);
$routes->post('/Reporte_agregar', 'Panel\Reportes_Pendientes::guardar');


// Routes of refugios
$routes->get('/Refugios', 'Panel/Refugios::index');
$routes->post('/Refugios_eliminar/(:num)', 'Panel\Refugios::eliminar/$1', ['as' => 'eliminar_refugio']);
$routes->get('/Refugios_agregar', 'Panel\Refugios::agregar', ['as' => 'agregar_refugio']); // Ruta para mostrar el formulario
$routes->post('/Refugios_agregar', 'Panel\Refugios::guardar', ['as' => 'guardar_refugio']); // Ruta para procesar el formulario


// Ruta para ver las adopciones
$routes->get('/Adopciones', 'Panel\Adopciones::index');

// Ruta para agregar una adopción
$routes->get('/Adopciones_agregar', 'Panel\Adopciones::agregar', ['as' => 'agregar_adopcion']);
$routes->post('/Adopciones_agregar', 'Panel\Adopciones::guardar', ['as' => 'guardar_adopcion']);

// Ruta para eliminar una adopción
$routes->post('/Adopciones_eliminar/(:num)', 'Panel\Adopciones::eliminar/$1', ['as' => 'eliminar_adopcion']);




// $routes->get('/Adopciones', 'Panel/Adopciones::index');
//$routes->get('/usuarios_aceptados', 'Panel/usuarios_aceptados::index');


//Routes of public
$routes->get('/Portal', 'Portal/Portal::index' );
$routes->get('/Nosotros', 'Portal/Nosotros::index');
$routes->get('/Servicios', 'Portal/Servicios::index');

$routes->get('/Reportar', 'Portal/Reportar::index');
$routes->post('/reportar', 'Portal\Creacion_Reportes::guardar', ['as' => 'generar_reporte']);

$routes->get('/Adoptar', 'Portal/Adoptar::index');


$routes->get('/Contactanos', 'Portal/Contactanos::index');

// $routes->get('/Mascotas_Perdidas', 'Portal/Mascotas_Perdidas::index');
$routes->get('/reportes-activos', 'Portal\ver_reportes::listarReportesActivos', ['as' => 'reportes_activos']);



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
