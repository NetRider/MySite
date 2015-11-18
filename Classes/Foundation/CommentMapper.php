<?php
/**
 * classe CommentMapper
 *
 * @package Foundation
 * @author Matteo Polsinelli
 */
class CommentMapper extends AbstractDataMapper {

    /**
    *tabella di riferimento
    *
    * @var string
    */
    protected $entityTable = "comment";

    /**
    *inserisce un commento relativo ad un articolo nel database
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function insertArticleComment(CommentEntity $comment, $idArticle) {
        if($this->adapter->insert($this->entityTable, array("text"=>$comment->getText(), "idAuthor"=>$comment->getUserId(), "date"=>$comment->getDate())))
        {
            if($this->adapter->insert("comments_articles", array("idComment"=>$this->adapter->getLastId(), "idArticle"=>$idArticle)))
                return true;
        }
    }

    /**
    *inserisce un commento relativo ad un progetto nel database
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function insertProjectComment(CommentEntity $comment, $idProject) {
        if($this->adapter->insert($this->entityTable, array("text"=>$comment->getText(), "idAuthor"=>$comment->getUserId(), "date"=>$comment->getDate())))
        {
            if($this->adapter->insert("comments_projects", array("idComment"=>$this->adapter->getLastId(), "idProject"=>$idProject)))
                return true;
        }
    }

    /**
    *ritorna un array di commenti relativi all'id di un progetto
    *
    * @return array
    */
    public function getCommentsByProjectId($projectId)
    {
        return $this->find(array("idProject"=>$projectId), array("comments_projects.idProject", "comment.idAuthor", "comment.text", "comment.date"), "", "", "", "comments_projects", array("comment"=>"id", "comments_projects"=>"idComment"));
    }

    /**
    *ritorna un array di commenti relativi all'id di un articolo
    *
    * @return array
    */
    public function getCommentsByArticleId($articleId)
    {
        return $this->find(array("idArticle"=>$articleId), array("comments_articles.idArticle", "comment.idAuthor", "comment.text", "comment.date"), "", "", "", "comments_articles", array("comment"=>"id", "comments_articles"=>"idComment"));
    }

    /**
    *cancella tutti i commenti di un articolo
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function removeCommentByArticleId($id)
    {
        $this->adapter->delete($this->entityTable, array("articleId"=>$id));
    }

    /**
    *cancella un commento dato il suo id
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function removeCommentById($id)
    {
        return $this->adapter->delete($this->entityTable, array("id"=>$id));
    }

    /**
    * ritorna i commenti relativi agli articoli di un utente dato il suo id
    *
    * @return array
    */
    public function getCommentsArticlesByAuthorId($authorId)
    {
        return $this->returnAssociativeArray(array("idAuthor"=>$authorId), array("comment.id", "comment.text"), "", "", "", "comments_articles", array("comment"=>"id", "comments_articles"=>"idComment"));
    }

    /**
    * ritorna i commenti relativi ai progetti di un utente dato il suo id
    *
    * @return array
    */
    public function getCommentsProjectsByAuthorId($authorId)
    {
        return $this->returnAssociativeArray(array("idAuthor"=>$authorId), array("comment.id", "comment.text"), "", "", "", "comments_projects", array("comment"=>"id", "comments_projects"=>"idComment"));
    }

    /**
    * ritorna il numero di commenti
    *
    * @return array
    */
    public function getNumberOfComments()
    {
        return $this->returnAssociativeArray(array(), "COUNT");
    }

    /**
    * ritorna il numero di commenti per ogni data
    *
    * @return array
    */
    public function getCommentsCountedByDate()
    {
        return $this->returnAssociativeArray(array(), array("DATE_FORMAT(date, '%Y-%m-%d')date", "count(date)"), "", "", "", "", array(), array("YEAR(date)", "MONTH(date)", "DAY(Date)"));
    }

    /**
    *crea un oggetto Comment con i dati forniti da una query sql
    *
    * @return Comment
    */
    protected function createEntity($row)
    {
        return new CommentEntity($row["text"], $row["date"], $row["idAuthor"]);
    }

}
