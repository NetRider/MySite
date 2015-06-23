<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/Article.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;
use Foundation\CommentMapper;
use Foundation\Database;
use Foundation\ArticleMapper;
use Entity\Article;
use Foundation\UserMapper;

class ArticleController extends Page {

    public function getPage(MainView $view) {

        switch($view->getDataFromRequest('ArticleAction'))
        {
            case 'addNewArticle':
            $databaseAdapter = new Database();
            $articleMapper = new ArticleMapper($databaseAdapter);
            $article = new Article($view->getDataFromRequest('userID'), $view->getDataFromRequest('title'), $view->getDataFromRequest('description'), $view->getDataFromRequest('textArticle'), 0);
            $articleMapper->insert($article);
            $view->assignData('userid', $this->getDataFromSession('userid'));
            $view->assignData('templateToDisplay', 'profileView.tpl');
            break;

            case 'getArticleView':
            $databaseAdapter = new Database();
            $articleMapper = new ArticleMapper($databaseAdapter);
            $commentMapper = new CommentMapper($databaseAdapter);
            $userMapper = new UserMapper($databaseAdapter);
            $condition = array("id"=>$view->getDataFromRequest('articleId'));
            $article = $articleMapper->find(array(), $condition, null);
            $condition = array("articleId"=>$article[0]->getId());
            $comments = $commentMapper->find(array(), $condition, null);
            $data = array();

            foreach ($comments as $comment) {
                $user = $userMapper->find(array(), array("id"=>$comment->getUserId()), null);
                array_push($data, array("author"=>$user[0]->getNickname(), "image"=>$user[0]->getImage(), "text"=>$comment->getText(), "authorId"=>$user[0]->getId()));
            }
            $view->assignData("articleTitle", $article[0]->getTitle());
            $view->assignData("articleText", $article[0]->getText());
            $view->assignData("authorId", $this->getDataFromSession("userid"));

            $view->assignData("comments", $data);

            $view->assignData('templateToDisplay', 'articleView.tpl');
            break;

            case 'getArticlesCards':
            $databaseAdapter = new Database();
            $articleMapper = new ArticleMapper($databaseAdapter);
            $userMapper = new UserMapper($databaseAdapter);
            $articles = $articleMapper->getAllArticles();
            $data = array();

            foreach ($articles as $article) {
                $user = $userMapper->find(array(), array("id"=>$article->getUserId()), null);
                array_push($data, array("title"=>$article->getTitle(), "author"=>$user[0]->getNickname(), "image"=>$user[0]->getImage(), "description"=>$article->getDescription(), "articleId"=>$article->getId()));
            }

            $data = array_chunk($data, 3);
            $view->assignData('data', $data);
            $view->assignData('templateToDisplay', 'articlesCards.tpl');
            break;
        }
        $view->fetchTemplate('main.tpl');
    }
}
