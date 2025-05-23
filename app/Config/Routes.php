<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'MataKuliah::profil');
$routes->get('/matkul/(:segment)', 'MataKuliah::detail/$1');
$routes->get('/contact','MataKuliah::contact');
$routes->get('/about','Page::about');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos','Page::tos');
$routes->get('/biodata', 'Page::biodata');
$routes->setAutoRoute(false);


$routes->get('/books', 'Books::index');
$routes->get('/books/create', 'Books::create');
$routes->post('/books/save', 'Books::save');
$routes->get('/books/detail/(:segment)', 'Books::detail/$1');
$routes->post('/books/delete/(:num)', 'Books::delete/$1');
$routes->get('/books/edit/(:segment)', 'Books::edit/$1');
$routes->post('/books/update/(:num)', 'Books::update/$1');