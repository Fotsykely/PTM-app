<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Project', 'TaskController::index');
$routes->get('/Project/add', 'TaskController::addTask');
$routes->post('/Project/save', 'TaskController::saveTask');
$routes->get('/Project/edit/(:num)', 'TaskController::editTask/$1');
$routes->post('/Project/updateTask/(:num)', 'TaskController::updateTask/$1');
$routes->get('/Project/delete/(:num)', 'TaskController::deleteTask/$1');
