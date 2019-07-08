<?php

require_once(__DIR__ . '/../../config/database.php');
require_once(__DIR__ . '/../views/template.php');

abstract class AbstractController {

	private $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}

	public function generateHTML($template, $params) {
		return TemplateHTML::generate($template, $params);
	} 
}