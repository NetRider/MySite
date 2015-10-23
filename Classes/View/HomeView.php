<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

class HomeView extends View {

	public function __construct()
	{
		 parent::__construct();
	}

	public function assignHomeArticles($homeArticles)
	{
		$this->assign('homeArticles', $homeArticles);
	}

	public function getContent()
	{
		return $this->fetch('home.tpl');
	}
}
