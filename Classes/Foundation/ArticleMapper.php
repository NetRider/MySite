<?php

namespace Foundation;

require_once 'AbstractDataMapper.php';

use Entity\Article;

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

    public function removeArticleById($id)
    {
        $file = $this->getArticleImageById($id);
        unlink(dirname(__FILE__)."/../../Data/articles_images/".$file);
        $this->adapter->delete($this->entityTable, array("id"=>$id));
    }

    public function getArticleImageById($id)
    {
        $article = $this->find(array("id"=>$id));
        return $article->getImage();
    }

    public function getNumberOfArticles()
    {
        return $this->returnAssociativeArray(array(), "COUNT");
    }

    protected function createEntity($row)
    {
        $article =  new Article($row["idAuthor"], $row["title"], $row["description"], $row["text"], $row["date"], $row["articleImage"]);
        $article->setId($row["id"]);
        return $article;
    }
}
