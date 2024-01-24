<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// produtos REST
$routes->get('produtos', 'Produtos::getAll');
