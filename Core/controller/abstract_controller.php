<?php
namespace PHPLearning\Controller;

require_once(__DIR__ . '/../../config/database.php');
require_once(__DIR__ . '/../views/template.php');

use \PHPLearning\Config\Database;
use \PHPLearning\View\TemplateHTML;

abstract class AbstractController {

	private $conn;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConnection();
	}

	protected function generateHTML($template, $params) {
		return TemplateHTML::generate($template, $params);
	} 
}