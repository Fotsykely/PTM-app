<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->get('/signin', 'SigninController::index');
$routes->post('/SigninController/store', 'SigninController::store');
$routes->get('/entry/login','LoginController::index');
$routes->post('/LoginController/login', 'LoginController::login');
$routes->get('/dashboard/dashboard','ProjectController::index');

$routes->post('/Project/save', 'ProjectController::saveProject');
$routes->get('/Project/edit/(:num)', 'ProjectController::editProject/$1');
$routes->post('/Project/updatep/(:num)', 'ProjectController::updateProject/$1');
$routes->get('/Project/delete/(:num)', 'ProjectController::deleteProject/$1');

$routes->get('/Project/openP/(:num)', 'TaskController::index/$1');
$routes->post('/Task/save/(:num)', 'TaskController::saveTask/$1');
$routes->get('/Task/edit/(:num)', 'TaskController::editTask/$1');
$routes->post('/Task/update/(:num)', 'TaskController::updateTask/$1');
$routes->get('/Task/delete/(:num)', 'TaskController::deleteTask/$1');

