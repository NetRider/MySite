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

			case 'removeArticleComment':
				return $this->removeArticleComment();
			break;

			case 'removeProjectComment':
				return $this->removeProjectcomment();
			break;
		}
	}

	private function addComment()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		$session = Singleton::getInstance("\Control\Session");
		$comment = new Comment($this->view->getCommentText(), $this->view->getCommentDate(), $session->getUserId());

		if($this->view->getArticleId() != "")
		{
			if($commentMapper->insertArticleComment($comment, $this->view->getArticleId()))
				return "true";
			else
				return "false";
		}elseif($this->view->getProjectId() != "")
		{
			if($commentMapper->insertProjectComment($comment, $this->view->getProjectId()))
				return "true";
			else
				return "false";
		}
	}

	private function removeArticleComment()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		if($commentMapper->removeArticleComment($this->view->getCommentId()))
			return "true";
		else
			return "false";
	}

	private function removeProjectComment()
	{
		$databaseAdapter = new Database();
		$commentMapper = new CommentMapper($databaseAdapter);
		if($commentMapper->removeProjectComment($this->view->getCommentId()))
			return "true";
		else
			return "false";
	}
}
