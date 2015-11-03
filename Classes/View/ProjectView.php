<?php



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
		return $this->getRequest('projectId');
	}

	public function getProjectDependencies()
	{
		return $this->getRequest('idDependencies');

	}

	public function getProjectDescription()
	{
		return $this->getRequest('description');

	}

	public function getProjectText()
	{
		return $this->getRequest('text');

	}

	public function getProjectTitle()
	{
		return $this->getRequest('title');

	}

	public function setTemplate($template)
	{
		$this->template = $template;
	}

	public function getProjectToRemove()
	{
		return $this->getRequest('projectToRemove');
	}


	public function assignProjectData($projectId, $title, $text, $author, $image, $date, $comments, $dependencies)
	{
		$session = Singleton::getInstance("Session");
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
		$this->assign('date', $date);
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

	private function getRequest($key)
	{
		if(isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;
	}

	public function getContent()
	{
		return $this->fetch($this->template . '.tpl');
	}
}
