<?php
/**
 * Comment Controller File
 *
 * Questo file contiene il comment controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */

class CommentController extends Controller {

	/**
	 * Smista le richieste in arrivo dalla ArticleView.
	 */
	 public function executeTask()
	 {
		 switch ($this->view->getTask())
		 {
			case 'addComment':
			 	return $this->addComment();
			break;

			case 'removeCommentById':
				return $this->removeCommentById();
			break;
		}
	}

	/**
	 * Memorizza un commento nel database
	 *
	 * Istanzia un commento con i dati in upload e prova ad inserirlo nel database.
	 * Distingue se il commento è riferito ad un articolo oppure ad un progetto.
	 *
     */
	private function addComment()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		$session = Singleton::getInstance("Session");
		$comment = new CommentEntity($this->view->getCommentText(), date('o-m-d H:i:s'), $session->getUserId());

		if($this->view->getArticleId() != "")
			$this->view->responseAjaxCall($commentMapper->insertArticleComment($comment, $this->view->getArticleId()));
		elseif($this->view->getProjectId() != "")
			$this->view->responseAjaxCall($commentMapper->insertProjectComment($comment, $this->view->getProjectId()));
	}

	/**
     * Cancella un commento dal database
     *
     * Cancella un commento dal database attraverso l'id.
     *
     */

	private function removeCommentById()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		$this->view->responseAjaxCall($commentMapper->removeCommentById($this->view->getCommentId()));
	}
}
