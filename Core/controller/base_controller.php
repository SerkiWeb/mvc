<?php
require_once(__DIR__ . '/../model/users.php');
require_once(__DIR__ . '/abstract_controller.php');

use PHPLearning\Model\UserManager;
use PHPLearning\Controller\AbstractController;
class BaseController extends AbstractController {

	public function users()
	{
		$user = new UserManager();
		$users = $user->getUsers();
		$output = $this->generateHTML('users', ['users' => $users]);
		print $output;
	}

	public function registration()
	{
		$user = array();
		$userManager = new UserManager();
		if (!empty($_POST)) {
			$user['nom'] 		= filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
			$user['password'] 	= filter_var( $_POST['password'], FILTER_SANITIZE_STRING);
			$user['email'] 		= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$user['newsletter'] = filter_var($_POST['newsletter'], FILTER_SANITIZE_NUMBER_INT);
			if (isset($_POST['email_confirmation'])) {
				$user['email_confirmation'] = filter_var($_POST['email_confirmation'], FILTER_SANITIZE_NUMBER_INT);
			}

			$result=$userManager->register($user);
			
			if ($result == false) {
				die('impossible d\'enregistre l\'utilisateur');
			}

			header('Location: index.php?action=myprofil&nom=' . $user['nom']);
		}

		$output = $this->generateHTML('registration', ['user'=> $user]);	
		print $output;
	}

	public function myProfil()
	{
		$userManager = new UserManager();
		$nom = filter_var($_GET['nom'], FILTER_SANITIZE_STRING);
		$user = $userManager->getUser($nom);
		
		if ($user == false) {
			die('profil n\'existe pas ?');
		}

		$output = $this->generateHTML('user', ['user'=> $user]);	
		print $output;	
	}

	public function login() 
	{
		$user = [];
		$userManager = new UserManager();
		if (!empty($_POST)) {

			$user['nom'] = htmlspecialchars($_POST['nom']);
			$user['password'] = htmlspecialchars($_POST['password']);
			
			if ($userManager->doLogin($user)) {
				header('Location: index.php?action=myprofil&nom=' . $user['nom']);
			}
		}


		$output = $this->generateHTML('login', []);	
		print $output;
	}
}