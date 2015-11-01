<?php
namespace Control;
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/ProjectMapper.php');
include_once(dirname(__FILE__).'/../View/View.php');
include_once(dirname(__FILE__).'/Controller.php');


use Control\Controller;
use View\View;
use Foundation\Database;
use Foundation\ArticleMapper;
use Foundation\UserMapper;
use Foundation\ProjectMapper;

class HomeController extends Controller {

	public function executeTask()
	{
		$databaseAdapter = new Database();
		$articleMapper = new ArticleMapper($databaseAdapter);
		$projectMapper = new ProjectMapper($databaseAdapter);

		$userMapper = new UserMapper($databaseAdapter);
		$lastThreeArticles = $articleMapper->getLastThreeArticles();
		$lastThreeProjects = $projectMapper->getLastThreeProjects();

		$articles = array();
		$projects = array();


		foreach ($lastThreeArticles as $article)
		{
			array_push($articles, array("title"=>$article->getTitle(), "description"=>$article->getDescription(), "articleId"=>$article->getId(), "image"=>$article->getImage()));
		}

		foreach ($lastThreeProjects as $project)
		{
			array_push($projects, array("title"=>$project->getTitle(), "description"=>$project->getDescription(), "projectId"=>$project->getId(), "image"=>$project->getImage()));
		}

		$this->view->assignHomeArticles($articles, $projects);
		return $this->view->getContent();
	}
}
