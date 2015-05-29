<?php
	namespace Control;
	include_once('Page.php');
    include_once(dirname(__FILE__).'/../Foundation/');
	include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;
    use Foundation\Database;
    use Foundation\UserMapper;

	class HomePage extends Page
	{
		public function getPage(MainView $view)
		{
            $databaseAdapter = new Database();
            $userMapper = new UserMapper($databaseAdapter);


			$view->fetchTemplate('home.tpl');
		}
	}
?>