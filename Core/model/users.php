<?php
namespace PHPLearning\Model;

require_once(__DIR__ . '/abstract_manager.php');
require_once(__DIR__ . '/user.php');

use PHPLearning\Model\User;

class UserManager extends Manager{

	public function register($user)
	{

		$conn = $this->getConnection();
		$req = $conn->prepare('INSERT INTO user (nom, password, newsletter, email, nom_photo, extension) 
			VALUES (:nom, :password, :newsletter, :email, :nom_photo, :extension)');
		$req->bindValue(':nom', $user['nom'], \PDO::PARAM_STR);
		$req->bindValue(':password', $user['password'], \PDO::PARAM_STR);
		$req->bindValue(':newsletter', $user['newsletter']);
		$req->bindValue(':email', $user['email'], \PDO::PARAM_STR);
		$req->bindValue(':nom_photo', $user['nom_photo'], \PDO::PARAM_STR);
		$req->bindValue(':extension', $user['extension'], \PDO::PARAM_STR);
		$user = $req->execute();

		return $user;
	}

	public function getUsers() {

		try {
			$conn = $this->getConnection();
			$conn->beginTransaction();
			$req = $conn->prepare('SELECT * FROM user');
			$req->execute();
			$users = $req->fetchAll(\PDO::FETCH_ASSOC);
			$conn->commit();
		} catch (Exception $e) {
			$conn->rollback();
			echo $e->getMessage();
		}

		return $users;
	}

	public function getUser($nom)
	{
		try {
			$conn = $this->getConnection();
			$req = $conn->prepare('SELECT nom, password, nom_photo, extension FROM user WHERE nom = :nom');
			$req->bindValue(':nom', $nom, \PDO::PARAM_STR);
			$req->execute();

			return $user = $req->fetch(\PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}	
	}

	public function doLogin($user)
	{
		
		$conn = $this->getConnection();
		$req = $conn->prepare('SELECT * FROM user WHERE nom=:nom');
		$req->bindValue(':nom', $user['nom']);
		$req->execute();
		$data = $req->fetch(\PDO::FETCH_ASSOC);
		$dbUser = new User();
		$dbUser->hydrate($data);
		if (password_verify($user['password'], $dbUser->getPassword())) {

			if (empty($_SESSION['login'])) {
				session_start();
				$_SESSION['nom']=$dbUser->getNom();
				$_SESSION['login']=true;
			}

			return true;
		}

		return false;
	}
}
