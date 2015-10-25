<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

use Utility\Singleton;


class ProjectView extends View {

	private $template;

	public function __construct()
	{
		 parent::__construct();
	}

	public function getTask()
	{
		if(isset($_REQUEST['task']))
			return $_REQUEST['task'];
		else
			return false;
	}

	public function getProjectId()
	{
		if(isset($_REQUEST['projectId']))
			return $_REQUEST['projectId'];
		else
			return false;
	}

	public function getProjectDependencies()
	{
		if(isset($_REQUEST['idDependencies']))
			return $_REQUEST['idDependencies'];
		else
			return false;
	}

	public function getProjectDescription()
	{
		if(isset($_REQUEST['description']))
			return $_REQUEST['description'];
		else
			return false;
	}

	public function getProjectText()
	{
		if(isset($_REQUEST['text']))
			return $_REQUEST['text'];
		else
			return false;
	}

	public function getProjectTitle()
	{
		if(isset($_REQUEST['title']))
			return $_REQUEST['title'];
		else
			return false;
	}

	public function setTemplate($template)
	{
		$this->template = $template;
	}

	public function assignProjectData($projectId, $title, $text, $author, $image, $comments, $dependencies)
	{
		$session = Singleton::getInstance("\Control\Session");
		if($session->userIsLogged())
		{
			$this->assign('loggedIn', true);
			$this->assign('authorId', $session->getUserId());
			$this->assign('userimage', $session->getUserImage());
			$this->assign('username', $session->getUserName());
		}else
		{
			$this->assign('loggedIn', false);
		}
		$this->assign('projectId', $projectId);
		$this->assign('projectTitle', $title);
		$this->assign('projectText', $text);
		$this->assign('projectAuthor', $author);
		$this->assign('projectImage', $image);
		$this->assign('dependencies', $dependencies);
		$this->assign('comments', $comments);
	}

	public function getProjectImage()
	{
        if(is_uploaded_file($_FILES['image']['tmp_name']))
		{
            $image = basename($_FILES["image"]["name"]);
            $target_file = "Data/projects_images/" . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			return $image;
        }else
		{
			return "default_project_image.jpg";
		}
	}

	public function assignProjectsCards($projectsCards)
	{
		$this->assign('projectsCards', $projectsCards);
	}

	public function getContent()
	{
		return $this->fetch($this->template . '.tpl');
	}
}
