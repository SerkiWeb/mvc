<?php

function register($user)
{
	$db = new Database();
	$conn= $db->getConnection();

	$req = $conn->prepare('INSERT INTO user (nom, password, newsletter, email) 
		VALUES (:nom, :password, :newsletter, :email)');
	$req->bindValue(':nom', $user['nom'], PDO::PARAM_STR);
	$req->bindValue(':password', $user['password'], PDO::PARAM_STR);
	$req->bindValue(':newsletter', $user['newsletter']);
	$req->bindValue(':email', $user['email']);
	$user = $req->execute();

	return $user;
}

