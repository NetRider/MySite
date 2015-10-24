<?php

namespace Control;

include_once(dirname(__FILE__).'/../Entity/Article.php');
include_once(dirname(__FILE__).'/../Foundation/ProjectMapper.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/ACLMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/View.php');

use Control\Controller;
use View\View;
use Foundation\Database;
use Foundation\ArticleMapper;
use Foundation\ProjectMapper;
use Foundation\ACLMapper;
use Foundation\UserMapper;
use Foundation\CommentMapper;
use Utility\Singleton;

class DashboardController extends Controller {

    public function executeTask()
    {
        $task = $this->view->getTask();
        $session = Singleton::getInstance("\Control\Session");
        if($session->checkPermission($task))
        {
            switch($task)
            {
                /*case 'getDashboardPage':
                    return $this->getDashboardPage();
                break;*/

                case 'getStatisticsPage':
                    return $this->getStatisticsPage();
                break;

                case 'getProfilePage':
                    return $this->getProfilePage();
                break;

                case 'getUsersPage':
                    return $this->getUsersPage();
                break;

                case 'getArticleWritingPage':
                    return $this->getArticleWritingPage();
                break;

                case 'getProjectWritingPage':
                    return $this->getProjectWritingPage();
                break;

                case 'getUserComments':
                    return $this->getUserCommentsPage();
                break;
            }
        }else
        {
            return $this->getPermissionDenied();
        }
    }

    private function getStatisticsPage()
    {
        $databaseAdapter = new Database();

        $projectMapper = new ProjectMapper($databaseAdapter);
        $articleMapper = new ArticleMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);
        $commentMapper = new commentMapper($databaseAdapter);

        $this->view->setStatisticsPage($commentMapper->getNumberOfComments()[0]["COUNT(*)"], $articleMapper->getNumberOfArticles()[0]["COUNT(*)"], $projectMapper->getNumberOfProjects()[0]["COUNT(*)"], $userMapper->getNumberOfUsers()[0]["COUNT(*)"]);
        return $this->view->getContent();
    }

    private function getUsersPage()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $aclMapper = new ACLMapper($databaseAdapter);

        $users = $userMapper->getAllUsers();
        $roles = $aclMapper->getAllRoles();
        $this->view->assignUsers($users);
        $this->view->assignRoles($roles);
        $this->view->setUsersPage();
        return $this->view->getContent();
    }

    private function getProfilePage()
    {

        $session = Singleton::getInstance("\Control\Session");


        $this->view->setProfilePage($session->getUsername(), $session->getUserEmail(), $session->getUserImage());
        return $this->view->getContent();
    }

    private function getArticleWritingPage()
    {
        $this->view->setArticleWritingPage();
        return $this->view->getContent();
    }

    private function getProjectWritingPage()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $articles = $articleMapper->getAllArticles();
        $data = array();
        foreach($articles as $article)
        {
            array_push($data, array("title"=>$article->getTitle(), "id"=>$article->getId()));
        }

        $this->view->setProjectWritingPage($data);
        return $this->view->getContent();
    }

    private function getPermissionDenied()
    {
        $this->view->setPermissionDenied();
        return $this->view->getContent();
    }

    private function getUserCommentsPage()
    {
        $databaseAdapter = new Database();
        $commentMapper = new CommentMapper($databaseAdapter);
        $session = Singleton::getInstance("\Control\Session");
        $articlesComments = $commentMapper->getCommentsArticlesByAuthorId($session->getUserId());
        $projectsComments = $commentMapper->getCommentsProjectsByAuthorId($session->getUserId());

        $this->view->setUserCommentsgPage($articlesComments, $projectsComments);
        return $this->view->getContent();
    }

    private function getDashboardPage()
    {
        /*
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $projectMapper = new ProjectMapper($databaseAdapter);
        $session = Singleton::getInstance("\Control\Session");

        $articlesByAuthorID = $articleMapper->getAllArticlesByAuthorId($session->getUserId());
        $projectsByAuthorID = $projectMapper->getAllProjectsByAuthorId($session->getUserId());

        $articlesToDisplay = array();
        $projectsToDisplay = array();

            foreach($articlesByAuthorID as $article)
            {
                array_push($articlesToDisplay, array("title"=>$article->getTitle(), "idArticle"=>$article->getId()));
            }

            foreach($projectsByAuthorID as $project)
            {
                array_push($projectsToDisplay, array("title"=>$project->getTitle(), "idProject"=>$project->getId()));
            }


        //prendi tutti gli articoli
        $articles = $articleMapper->getAllArticles();

        $articlesDependencies = array();

        //scorri l'array di articoli e prendi il titolo e l'id

            foreach($articles as $article)
            {
                array_push($articlesDependencies, array("title"=>$article->getTitle(), "id"=>$article->getId()));
            }



        //invia alla view del profilo gli articoli e i progetti realizzati dall'utente specifico
        $this->view->assignUserWorksDone($articlesToDisplay, $projectsToDisplay);

        //invia alla view del profilo tutti i titoli degli articoli e i rispettivi Id.
        //questi dati mi servono per popolare il menu dalla quale l'utente può scegliere quali
        //articoli legare al progetto.
        $this->view->assignArticleDependencies($articlesDependencies);
        */
        return $this->view->getContent();
    }
}
