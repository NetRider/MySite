<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

use Utility\Singleton;

class CommentView extends View {

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

	private function getRequest($key)
	{
		if(isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;
	}

	public function getArticleId()
	{
		return $this->getRequest('articleId');
	}

	public function getCommentText()
	{
		return $this->getRequest('text');
	}

	public function getCommentDate()
	{
		return $this->getRequest('date');
	}

	public function setTemplate($template)
	{
		$this->template = $template;
	}

	public function getContent()
	{
		return $this->fetch($this->template.'.tpl');
	}
}
