<?php
/**
 * Project View File
 *
 * Questo file contiene il Project View
 *
 * @package View
 * @author Matteo Polsinelli
 */
class ProjectView extends View {

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
	 * metodo getProjectId
	 *
	 * @return string ritorna il valore associato a "Id" dentro $_REQUEST
	 */
	public function getProjectId()
	{
		return $this->getRequest('Id');
	}

	/**
	 * metodo getProjectDependencies
	 *
	 * @return string ritorna il valore associato a "idDependencies" dentro $_REQUEST
	 */
	public function getProjectDependencies()
	{
		return $this->getRequest('idDependencies');
	}

	/**
	 * metodo getProjectDescription
	 *
	 * @return string ritorna il valore associato a "description" dentro $_REQUEST
	 */
	public function getProjectDescription()
	{
		return $this->getRequest('description');
	}

	/**
	 * metodo getProjectText
	 *
	 * @return string ritorna il valore associato a "text" dentro $_REQUEST
	 */
	public function getProjectText()
	{
		return $this->getRequest('text');
	}

	/**
	 * metodo getProjectTitlet
	 *
	 * @return string ritorna il valore associato a "title" dentro $_REQUEST
	 */
	public function getProjectTitle()
	{
		return $this->getRequest('title');
	}

	/**
	 * metodo getPageNumber
	 *
	 * @return string ritorna il valore associato a "page" dentro $_REQUEST
	 */
	public function getPageNumber()
	{
		return $this->getRequest('page');
	}

	/**
	 * metodo setTemplate
	 *
	 * imposta il template da visualizzare
	 *
	 * @param string template
	 */
	public function setTemplate($template)
	{
		$this->template = $template;
	}

	/**
	 * metodo getProjectToRemove
	 *
	 * @return string ritorna il valore associato a "projectToRemove" dentro $_REQUEST
	 *
	 */
	public function getProjectToRemove()
	{
		return $this->getRequest('projectToRemove');
	}

	/**
	 * metodo assignProjectData
	 *
	 * assegna tutti i dati per la visualizzazione del progetto
	 *
	 * @param int
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param array
	 */
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

	/**
	 * metodo getProjectImage
	 *
	 * @return string ritorna il valore associato a "image" dentro $_REQUEST
	 */
	public function getProjectImage()
	{
		return $_FILES['image'];
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
		return $this->fetch($this->template . '.tpl');
	}
}
