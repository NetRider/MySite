<?php
namespace Control;

include_once('Page.php');
include_once(dirname(__FILE__).'/../Entity/User.php');
include_once(dirname(__FILE__).'/../Entity/Comment.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;
use Entity\User;
use Entity\Comment;
use Foundation\Database;
use Foundation\UserMapper;
use Foundation\CommentMapper;


class CommentController extends Page {

	public function getPage(MainView $view) {

		switch ($view->getDataFromRequest('CommentAction')) {
			case 'addComment':
				$databaseAdapter = new Database();
				$commentMapper = new CommentMapper($databaseAdapter);
				$comment = new Comment($view->getDataFromRequest('text'), $view->getDataFromRequest('date'), $view->getDataFromRequest('userId') , $view->getDataFromRequest('articleId'));
				if($commentMapper->insert($comment))
					print("ok");
				else
					print("notok");
			break;
		}
	}
}
