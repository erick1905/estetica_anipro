<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

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
// vista con el formulario
$routes->get('/', 'Home::index');

$routes->get('/admin', 'Home::admin');

$routes->post('auth/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');

//crud empleados alv
$routes->get('/empleados', 'EmpleadoController::index');
$routes->get('/empleados/crear', 'EmpleadoController::crear'); // retorna el formulario de crear nuevo empleado
$routes->post('/empleados/registrar', 'EmpleadoController::registrar'); // procesar la información del formulario de nuevo empleado
$routes->get('empleados/editar/(:num)', 'EmpleadoController::editar/$1'); // retorna el formulario para editar y la información del empleado a editar
$routes->post('/empleados/actualizar/(:num)', 'EmpleadoController::actualizar/$1'); // procesar la información del formulario
$routes->get('/borrarempleado/(:num)', 'EmpleadoController::borrarempleado/$1');
//-------------------------------clientes---------------------------------------------------
//$routes->get('/clientes', 'CitasController::index');
$routes->get('/clientes', 'ClientesController::readClientes');
$routes->get('/crearcliente', 'ClientesController::crearcliente');
$routes->post('/registrarcliente', 'ClientesController::registrarcliente');
$routes->get('/borrarcliente/(:num)', 'ClientesController::borrarcliente/$1');
$routes->get('/editarcliente/(:num)', 'ClientesController::editarcliente/$1');
$routes->post('/actualizarcliente/(:num)', 'ClientesController::actualizarcliente/$1');
//$routes->get('clientes/borrarcliente/(:num)', 'ClientesController::borrarcliente/$1');
//$routes->get('/clientes', 'Home::cita');
//----------------------------citas-----------------------------------------------------------
$routes->get('/citas', 'CitasController::readCitas');
$routes->get('/crearcita', 'CitasController::crearcita');
$routes->post('/registrarcita', 'CitasController::registrarcita');
$routes->get('/editarcita/(:num)', 'CitasController::editarcita/$1');
$routes->post('/actualizarcita/(:num)', 'CitasController::actualizarcita/$1');
$routes->get('/borrarcita/(:num)', 'CitasController::borrarcita/$1');
//-------------------------servicios----------------------------------------------------------
$routes->get('/servicios', 'ServiciosController::readservicios');
$routes->get('/crearservicio', 'ServiciosController::crearservicio');
$routes->post('/registrarservicio', 'ServiciosController::registrarservicio');
$routes->get('/editarservicio/(:num)', 'ServiciosController::editarservicio/$1');
$routes->post('/actualizarservicio/(:num)', 'ServiciosController::actualizarservicio/$1');
$routes->get('/borrarservicio/(:num)', 'ServiciosController::borrarservicio/$1');
//-------------------------promocion--------------------------------------------------------
$routes->get('/promocion', 'PromocionController::readpromos');
$routes->get('/crearpromocion', 'PromocionController::crearpromocion');
$routes->post('/registrarpromo', 'PromocionController::registrarpromo');
$routes->get('/editarpromo/(:num)', 'PromocionController::editarpromo/$1');
$routes->post('/actualizarpromo/(:num)', 'PromocionController::actualizarpromo/$1');
$routes->get('/borrarpromo/(:num)', 'PromocionController::borrarpromo/$1');
//-------------------------ventas---------------------------------------------------------
$routes->get('/ventas', 'VentaController::readVenta');
$routes->post('/formulario', 'VentaController::formulario');

//----------------------reportes------------------------------------------------------------
$routes->get('/reportes', 'ReportesController::indexreporte');
$routes->get('/citasdia', 'ReportesController::citasdia');
$routes->get('/promosactivas', 'ReportesController::promosactivas');
$routes->get('/totalventasdia', 'ReportesController::totalventasdia');
$routes->get('/ventasmes', 'ReportesController::ventasmes');
$routes->get('/promopopular', 'ReportesController::promopopular');



$routes->get('/pages/(:any)', 'Home::view/$1');



// lógica para el login
$routes->post('/login', 'AuthController::login');
//ruta para cargar vistas
$routes->get('(:any)', 'Home::view/$1');

$routes->post('api/readEmpleados', 'ApiController::readEmpleados');
$routes->post('api/ejemplo', 'ApiController::ejemplo');

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
