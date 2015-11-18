<?php
/**
 * Comment View File
 *
 * Questo file contiene il comment View
 *
 * @package View
 * @author Matteo Polsinelli
 */
class CommentView extends View {

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
	 * metodo getArticleId
	 *
	 * @return string con l'id dell'articolo a cui è riferito il commento
	 */
	public function getArticleId()
	{
		return $this->getRequest('articleId');
	}

	/**
	 * metodo getProjectId
	 *
	 * @return string con l'id dell'progetto a cui è riferito il commento
	 */
	public function getProjectId()
	{
		return $this->getRequest('projectId');
	}

	/**
	 * metodo getCommentText
	 *
	 * @return string con il testo del commento
	 */
	public function getCommentText()
	{
		return $this->getRequest('text');
	}

	/**
	 * metodo getCommentId
	 *
	 * @return string con l'id del commento
	 */
	public function getCommentId()
	{
		return $this->getRequest('id');
	}

	/**
	 * metodo setTemplate
	 *
	 * imposta il template da visualizzare
	 *
	 * @param string $template
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
