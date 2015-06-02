<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 30/05/15
 * Time: 12:56
 */

namespace Control;

include_once(dirname(__FILE__).'/../Entity/Article.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;
use Foundation\CommentMapper;
use Foundation\Database;
use Foundation\ArticleMapper;
use Entity\Article;

class ArticlePage extends Page {

    public function getPage(MainView $view) {

        switch($this->getDataFromRequest('articleAction'))
        {
            case 'getNewArticlePage':
                $view->assignData('templateToDisplay', 'articleForm.tpl');
                break;

            case 'addNewArticle':
                $this->storeArticle();
                break;

            case 'getArticleView':
                $databaseAdapter = new Database();
                $article = $this->getArticle($databaseAdapter);
                $comments = $this->getComments($databaseAdapter, $article->getId());

                $view->assignData("articleTitle", $article->getTitle());
                $view->assignData("articleText", $article->getText());
                $view->assignData("comments", $comments);
                $view->assignData('templateToDisplay', 'articleView.tpl');
                break;
        }
    }

    public function storeArticle() {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $article = new Article($this->getDataFromRequest('title'), $this->getDataFromRequest('text'), 0, null);
        $articleMapper->insert($article);
    }

    public function getArticle($databaseAdapter) {
        $articleMapper = new ArticleMapper($databaseAdapter);
        $condition = array("title"=>$this->getDataFromRequest('title'));
        $article = $articleMapper->find(array(), $condition, null);
        return $article[0];
    }

    public function getComments($databaseAdapter, $articleId) {
        $commentMapper = new CommentMapper($databaseAdapter);
        $bind = array("text", "userId", "date", "articleId");
        $condition = array("articleId"=>$articleId);
        $comments = $commentMapper->getAllCommentsByArticleId($bind, $condition);
        return $comments;
    }
}