<?php
session_start();
require_once(__DIR__ . '/Core/controller/base_controller.php');
require_once(__DIR__ . '/Core/controller/news_controller.php');


$routes = array(
	'login' => 'login',
	'registration' => 'registration',
	'users' => 'users',
	'myprofil' => 'myprofil',
);

if (isLogged()) {	

	$action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);

	if (!in_array($action, $routes)) {
		$action = 'myprofil';
	}

	$func = array(new BaseController, $action);
	$func();

} else {
	$controller->login();
}

function isLogged()
{
	return !empty($_SESSION['login']);
}


