<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'TaskController::index');
$routes->post('/Project/save', 'TaskController::saveTask');
$routes->get('/Project/edit/(:num)', 'TaskController::editTask/$1');
$routes->put('/Project/updateTask/(:num)', 'TaskController::updateTask/$1');
$routes->get('/Project/delete/(:num)', 'TaskController::deleteTask/$1');
