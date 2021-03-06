<?php
/**
 * Article Controller File
 *
 * Questo file contiene l'article controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */
class ArticleController extends Controller {

    /**
	 * Smista le richieste in arrivo dalla ArticleView.
	 */
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

    /**
	 * Costruisce un matrice dove su ogni riga è presente un articolo.
	 * Su ogni colonna si trova il titolo, descrizione, id e immagine.
	 * Gli articoli con cui si popolano la matrice dipende dal numero di pagina,
	 * fornito dalla view. Si va da un massimo di 10 articolo per pagina a un minimo di 0
	 */
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

    /**
     * Crea la struttura della pagina che conterrà le cards di tutti gli articoli
     *
     * @return string Ritorna il template costruito con smarty
     */
    private function getArticlesCardsPage()
    {
        $this->view->setTemplate('articlesCards');
        return $this->view->getContent();
    }

    /**
     * Crea la pagina adibita per la lettura di un articolo.
     *
     * @return string Ritorna il template costruito con smarty
     */
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

    /**
	 * Memorizza un articolo nel database
	 *
	 * Istanzia un articolo con i dati in upload e prova ad inserirlo nel database
	 *
     */
    private function addNewArticle()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $session = Singleton::getInstance("Session");
        $image = $this->Upload();
        if($image)
        {
            $article = new ArticleEntity($session->getUserId(), $this->view->getArticleTitle(), $this->view->getArticleDescription(), $this->view->getArticleText(), date('o-m-d H:i:s'), $image);
            $this->view->responseAjaxCall($articleMapper->insert($article));
        }else
        {
            $this->view->responseAjaxCall(false);
        }
    }

    /**
     * Cancella un articolo dal database
     *
     * Cancella un articolo dal database attraverso l'id. Se l'immagine associata non
     * è quella di default la rimuove dal server
     */
    private function deleteArticle()
    {
        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $file = $articleMapper->getArticleImageById($this->view->getArticleToRemove());
        if($file && $file != "Data/articles_images/default_article_image.jpg")
            unlink("/Applications/XAMPP/xamppfiles/htdocs/MySite/".$file);
        $this->view->responseAjaxCall($articleMapper->removeArticleById($this->view->getArticleToRemove()));
    }

    /**
     * Gestisce upload immagine articolo
     *
     * @return string Ritorna il path dell'immagine se tutto è andato bene
     */
    private function Upload()
    {
        $imageUploaded = $this->view->getArticleImage();
        $extensions = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        $type = $imageUploaded['type'];
        $name = $imageUploaded['name'];
        $size = $imageUploaded['size'];

        if(is_uploaded_file($imageUploaded['tmp_name']))
		{
            if($size <= 262144 && in_array($type, $extensions))
            {
                $image = basename($name);
                $target_file = "Data/articles_images/". date('o-m-d H:i:s') . $image;
                move_uploaded_file($imageUploaded['tmp_name'], $target_file);
    			return $target_file;
            }
            else {
                return false;
            }
        }else
		{
			return "Data/articles_images/default_article_image.jpg";
		}
    }
}
