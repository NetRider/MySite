<?php

namespace Foundation;

require_once 'AbstractDataMapper.php';

use Entity\Article;

class ArticleMapper extends AbstractDataMapper {
    protected $entityTable = "article";

    public function insert(Article $article) {
        if(!$this->adapter->insert($this->entityTable, array("userId"=>$article->getUserId(), "title"=>$article->getTitle(), "description"=>$article->getDescription(), "text"=>$article->getText(), "vote"=>$article->getVote())))
            print ("errore");
    }

    public function getAllArticles() {
        return $this->find(array(), array(), null);
    }

    public function getAllArticlesByAuthorId($authorId) {
        return $this->find(array(), array("userId"=>$authorId), null);
    }

    public function getLastFourArticlesTitles() {
    }

    protected function createEntity(array $row) {
        $article =  new Article($row["userId"], $row["title"], $row["description"], $row["text"], $row["vote"]);
        $article->setId($row["id"]);
        return $article;
    }
}
