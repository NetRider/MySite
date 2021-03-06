<?php
/**
 * Article View File
 *
 * Questo file contiene l'article View
 *
 * @package View
 * @author Matteo Polsinelli
 */
class ArticleView extends View {

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
	 * metodo getUserId
	 *
	 * @return string ritorna il valore associato a "UserID" dentro $_REQUEST
	 */
	public function getUserId()
	{
		return $this->getRequest('UserID');
	}

	/**
	 * metodo getArticleDescription
	 *
	 * @return string ritorna il valore associato a "description" dentro $_REQUEST
	 */
	public function getArticleDescription()
	{
		return $this->getRequest('description');
	}

	/**
	 * metodo getArticleText
	 *
	 * @return string ritorna il valore associato a "articleText" dentro $_REQUEST
	 */
	public function getArticleText()
	{
		return $this->getRequest('articleText');
	}

	/**
	 * metodo getArticleTitle
	 *
	 * @return string ritorna il valore associato a "title" dentro $_REQUEST
	 */
	public function getArticleTitle()
	{
		return $this->getRequest('title');
	}

	/**
	 * metodo getArticleId
	 *
	 * @return string ritorna il valore associato a "Id" dentro $_REQUEST
	 */
	public function getArticleId()
	{
		return $this->getRequest('Id');
	}

	/**
	 * metodo getArticleToRemove
	 *
	 * @return string ritorna il valore associato a "articleToRemove" dentro $_REQUEST
	 */
	public function getArticleToRemove()
	{
		return $this->getRequest('articleToRemove');
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
	 * metodo getArticleImage
	 *
	 * @return string ritorna il valore associato a "image" dentro $_REQUEST
	 */
	public function getArticleImage()
	{
        return $_FILES['image'];
	}

	/**
	 * metodo assignArticleData
	 *
	 * assegna tutti i dati per la visualizzazione dell'articolo
	 *
	 * @param int
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param array
	 */
	public function assignArticleData($articleId, $title, $text, $author, $image, $date, $comments)
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

		$this->assign('articleId', $articleId);
		$this->assign('articleTitle', $title);
		$this->assign('date', $date);
		$this->assign('articleText', $text);
		$this->assign('author', $author);
		$this->assign('articleImage', $image);
		$this->assign('comments', $comments);
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
	 * metodo getContent
	 *
	 * crea la pagina html
	 *
	 * @return string Ritorna il template costruito con smarty
	 */
	public function getContent()
	{
		return $this->fetch($this->template.'.tpl');
	}
}
