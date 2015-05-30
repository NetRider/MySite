<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 30/05/15
 * Time: 12:56
 */

namespace Control;

include_once('Page.php');
include_once(dirname(__FILE__).'/../View/MainView.php');
include_once(dirname(__FILE__).'/../Entity/Article.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');

use View\MainView;
use Foundation\Database;
use Foundation\ArticleMapper;
use Entity\Article;

class NewArticlePage extends Page {

    public function getPage(MainView $view) {

        switch($this->get('articleAction'))
        {
            case 'getNewArticlePage':
                $view->fetchTemplate('articleForm.tpl');
                break;

            case 'addNewArticle':
                print("sono qui");
                $this->storeArticle();
                break;
        }
    }

    public function storeArticle() {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $article = new Article($this->get('title'), $this->get('text'), 0, null);
        $articleMapper->insert($article);
    }
}