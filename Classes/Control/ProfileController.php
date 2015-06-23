<?php

namespace Control;

include_once(dirname(__FILE__).'/../Entity/Article.php');
include_once(dirname(__FILE__).'/../Foundation/ProjectMapper.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;
use Foundation\Database;
use Foundation\ArticleMapper;
use Foundation\ProjectMapper;

class ProfileController extends Page {

  public function getPage(MainView $view) {

    switch($view->getDataFromRequest('ProfileAction'))
    {
      case 'getProfilePage':
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $projectMapper = new ProjectMapper($databaseAdapter);

        $articles = $articleMapper->getAllArticlesByAuthorId($this->getDataFromSession('userid'));
        $projects = $projectMapper->getAllProjectsByAuthorId($this->getDataFromSession('userid'));

        $articlesToDisplay = array();
        $projectsToDisplay = array();

        foreach($articles as $article) {
          array_push($articlesToDisplay, array("title"=>$article->getTitle()));
        }

        foreach($projects as $project) {
            array_push($projectsToDisplay, array("title"=>$project->getTitle()));
        }

        $view->assignData('articles', $articlesToDisplay);
        $view->assignData('projects', $projectsToDisplay);
        $view->assignData('userid', $this->getDataFromSession('userid'));
        $view->assignData('templateToDisplay', 'profileView.tpl');
      break;
    }

    $view->fetchTemplate('main.tpl');

  }
}
