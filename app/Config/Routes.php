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