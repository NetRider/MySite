<?php
	namespace Control;
	include_once('IPage.php');
    include_once(dirname(__FILE__).'/../Foundation/ArticleDatabase.php');
	include_once(dirname(__FILE__).'/../View/IView.php');

    use View\IView;

	class HomePage implements IPage
	{
		public function getPage(IView $view)
		{
			$view->fetchTemplate('home.tpl');
		}
	}
?>