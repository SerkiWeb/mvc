<?php

session_start();

require_once(__DIR__ . '/Core/controller/base_controller.php');
require_once(__DIR__ . '/Core/controller/news_controller.php');

define('DEFAULT_ACTION', 'myprofil');

$baseController = new BaseController();
//$newsController = new NewsController();

if (!isLogged()) {
	$baseController->login();
}

$routes = exctractRoutes($baseController);
$action = DEFAULT_ACTION;

if (isset($_GET['action'])) {
	$action = strtolower(filter_var($_GET['action'], FILTER_SANITIZE_STRING));
}

if (in_array($action, $routes)) {
	$func = array($baseController, $action);
	$func();
} else {
	$baseController->method404();
}	

/**
 * Extract routes
 * @param   BaseController  
 * @return  array   list of methods
 */
function exctractRoutes($baseController)
{
	$routes = [];
	$class = new ReflectionClass($baseController);
	$methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
	foreach ($methods as $key => $obj) {
		$routes[] = strtolower($obj->name);
	}
	$key = array_search('__construct', $routes);
	unset($routes[$key]);
	return $routes;
}

function isLogged()
{
	return !empty($_SESSION['login']);
}

