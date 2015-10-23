<?php

namespace Foundation;

require_once 'AbstractDataMapper.php';

use Entity\Comment;

class CommentMapper extends AbstractDataMapper {
    protected $entityTable = "comment";

    public function insert(Comment $comment, $idArticle) {
        if($this->adapter->insert($this->entityTable, array("text"=>$comment->getText(), "idAuthor"=>$comment->getUserId(), "date"=>$comment->getDate())))
        {
            if($this->adapter->insert("comments_articles", array("idComment"=>$this->adapter->getLastId(), "idArticle"=>$idArticle)))
                return true;
        }
    }

    public function getCommentsByProjectId($projectId)
    {
        return $this->find(array("idProject"=>$projectId), array("comments_projects.idProject", "comment.idAuthor", "comment.text", "comment.date"), "", "", "", "comments_projects", array("comment"=>"id", "comments_projects"=>"idComment"));
    }

    public function getCommentsByArticleId($articleId)
    {
        return $this->find(array("idArticle"=>$articleId), array("comments_articles.idArticle", "comment.idAuthor", "comment.text", "comment.date"), "", "", "", "comments_articles", array("comment"=>"id", "comments_articles"=>"idComment"));
    }

    public function removeCommentByArticleId($id)
    {
        $this->adapter->delete($this->entityTable, array("articleId"=>$id));
    }

    public function getCommentsArticlesByAuthorId($authorId)
    {
        return $this->returnAssociativeArray(array("idAuthor"=>$authorId), array("comment.id", "comment.text"), "", "", "", "comments_articles", array("comment"=>"id", "comments_articles"=>"idComment"));
    }

    public function getCommentsProjectsByAuthorId($authorId)
    {
        return $this->returnAssociativeArray(array("idAuthor"=>$authorId), array("comment.id", "comment.text"), "", "", "", "comments_projects", array("comment"=>"id", "comments_projects"=>"idComment"));
    }

    public function getNumberOfComments()
    {
        return $this->returnAssociativeArray(array(), "COUNT");
    }

    protected function createEntity($row)
    {
        return new Comment($row["text"], $row["date"], $row["idAuthor"]);
    }

}
