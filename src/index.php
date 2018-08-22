<?php
	require('vendor/autoload.php');
	require_once('app/Config/routes.php');
	$router->requireRoute("/{$_GET['url']}");

