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

$routes->get('/noticias/new', 'Noticias::new');
$routes->post('/noticias/create', 'Noticias::create');

