<?php
	namespace Control;
	include_once('Page.php');
    include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
    include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;
    use Foundation\Database;
    use Foundation\ArticleMapper;

	class HomePage extends Page
	{
		public function getPage(MainView $view)
		{
            $databaseAdapter = new Database();
            $articleMapper = new ArticleMapper($databaseAdapter);
            $lastThreeArticles = $articleMapper->getLastThreeArticlesTitles();

            $view->assignData("homeArticles", $lastThreeArticles);
            $view->assignData('templateToDisplay', 'home.tpl');
		}
	}
?>