<?php

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

            case 'getArticlesCardsPage':
                return $this->getArticlesCardsPage();
            break;

            case 'getArticlesCardsByPage':
                return $this->getArticlesCardsByPage();
            break;

            case 'deleteArticle':
                return $this->deleteArticle();
            break;
        }
    }

    private function getArticlesCardsByPage()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);
        $pageNumber = $this->view->getPageNumber();

        $bottomLimit = ($pageNumber - 1) * 10;
        
        $articles = $articleMapper->getArticlesCardsByPageNumber(array($bottomLimit, 10));

        $data = array();

        if($articles)
        {
            foreach ($articles as $article)
            {
                array_push($data, array("title"=>$article->getTitle(), "description"=>$article->getDescription(), "id"=>$article->getId(), "image"=>$article->getImage()));
            }
        }

        $this->view->responseAjaxCall(json_encode($data));
    }

    private function getArticlesCardsPage()
    {
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
        error_log(print_r($comments, true));

        if($comments)
        {
            if(is_array($comments))
            {
                foreach ($comments as $comment)
                {
                    $user = $userMapper->getUserByID($comment->getUserId());
                    array_push($data, array("author"=>$user->getUsername(), "image"=>$user->getImage(), "text"=>$comment->getText(), "authorId"=>$user->getId(), "date"=>$comment->getDate()));
                }
            }else {
                $user = $userMapper->getUserByID($comments->getUserId());
                array_push($data, array("author"=>$user->getUsername(), "image"=>$user->getImage(), "text"=>$comments->getText(), "authorId"=>$user->getId(), "date"=>$comments->getDate()));
            }

        }

        $this->view->assignArticleData($article->getId(), $article->getTitle(), $article->getText(), $articleAuthor->getUsername(), $article->getImage(), $article->getDate(), $data);
        $this->view->setTemplate('articleViewer');
        return $this->view->getContent();
    }

    private function addNewArticle()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $session = Singleton::getInstance("Session");
        $article = new ArticleEntity($session->getUserId(), $this->view->getArticleTitle(), $this->view->getArticleDescription(), $this->view->getArticleText(), date('o-m-d H:i:s'), $this->view->getArticleImage());
        $this->view->responseAjaxCall($articleMapper->insert($article));
    }

    private function deleteArticle()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $file = $articleMapper->getArticleImageById($this->view->getArticleToRemove());
        if($file && $file != "Data/articles_images/default_article_image.jpg")
            unlink("/Applications/XAMPP/xamppfiles/htdocs/MySite/".$file);
        $this->view->responseAjaxCall($articleMapper->removeArticleById($this->view->getArticleToRemove()));
    }
}
