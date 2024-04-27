<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//? usuarios

$routes->get('/usuarios', 'Usuarios::index');
$routes->post('/usuarios/login', 'Usuarios::login');

$routes->get('/usuarios/new', 'Usuarios::new');
$routes->post('/usuarios/create', 'Usuarios::create');

$routes->get('/usuarios/logOut', 'Usuarios::logOut');

//* noticias

$routes->get('/noticias', 'Noticias::index');
$routes->get('/noticias/(:num)', 'Noticias::show/$1');

$routes->get('/noticias/new', 'Noticias::new');
$routes->post('/noticias/create', 'Noticias::create');

$routes->get('/noticias/(:num)/edit', 'Noticias::edit/$1');
$routes->put('/noticias/(:num)', 'Noticias::update/$1');

$routes->delete('noticias/(:num)', 'Noticias::delete/$1');
