<?php

class ArticleView extends View {

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

	public function getUserId()
	{
		return $this->getRequest('UserID');
	}

	public function getArticleDescription()
	{
		return $this->getRequest('description');
	}

	public function getArticleText()
	{
		return $this->getRequest('articleText');
	}

	public function getArticleTitle()
	{
		return $this->getRequest('title');
	}

	public function getArticleId()
	{
		return $this->getRequest('Id');
	}

	public function getArticleToRemove()
	{
		return $this->getRequest('articleToRemove');
	}

	public function getArticleImage()
	{
        if(is_uploaded_file($_FILES['image']['tmp_name']))
		{
			error_log(print_r("ho caricato immagine", true));
            $image = basename($_FILES["image"]["name"]);
            $target_file = "Data/articles_images/" . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
			return $target_file;
        }else
		{
			return "Data/articles_images/default_article_image.jpg";
		}
	}

	public function assignArticlesCards($articlesCards)
	{
		$this->assign('articlesCards', $articlesCards);
	}

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

	private function getRequest($key)
	{
		if(isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;
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
