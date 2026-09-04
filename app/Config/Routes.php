<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Page de connexion par défaut
$routes->get('/', 'Auth::login');

// Authentification
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');

// Déconnexion
$routes->get('/logout', 'Auth::logout');
$routes->get('/create-admin', 'CreateAdmin::index');
$routes->get('/dashboard', 'Dashboard::index');


$routes->get('/etudiants', 'Etudiants::index');
$routes->get('/etudiants/create', 'Etudiants::create');
$routes->post('/etudiants/store', 'Etudiants::store');
$routes->get('/etudiants/edit/(:num)', 'Etudiants::edit/$1');
$routes->post('/etudiants/update/(:num)', 'Etudiants::update/$1');
$routes->get('/etudiants/delete/(:num)', 'Etudiants::delete/$1');


$routes->get('/formations', 'Formations::index');
$routes->get('/formations/create', 'Formations::create');
$routes->post('/formations/store', 'Formations::store');
$routes->get('/formations/edit/(:num)', 'Formations::edit/$1');
$routes->post('/formations/update/(:num)', 'Formations::update/$1');
$routes->get('/formations/delete/(:num)', 'Formations::delete/$1');

$routes->get('/inscriptions', 'Inscriptions::index');
$routes->get('/inscriptions/create', 'Inscriptions::create');
$routes->post('/inscriptions/store', 'Inscriptions::store');
$routes->get('/inscriptions/edit/(:num)', 'Inscriptions::edit/$1');
$routes->post('/inscriptions/update/(:num)', 'Inscriptions::update/$1');
$routes->get('/inscriptions/delete/(:num)', 'Inscriptions::delete/$1');