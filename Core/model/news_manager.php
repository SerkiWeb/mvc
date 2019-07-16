<?php
namespace PHPLearning\Model;

require_once(__DIR__ . 'abstract_manager.php');
require_once(__DIR__ . '/news.php');

class NewsManager extends Manager 
{

	public function getNews($date=NULL)
	{
		$this->getNews();
	}

	public function update($news)
	{
		$this->newsDBManager->update();
	}

	public function create($news)
	{
		$this->newsDBManager->create($news);
	}

}