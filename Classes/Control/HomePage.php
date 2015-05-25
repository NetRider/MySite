<?php
	namespace Control;
	include_once('IPage.php');
    include_once(dirname(__FILE__).'/../Foundation/ArticleDatabase.php');
	include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;

	class HomePage implements IPage
	{
		public function getPage(MainView $view)
		{
			$view->fetchTemplate('home.tpl');
		}
	}
?>