<?php

session_start();

require_once(__DIR__ . '/Core/controller/base_controller.php');
require_once(__DIR__ . '/Core/controller/news_controller.php');

$baseController = new BaseController();
//$newsController = new NewsController();
$class = new ReflectionClass($baseController);
$methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
foreach ($methods as $key => $obj) {
	$routesBis[] = $obj->name;
}
$key = array_search('__construct', $routesBis);
unset($routesBis[$key]);
$action ='login';

if (isset($_GET['action'])) {
	$action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
}

/*var_dump($action);
var_dump(isLogged());
exit;*/
if (isLogged() && in_array($action, $routesBis)) {	
	$func = array($baseController, $action);
	$func();
} else {
	$baseController->login();
}

function isLogged()
{
	return !empty($_SESSION['login']);
}

