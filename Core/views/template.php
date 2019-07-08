<?php
namespace PHPLearning\View;

class TemplateHTML { 

	public static function generate($filename, $args)
	{
		$file = __DIR__ . '/' . $filename . '.php';

		if (!file_exists($file)) {
			throw new Exception("Template : File not found " . $file, 1);
		}

		$extension = pathinfo($file, PATHINFO_EXTENSION);

		if (!in_array($extension, ['php'])) {
			throw new Exception("Template : File file extension is not allowed " . $extension, 2);
		}

		if (!is_array($args)) {
			throw new Exception("Template : parameter $args is not an array", 3);
		}

		extract($args);
		ob_start();
		echo('<html>');
		include(__DIR__ . '/../../config/header.php');
		echo('<body>');
		echo('<div class="container">');
    	include $file;
    	echo('</div>');
    	echo('</body>');
    	echo('</html>');
  		return ob_get_clean();
	}
}