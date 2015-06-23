<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/Project.php');
include_once(dirname(__FILE__).'/../Foundation/ProjectMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;
use Foundation\CommentMapper;
use Foundation\Database;
use Entity\Project;
use Foundation\ProjectMapper;
use Foundation\UserMapper;


class ProjectController extends Page {

    public function getPage(MainView $view) {

        switch($view->getDataFromRequest('ProjectAction'))
        {
            case 'addNewProject':
            $databaseAdapter = new Database();
            $projectMapper = new ProjectMapper($databaseAdapter);
            $project = new Project($view->getDataFromRequest('userID'), $view->getDataFromRequest('title'), $view->getDataFromRequest('description'), $view->getDataFromRequest('textProject'), 0);
            $projectMapper->insertProject($project);
            $view->assignData('userid', $this->getDataFromSession('userid'));
            $view->assignData('templateToDisplay', 'profileView.tpl');
            break;

            case 'getProjectView':
            $databaseAdapter = new Database();
            $articleMapper = new ArticleMapper($databaseAdapter);
            $commentMapper = new CommentMapper($databaseAdapter);
            $userMapper = new UserMapper($databaseAdapter);
            $condition = array("id"=>$view->getDataFromRequest('articleId'));
            $article = $articleMapper->find(array(), $condition, null);
            $condition = array("articleId"=>$article[0]->getId());
            $comments = $commentMapper->find(array(), $condition, null);
            $data = array();

            foreach ($comments as $comment) {
                $user = $userMapper->find(array(), array("id"=>$comment->getUserId()), null);
                array_push($data, array("author"=>$user[0]->getNickname(), "image"=>$user[0]->getImage(), "text"=>$comment->getText(), "authorId"=>$user[0]->getId()));
            }
            $view->assignData("articleTitle", $article[0]->getTitle());
            $view->assignData("articleText", $article[0]->getText());
            $view->assignData("authorId", $this->getDataFromSession("userid"));

            $view->assignData("comments", $data);

            $view->assignData('templateToDisplay', 'articleView.tpl');
            break;

            case 'getProjectsCards':
            $databaseAdapter = new Database();
            $projectMapper = new ProjectMapper($databaseAdapter);
            $userMapper = new UserMapper($databaseAdapter);
            $projects = $projectMapper->getAllProjects();
            $data = array();

            foreach ($projects as $project) {
                $user = $userMapper->find(array(), array("id"=>$project->getUserId()), null);
                array_push($data, array("title"=>$project->getTitle(), "author"=>$user[0]->getNickname(), "image"=>$user[0]->getImage(), "description"=>$project->getDescription(), "articleId"=>$project->getId()));
            }

            $data = array_chunk($data, 3);
            $view->assignData('data', $data);
            $view->assignData('templateToDisplay', 'projectCards.tpl');
            break;
        }
        $view->fetchTemplate('main.tpl');
    }
}
