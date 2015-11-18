<?php
/**
 * Home Controller File
 *
 * Questo file contiene il home controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */

class HomeController extends Controller {

	/**
	 * Smista le richieste in arrivo dalla HomeView.
	 */
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
			array_push($articles, array("title"=>$article->getTitle(), "description"=>$article->getDescription(), "id"=>$article->getId(), "image"=>$article->getImage()));
		}

		foreach ($lastThreeProjects as $project)
		{
			array_push($projects, array("title"=>$project->getTitle(), "description"=>$project->getDescription(), "id"=>$project->getId(), "image"=>$project->getImage()));
		}

		$this->view->assignHomeArticles($articles, $projects);
		return $this->view->getContent();
	}
}
