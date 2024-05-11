<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//? usuarios

$routes->get('/usuarios', 'Usuarios::index');
$routes->post('/usuarios/login', 'Usuarios::login');

$routes->get('/usuarios/new', 'Usuarios::new');
$routes->post('/usuarios/create', 'Usuarios::create');

$routes->get('/usuarios/logOut', 'Usuarios::logOut');

//* noticias

$routes->get('/', 'Noticias::index');
$routes->get('/noticias/(:num)', 'Noticias::show/$1');

$routes->get('/noticias/new', 'Noticias::new');
$routes->post('/noticias/create', 'Noticias::create');

$routes->get('/noticias/(:num)/edit', 'Noticias::edit/$1');
$routes->put('/noticias/(:num)', 'Noticias::update/$1');

$routes->delete('noticias/(:num)', 'Noticias::delete/$1');

//todo: requerimentos

//todo: vistas
$routes->get('/noticias/home', 'Noticias::home');
$routes->get('/noticias/validate', 'Noticias::validates');
$routes->get('/noticias/seguimiento/(:num)', 'Noticias::tracking/$1');

//todo: procesos editor
$routes->put('/noticias/deshacer/(:num)', 'Noticias::deshacerModificacion/$1');
$routes->put('/noticias/desactivar/(:num)', 'Noticias::desactivar/$1');
$routes->put('/noticias/activar/(:num)', 'Noticias::activar/$1');
$routes->put('/noticias/borrador/(:num)', 'Noticias::enviarABorrador/$1');
$routes->put('/noticias/validar/(:num)', 'Noticias::enviarAValidar/$1');

//todo: procesos validador
$routes->put('/noticias/publicar/(:num)', 'Noticias::publicar/$1');
$routes->put('/noticias/rechazar/(:num)', 'Noticias::rechazar/$1');
$routes->put('/noticias/corregir/(:num)', 'Noticias::corregir/$1');

