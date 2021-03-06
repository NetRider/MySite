<?php
/**
 * classe ArticleMapper
 *
 * @package Foundation
 * @author Matteo Polsinelli
 */
class ArticleMapper extends AbstractDataMapper {

    /**
    *tabella di riferimento
    *
    * @var string
    */
    protected $entityTable = "article";

    /**
    *inserisce un articolo nel database
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function insert(ArticleEntity $article)
    {
        return $this->adapter->insert($this->entityTable, array("idAuthor"=>$article->getAuthorId(), "title"=>$article->getTitle(), "description"=>$article->getDescription(), "text"=>$article->getText(), "date"=>$article->getDate(), "articleImage"=>$article->getImage()));
    }

    /**
    *ritorna tutti gli articoli nel database
    *
    * @return array
    */
    public function getAllArticles()
    {
        return $this->find();
    }

    /**
    *ritorna tutti gli articoli di un autore
    *
    * @return array
    */
    public function getAllArticlesByAuthorId($authorId)
    {
        return $this->find(array("idAuthor"=>$authorId));
    }

    /**
    *ritorna tutti gli articoli con un determinato id
    *
    * @return array
    */
    public function getArticleById($id)
    {
        return $this->find(array("id"=>$id));
    }

    /**
    *ritorna gli ultimi tre articoli caricati
    *
    * @return array
    */
    public function getLastThreeArticles()
    {
        return $this->find(array(), array(), "", "id DESC", "3");
    }

    /**
    *ritorna gli articoli che sono dipendenze di un progetto
    *
    * @return array
    */
    public function getArticlesDependenciesByProjectId($projectId)
    {
        return $this->returnAssociativeArray(array("dependency.idProject"=>$projectId), array("article.id", "article.title"), "", "", "", "dependency", array("dependency"=>"idArticle", "article"=>"id"));
    }

    /**
    *ritorna gli articoli da visualizzare nella dashboard
    *
    * @return array
    */
    public function getArticlesForDash()
    {
        return $this->returnAssociativeArray(array(), array("user.username", "article.id", "article.title", "article.description"), "", "", "", "user", array("user"=>"id", "article"=>"idAuthor"));
    }

    /**
    *rimuove un articolo attraverso l'id
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function removeArticleById($id)
    {
        return $this->adapter->delete($this->entityTable, array("id"=>$id));
    }

    /**
    *ritorna il numero di articoli per ciascuna data e la data
    *
    * @return array
    */
    public function getArticlesCountedByDate()
    {
        return $this->returnAssociativeArray(array(), array("DATE_FORMAT(date, '%Y-%m-%d')date", "count(date)"), "", "", "", "", array(), array("YEAR(date)", "MONTH(date)", "DAY(Date)"));
    }

    /**
    *ritorna l'immagine di un articolo dato l'id
    *
    * @return array
    */
    public function getArticleImageById($id)
    {
        $article = $this->find(array("id"=>$id));
        if($article)
            return $article->getImage();
        else
            return false;
    }

    /**
    *ritorna il numero di articoli
    *
    * @return int
    */
    public function getNumberOfArticles()
    {
        return $this->returnAssociativeArray(array(), "COUNT");
    }

    /**
    *ritorna gli articoli associati ad un numero di pagina
    *
    * @return array
    */
    public function getArticlesCardsByPageNumber($pageNumber)
    {
        return $this->find(array(), array(), "", "" , $pageNumber);
    }

    /**
    *crea un oggetto Article con i dati forniti da una query sql
    *
    * @return Article
    */
    protected function createEntity($row)
    {
        $article = new ArticleEntity($row["idAuthor"], $row["title"], $row["description"], $row["text"], $row["date"], $row["articleImage"]);
        $article->setId($row["id"]);
        return $article;
    }
}
