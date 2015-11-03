<?php



class CommentController extends Controller {

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

	private function addComment()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		$session = Singleton::getInstance("Session");
		$comment = new Comment($this->view->getCommentText(), date('o-m-d H:i:s'), $session->getUserId());

		if($this->view->getArticleId() != "")
			$this->view->responseAjaxCall($commentMapper->insertArticleComment($comment, $this->view->getArticleId()));
		elseif($this->view->getProjectId() != "")
			$this->view->responseAjaxCall($commentMapper->insertProjectComment($comment, $this->view->getProjectId()));
	}

	private function removeCommentById()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		$this->view->responseAjaxCall($commentMapper->removeCommentById($this->view->getCommentId()));
	}
}
