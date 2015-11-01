<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/User.php');
include_once(dirname(__FILE__).'/../Entity/Comment.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/View.php');

use Control\Controller;
use View\View;
use Entity\User;
use Entity\Comment;
use Foundation\Database;
use Foundation\UserMapper;
use Foundation\CommentMapper;
use Utility\Singleton;


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
		$session = Singleton::getInstance("\Control\Session");
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
