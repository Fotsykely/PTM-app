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
$routes->get('/dashboard/dashboard','TaskController::index');
$routes->post('/Project/save', 'TaskController::saveTask');
$routes->get('/Project/edit/(:num)', 'TaskController::editTask/$1');
$routes->put('/Project/updateTask/(:num)', 'TaskController::updateTask/$1');
$routes->get('/Project/delete/(:num)', 'TaskController::deleteTask/$1');
