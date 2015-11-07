<?php

class DashboardController extends Controller {

    public function executeTask()
    {
        $task = $this->view->getTask();
        error_log($task);
        $session = Singleton::getInstance("Session");
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

                case 'getJobsPage':
                    return $this->getJobsPage();
                break;

                case 'getArticlesStatistics':
                    return $this->getArticlesStatistics();
                break;

                case 'getCommentsStatistics':
                    return $this->getCommentsStatistics();
                break;

                case 'getProjectsStatistics':
                    return $this->getProjectsStatistics();
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
        $commentMapper = new CommentMapper($databaseAdapter);

        $this->view->setStatisticsPage($commentMapper->getNumberOfComments()[0]["COUNT(*)"], $articleMapper->getNumberOfArticles()[0]["COUNT(*)"], $projectMapper->getNumberOfProjects()[0]["COUNT(*)"], $userMapper->getNumberOfUsers()[0]["COUNT(*)"]);
        return $this->view->getContent();
    }

    private function getUsersPage()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $aclMapper = new ACLMapper($databaseAdapter);

        $users = $userMapper->getUsersDash();
        $roles = $aclMapper->getRolesDash();
        $this->view->assignUsers($users);
        $this->view->assignRoles($roles);
        $this->view->setUsersPage();
        return $this->view->getContent();
    }

    private function getProfilePage()
    {

        $session = Singleton::getInstance("Session");


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
        $session = Singleton::getInstance("Session");
        $articlesComments = $commentMapper->getCommentsArticlesByAuthorId($session->getUserId());
        $projectsComments = $commentMapper->getCommentsProjectsByAuthorId($session->getUserId());

        $this->view->setUserCommentsgPage($articlesComments, $projectsComments);
        return $this->view->getContent();
    }

    private function getJobsPage()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $articleMapper = new ArticleMapper($databaseAdapter);
        $articles = $articleMapper->getArticlesForDash();
        $projects = $projectMapper->getProjectsForDash();

        $this->view->setJobsPage($articles, $projects);
        return $this->view->getContent();
    }

    private function getCommentsStatistics()
    {
        $databaseAdapter = new Database();
        $commentMapper = new CommentMapper($databaseAdapter);
        $this->view->responseAjaxCall(json_encode($commentMapper->getCommentsCountedByDate()));
    }

    private function getArticlesStatistics()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $this->view->responseAjaxCall(json_encode($articleMapper->getArticlesCountedByDate()));
    }

    private function getProjectsStatistics()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $this->view->responseAjaxCall(json_encode($projectMapper->getProjectsCountedByDate()));
    }

    private function getDashboardPage()
    {
        return $this->view->getContent();
    }
}
