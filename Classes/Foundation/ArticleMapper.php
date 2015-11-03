<?php

class ArticleMapper extends AbstractDataMapper {

    protected $entityTable = "article";

    public function insert(Article $article)
    {
        return $this->adapter->insert($this->entityTable, array("idAuthor"=>$article->getAuthorId(), "title"=>$article->getTitle(), "description"=>$article->getDescription(), "text"=>$article->getText(), "date"=>$article->getDate(), "articleImage"=>$article->getImage()));
    }

    public function getAllArticles()
    {
        return $this->find();
    }

    public function getAllArticlesByAuthorId($authorId)
    {
        return $this->find(array("idAuthor"=>$authorId));
    }

    public function getArticleById($id)
    {
        return $this->find(array("id"=>$id));
    }

    public function getLastThreeArticles()
    {
        return $this->find(array(), array(), "", "id DESC", "3");
    }

    public function getArticlesDependenciesByProjectId($projectId)
    {
        return $this->returnAssociativeArray(array("dependency.idProject"=>$projectId), array("article.id", "article.title"), "", "", "", "dependency", array("dependency"=>"idArticle", "article"=>"id"));
    }

    public function getArticlesForDash()
    {
        return $this->returnAssociativeArray(array(), array("user.username", "article.id", "article.title", "article.description"), "", "", "", "user", array("user"=>"id", "article"=>"idAuthor"));
    }

    public function removeArticleById($id)
    {
        return $this->adapter->delete($this->entityTable, array("id"=>$id));
    }

    public function getArticlesCountedByDate()
    {
        return $this->returnAssociativeArray(array(), array("DATE_FORMAT(date, '%Y-%m-%d')date", "count(date)"), "", "", "", "", array(), array("YEAR(date)", "MONTH(date)", "DAY(Date)"));
    }

    public function getArticleImageById($id)
    {
        $article = $this->find(array("id"=>$id));
        if($article)
            return $article->getImage();
        else
            return false;
    }

    public function getNumberOfArticles()
    {
        return $this->returnAssociativeArray(array(), "COUNT");
    }

    protected function createEntity($row)
    {
        $article = new ArticleEntity($row["idAuthor"], $row["title"], $row["description"], $row["text"], $row["date"], $row["articleImage"]);
        $article->setId($row["id"]);
        return $article;
    }
}
