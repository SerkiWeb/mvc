<?php
namespace PHPLearning\Model;

require(__DIR__ . '/../../config/database.php');

use PHPLearning\Config\Database;

abstract class Manager {

	private $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}
	protected function getConnection()
	{
		return $this->conn;
	}
}