<?php
/**
 * DashBoard View File
 *
 * Questo file contiene la DashBoard View
 *
 * @package View
 * @author Matteo Polsinelli
 */
class DashboardView extends View {

	/**
	* contiene il nome del template da caricare
	*
	* @var string
	*/
	private $template;

	/**
	 * metodo getTask
	 *
	 * @return string con il task per il controller - false altrimenti
	 */
	public function getTask()
	{
		if(isset($_REQUEST['task']))
			return $_REQUEST['task'];
		else
			return false;
	}

	/**
	 * metodo assignUserWorksDone
	 *
	 * @param array $projectsToDisplay
	 * @param array $articlesToDisplay
	 */
	public function assignUserWorksDone($articlesToDisplay, $projectsToDisplay)
	{
		$this->assign('articles', $articlesToDisplay);
		$this->assign('projects', $projectsToDisplay);
	}

	/**
	 * metodo assignArticleDependencies
	 *
	 * @param array $articles di titoli di articoli
	 */
	public function assignArticleDependencies($articles)
	{
		$this->assign('articlesDependencies', $articles);
	}

	/**
	 * metodo assignUsers
	 *
	 * @param array $users di username e id relativi agli utenti
	 */
	public function assignUsers($users)
	{
		$this->assign("users", $users);
	}

	/**
	 * metodo assignRole
	 *
	 * @param array $roles con i nomi dei ruoli
	 */
	public function assignRoles($roles)
	{
		$this->assign("options", $roles);
	}

	/**
	 * metodo setStatisticsPage
	 *
	 * imposta il template dashStatistics
	 *
	 * @param int $numComments numero di commenti
	 * @param int $numArticles numero di articoli
	 * @param int $numProjects numero di progetti
	 * @param int $numUsers numero di utenti
	 */
	public function setStatisticsPage($numComments, $numArticles, $numProjects, $numUsers)
	{
		$this->assign("numComments", $numComments);
		$this->assign("numArticles", $numArticles);
		$this->assign("numProjects", $numProjects);
		$this->assign("numUsers", $numUsers);
		$this->template = "dashStatistics.tpl";
	}

	/**
	 * metodo setUsersPage
	 *
	 * imposta il template dashUsers
	 */
	public function setUsersPage()
	{
		$this->template = "dashUsers.tpl";
	}

	/**
	 * metodo setProfilePage
	 *
	 * imposta il template dashProfile.tpl
	 *
	 * @param int $username numero di commenti
	 * @param int $userEmail numero di articoli
	 * @param int $userImage numero di progetti
	 */
	public function setProfilePage($username, $userEmail, $userImage)
	{
		$this->assign("username", $username);
		$this->assign("userEmail", $userEmail);
		$this->assign("userImage", $userImage);
		$this->template = "dashProfile.tpl";
	}

	/**
	 * metodo setArticleWritingPage
	 *
	 * imposta il template dashWriteArticle
	 */
	public function setArticleWritingPage()
	{
		$this->template = "dashWriteArticle.tpl";
	}

	/**
	 * metodo setProjectWritingPage
	 *
	 * imposta il template dashWriteProject
	 */
	public function setProjectWritingPage($dependencies)
	{
		$this->assign("articles", $dependencies);
		$this->template = "dashWriteProject.tpl";
	}

	/**
	 * metodo setPermissionDenied
	 *
	 * imposta il template ddashPermissionDenied
	 */
	public function setPermissionDenied()
	{
		$this->template = "dashPermissionDenied.tpl";
	}

	/**
	 * metodo setUserCommentsgPage
	 *
	 * imposta il template dashComments
	 *
	 * @param array $articlesComments
 	 * @param array $projectsComments
	 */
	public function setUserCommentsgPage($articlesComments, $projectsComments)
	{
		$this->assign("articlesComments", $articlesComments);
		$this->assign("projectsComments", $projectsComments);
		$this->template = "dashComments.tpl";

	}

	/**
	 * metodo setJobsPage
	 *
	 * imposta il template dashJobs
	 *
	 * @param array $articles
	 * @param array $projects
	 */
	public function setJobsPage($articles, $projects)
	{
		$this->assign("articles", $articles);
		$this->assign("projects", $projects);
		$this->template = "dashJobs.tpl";
	}

	/**
	 * metodo getContent
	 *
	 * crea la pagina html
	 *
	 * @return string Ritorna il template costruito con smarty
	 */
	public function getContent()
	{
		$session = Singleton::getInstance("Session");
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
