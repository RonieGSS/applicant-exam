<?php

use Lib\Controller\RoutesController;

$router = new RoutesController();

/**
 * You can set your routes in this page
 *
 * addRoute method can accept one or two parameters
 * $router->addRoute($url, $view = 'index');
 * @param $url route url, the first parameter is required
 * @param $view view page name, the second parameter is optional
 * and assigned if routeUrl is different form view page name
 */
// $url is different different from $view so second parameter is needed
// points to app/View/home.php
$router->addRoute('/', 'home');

// $url is the same as $view so second parameter is unnecessary
// points to app/View/about.php
$router->addRoute('/about');