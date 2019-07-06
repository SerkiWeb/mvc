<?php
session_start();
require(__DIR__ . '/Core/controller/baseController.php');


$routes = array(
	'login' => 'login',
	'registration' => 'registration',
	'users' => 'users',
	'myprofil' => 'myprofil',
);

if (!isLogged()) {	

	login();

} else {

	$action = $_GET['action'];
	
	if (!in_array($action, $routes)) {
		$action = 'myprofil';
	} else {
		call_user_func($action);
	}
}

function isLogged()
{
	return !empty($_SESSION['login']);
}


