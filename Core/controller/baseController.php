<?php
require(__DIR__ . '/../model/users.php');
require(__DIR__ . '/../model/registration.php');
require(__DIR__ . '/../views/template.php');

function users()
{
	$users = getUsers();
	$output = TemplateHTML::generate('users', ['users' => $users]);
	print $output;
}

function registration()
{
	$user = array();
	if (!empty($_POST)) {
		$user['nom'] 		= filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
		$user['password'] 	= filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
		$user['email'] 		= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$user['newsletter'] = filter_var($_POST['newsletter'], FILTER_SANITIZE_NUMBER_INT);
		if (isset($_POST['email_confirmation'])) {
			$user['email_confirmation'] = filter_var($_POST['email_confirmation'], FILTER_SANITIZE_NUMBER_INT);
		}

		$result=register($user);
		
		if ($result == false) {
			die('impossible d\'enregistre l\'utilisateur');
		}

		if (condition) {
			# code...
		}
		header('Location: index.php?action=myprofil&nom=' . $user['nom']);
	}

	$output = TemplateHTML::generate('registration', ['user'=> $user]);	
	print $output;
}

function myProfil()
{
	$nom = filter_var($_GET['nom'], FILTER_SANITIZE_STRING);
	$user = getUser($nom);
	
	if ($user == false) {
		die('profil n\'existe pas ?');
	}

	$output = TemplateHTML::generate('user', ['user'=> $user]);	
	print $output;	
}

function login() 
{
	$user = [];

	if (!empty($_POST)) {

		$user['nom'] = htmlspecialchars($_POST['nom']);
		$user['password'] = htmlspecialchars($_POST['password']);
		
		if (doLogin($user)) {
			header('Location: index.php?action=myprofil&nom=' . $user['nom']);
		}
	}


	$output = TemplateHTML::generate('login', []);	
	print $output;
}