<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProjectController::index');
$routes->get('/Project/add', 'ProjectController::addProject');
$routes->get('/Project/view', 'ProjectController::viewProject');
$routes->post('/Project/save', 'ProjectController::saveProject');
$routes->get('/Project/edit/(:num)', 'ProjectController::editProject/$1');
$routes->post('/Project/updateTask/(:num)', 'ProjectController::updateProject/$1');
$routes->get('/Project/delete/(:num)', 'ProjectController::deleteProject/$1');
