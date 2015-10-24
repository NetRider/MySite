<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/Project.php');
include_once(dirname(__FILE__).'/../Foundation/ProjectMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/View.php');

use Control\Controller;
use View\View;
use Foundation\CommentMapper;
use Foundation\Database;
use Entity\Project;
use Foundation\ProjectMapper;
use Foundation\UserMapper;
use Foundation\ArticleMapper;
use Utility\Singleton;

class ProjectController extends Controller {

    public function executeTask()
    {
        switch($this->view->getTask())
        {
            case 'addNewProject':
                return $this->addNewProject();
            break;

            case 'getProjectView':
                return $this->getProjectView();
            break;

            case 'getProjectsCards':
                return $this->getProjectsCards();
            break;

            case 'deleteProject':
                return $this->deleteProject();
            break;
        }
    }

    private function getProjectsCards()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);
        $projects = $projectMapper->getAllProjects();
        $data = array();

        if($projects)
        {
            foreach ($projects as $project)
            {
                array_push($data, array("image"=>$project->getImage(), "title"=>$project->getTitle(), "description"=>$project->getDescription(), "id"=>$project->getId()));
            }
        }

        $this->view->assignProjectsCards($data);
        $this->view->setTemplate('projectsCards');
        return $this->view->getContent();
    }

    private function getProjectView()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $articleMapper = new ArticleMapper($databaseAdapter);
        $commentMapper = new CommentMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);

        $project = $projectMapper->getProjectById($this->view->getProjectId());
        $comments = $commentMapper->getCommentsByProjectId($project->getId());
        $projectAuthor = $userMapper->getUserById($project->getUserId());

        $comments = array();

        if($comments)
        {
            foreach ($comments as $comment)
            {
                $user = $userMapper->getUserByID($comment->getUserId());
                array_push($comments, array("author"=>$user->getNickname(), "image"=>$user->getImage(), "text"=>$comment->getText(), "authorId"=>$user->getId()));
            }
        }

        $dependencies = $articleMapper->getArticlesDependenciesByProjectId($project->getId());
        $this->view->assignProjectData($project->getTitle(), $project->getText(), $projectAuthor->getUserName(), $project->getImage(), $comments, $dependencies);
        $this->view->setTemplate('projectViewer');
        return $this->view->getContent();
    }

    private function addNewProject()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $session = Singleton::getInstance("\Control\Session");
        $project = new Project($session->getUserId(), $this->view->getProjectTitle(), $this->view->getProjectDescription(), $this->view->getProjectText(), "dia", "Data/projects_images/" . $this->view->getProjectImage());
        $dependencies = $this->view->getProjectDependencies();
        $projectMapper->insertProject($project, $dependencies);
        $this->view->setTemplate('projectSaved');
        return $this->view->getContent();
    }

    private function deleteProject($id)
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $commentMapper = new CommentMapper($databaseAdapter);
        $projectMapper->removeProjectById($this->view->getProjectId());
        $commnetMapper->removeCommentByArticleId($this->view->getArticleId());
    }
}