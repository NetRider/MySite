<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

use Utility\Singleton;


class DashboardView extends View {

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

	public function assignUserWorksDone($articlesToDisplay, $projectsToDisplay)
	{
		$this->assign('articles', $articlesToDisplay);
		$this->assign('projects', $projectsToDisplay);
	}

	public function assignArticleDependencies($articles)
	{
		$this->assign('articlesDependencies', $articles);
	}

	public function assignUsers($users)
	{
		$this->assign("users", $users);
	}

	public function assignRoles($roles)
	{
		$this->assign("options", $roles);
	}

	public function setStatisticsPage($numComments, $numArticles, $numProjects, $numUsers)
	{
		$this->assign("numComments", $numComments);
		$this->assign("numArticles", $numArticles);
		$this->assign("numProjects", $numProjects);
		$this->assign("numUsers", $numUsers);
		$this->template = "dashStatistics.tpl";
	}

	public function setUsersPage()
	{
		$this->template = "dashUsers.tpl";
	}

	public function setProfilePage($username, $userEmail, $userImage)
	{
		$this->assign("username", $username);
		$this->assign("userEmail", $userEmail);
		$this->assign("userImage", $userImage);
		$this->template = "dashProfile.tpl";
	}

	public function setArticleWritingPage()
	{
		$this->template = "dashWriteArticle.tpl";
	}

	public function setProjectWritingPage($dependencies)
	{
		$this->assign("articles", $dependencies);
		$this->template = "dashWriteProject.tpl";
	}

	public function setPermissionDenied()
	{
		$this->template = "dashPermissionDenied.tpl";
	}

	public function setUserCommentsgPage($articlesComments, $projectsComments)
	{
		$this->assign("articlesComments", $articlesComments);
		$this->assign("projectsComments", $projectsComments);
		$this->template = "dashComments.tpl";

	}

	public function setJobsPage($articles, $projects)
	{
		$this->assign("articles", $articles);
		$this->assign("projects", $projects);
		$this->template = "dashJobs.tpl";
	}

	public function getContent()
	{
		$session = Singleton::getInstance("\Control\Session");
		$this->assign('userid', $session->getUserId());
		$this->assign('userimage', $session->getUserImage());
		$this->assign('dashPage', $this->fetch($this->template));
		$perms = $session->getAllPermissions();

		foreach($perms as $perm)
		{
			$this->assign($perm, true);
		}

		return $this->fetch('mainDashboard.tpl');
	}
}
