<?php
namespace Control;
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../View/View.php');
include_once(dirname(__FILE__).'/Controller.php');


use Control\Controller;
use View\View;
use Foundation\Database;
use Foundation\ArticleMapper;
use Foundation\UserMapper;

class HomeController extends Controller {

	public function executeTask()
	{
		$databaseAdapter = new Database();
		$articleMapper = new ArticleMapper($databaseAdapter);
		$userMapper = new UserMapper($databaseAdapter);
		$lastThreeArticles = $articleMapper->getLastThreeArticles();
		$data = array();

		foreach ($lastThreeArticles as $article)
		{
			array_push($data, array("title"=>$article->getTitle(), "description"=>$article->getDescription(), "articleId"=>$article->getId(), "image"=>$article->getImage()));
		}

		$this->view->assignHomeArticles($data);
		return $this->view->getContent();
	}
}
