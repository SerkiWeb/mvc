<?php
require(__DIR__ . '/../../config/database.php');


function getUsers() {
	$db = new Database();
	$conn = $db->getConnection();

	try {
		$conn->beginTransaction();
		$req = $conn->prepare('SELECT * FROM user');
		$req->execute();
		$users = $req->fetchAll(PDO::FETCH_ASSOC);
		$conn->commit();
	} catch (Exception $e) {
		$conn->rollback();
		echo $e->getMessage();
	}

	return $users;
}

function getUser($nom)
{
	$db = new Database();
	$conn = $db->getConnection();

	try {
		$req = $conn->prepare('SELECT nom, password FROM user WHERE nom = :nom');
		$req->bindValue(':nom', $nom, PDO::PARAM_STR);
		$req->execute();

		return $user = $req->fetch(PDO::FETCH_ASSOC);
	} catch (Exception $e) {
		echo $e->getMessage();
	}	
}

function doLogin($user)
{
	
	echo('test');
	$db = new Database();
	$conn = $db->getConnection();

	$req = $conn->prepare('SELECT * FROM user WHERE nom=:nom');
	$req->bindValue(':nom', $user['nom']);
	$req->execute();
	$dbUser = $req->fetch(PDO::FETCH_ASSOC);

	if ($dbUser['password'] == $user['password']) {
		session_start();
		$_SESSION['nom']=$user['nom'];
		$_SESSION['login']=true;

		return true;
	}

	return false;
}
