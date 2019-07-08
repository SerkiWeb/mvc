<?php
require(__DIR__ . '/../../config/database.php');

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