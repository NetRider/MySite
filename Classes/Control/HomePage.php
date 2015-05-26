<?php
	namespace Control;
	include_once('Page.php');
    include_once(dirname(__FILE__).'/../Foundation/ArticleDatabase.php');
	include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;

	class HomePage extends Page
	{
		public function getPage(MainView $view)
		{
			$view->fetchTemplate('home.tpl');
		}
	}
?>