<?php
namespace PHPLearning\Model;


class User {

	private $nom;
	private $password; 
	private $newsletter; 
	private $email;

	public function setNom($nom){
		$this->nom = $nom;
		return $this;
	}
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	public function setNewsletter($newsletter)
	{
		$this->newsletter = $newsletter;
		return $this;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getNom()
	{
		return $this->nom;
	}

	public function getNewsletter()
	{
		return $this->newsletter;
	}

	public function getEmail()
	{
		return $this->email;
	}

		/**
	 * hydrate an object with data parameter
	 * @param array  user data
	 * @return User  user class from \PHPLearning\Model\User
	 */
	public function hydrate($data)
	{
		foreach ($data as $prop => $value) {
			$method = 'set' . ucfirst($prop);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}
}