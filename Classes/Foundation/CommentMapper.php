<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 29/05/15
 * Time: 17:26
 */

namespace Foundation;
require_once 'AbstractDataMapper.php';

use Entity\Comment;

class CommentMapper extends AbstractDataMapper {
    protected $entiyTable = "comment";

    public function insert(Comment $comment)
    {
        $this->adapter->insert($this->entiyTable, array("text"=>$comment->getText(), "userId"=>$comment->getUserId(), "date"=>$comment->getDate(), "articleId"=>$comment->getArticleId()));
    }
    protected function createEntity(array $row){

        return new Comment($row["text"], $row["date"], $row["userId"], $row["articleId"]);

    }

}