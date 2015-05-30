<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 29/05/15
 * Time: 17:04
 */

namespace Foundation;
require_once 'AbstractDataMapper.php';

use Entity\Article;

class ArticleMapper extends AbstractDataMapper  {
    protected $entityTable = "article";

    public function insert(Article $article)
    {
        $this->adapter->insert($this->entityTable, array("title"=>$article->getTitle(), "textArticle"=>$article->getText(), "vote"=>$article->getVote()));
    }

    public function getLastThreeArticlesTitles()
    {
        return $this->adapter->select($this->entityTable, array("title"), array(), null);
    }

    protected function createEntity(array $row){

        return new Article($row["title"], $row["textArticle"], $row["vote"], $row["comments"]);

    }
}