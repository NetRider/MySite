<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/Article.php');
include_once(dirname(__FILE__).'/../Foundation/ArticleMapper.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/CommentMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/View.php');

use Control\Controller;
use View\View;
use Foundation\CommentMapper;
use Foundation\Database;
use Foundation\ArticleMapper;
use Entity\Article;
use Foundation\UserMapper;
use Utility\Singleton;

class ArticleController extends Controller {

    public function executeTask()
    {
        switch($this->view->getTask())
        {
            case 'addNewArticle':
                return $this->addNewArticle();
            break;

            case 'getArticleView':
                return $this->getArticleView();
            break;

            case 'getArticlesCards':
                return $this->getArticlesCards();
            break;

            case 'deleteArticle':
                return $this->deleteArticle();
            break;
        }
    }

    private function getArticlesCards()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);
        $articles = $articleMapper->getAllArticles();
        $data = array();

        if($articles)
        {
            foreach ($articles as $article)
            {
                array_push($data, array("title"=>$article->getTitle(), "description"=>$article->getDescription(), "id"=>$article->getId(), "image"=>$article->getImage()));
            }
        }

        $this->view->assignArticlesCards($data);
        $this->view->setTemplate('articlesCards');
        return $this->view->getContent();
    }

    private function getArticleView()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $commentMapper = new CommentMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);
        $article = $articleMapper->getArticleById($this->view->getArticleId());

        $comments = $commentMapper->getCommentsByArticleId($article->getId());
        $articleAuthor = $userMapper->getuserById($article->getAuthorId());
        $data = array();

        if($comments)
        {
            foreach ($comments as $comment)
            {
                $user = $userMapper->getUserByID($comment->getUserId());
                array_push($data, array("author"=>$user->getUsername(), "image"=>$user->getImage(), "text"=>$comment->getText(), "authorId"=>$user->getId()));
            }
        }

        $this->view->assignArticleData($article->getId(), $article->getTitle(), $article->getText(), $articleAuthor->getUsername(), $article->getImage(), $data);
        $this->view->setTemplate('articleViewer');
        return $this->view->getContent();
    }

    private function addNewArticle()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $session = Singleton::getInstance("\Control\Session");
        $article = new Article($session->getUserId(), $this->view->getArticleTitle(), $this->view->getArticleDescription(), $this->view->getArticleText(), 0, $this->view->getArticleImage());
        if($articleMapper->insert($article))
            return "true";
        else
            return "false";
    }

    private function deleteArticle()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $file = $articleMapper->getArticleImageById($this->view->getArticleToRemove());
        if($file && $file != "Data/articles_images/default_article_image.jpg")
            unlink("/Applications/XAMPP/xamppfiles/htdocs/MySite/".$file);
        if($articleMapper->removeArticleById($this->view->getArticleToRemove()))
            return "true";
        else
            return "false";
    }
}
