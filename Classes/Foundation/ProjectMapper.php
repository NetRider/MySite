<?php

/**
 * classe ProjectMapper
 *
 * @package Foundation
 * @author Matteo Polsinelli
 */
class ProjectMapper extends AbstractDataMapper {

    /**
    *tabella di riferimento
    *
    * @var string
    */
    protected $entityTable = "project";

    /**
    *inserisce un progetto nel database
    *
    * @return bool - true se tutto è andato a buon fine
    */
    public function insertProject(ProjectEntity $project, $dependencies)
    {
        $status = false;

        if($this->adapter->insert($this->entityTable, array("idAuthor"=>$project->getAuthorId(), "title"=>$project->getTitle(), "description"=>$project->getDescription(), "text"=>$project->getText(), "date"=>$project->getDate(), "projectImage"=>$project->getImage())))
        {
            if($dependencies != null)
            {
                $lastId = $this->adapter->getLastId();

                foreach ($dependencies as $value)
                {
                    if($this->adapter->insert("dependency", array("idProject"=>$lastId, "idArticle"=>$value)))
                    {
                        $status = true;
                    }
                }
            }else {
                $status = true;
            }
        }

        return $status;
    }

    /**
    *ritorna tutti i progetti presenti nel database
    *
    * @return array
    */
  public function getAllProjects()
  {
    return $this->find(array(), array());
  }

  /**
  *ritorna tutti i progetti sulla base dell'id dell'autore
  *
  * @return array
  */
  public function getAllProjectsByAuthorId($authorId)
  {
      return $this->find(array(), array("userId"=>$authorId));
  }

  /**
  *ritorna tutti i progetti con un determinato id
  *
  * @return array
  */
  public function getProjectById($id)
  {
      return $this->find(array("id"=>$id));
  }

  /**
  *rimuove tutti i progetti con un determinato id
  *
  * @return bool - true se tutto è andato a buon fine
  */
  public function removeProjectById($id)
  {
      return $this->adapter->delete($this->entityTable, array("id"=>$id));
  }

  /**
  *ritorna il numero di progetti
  *
  * @return int
  */
  public function getNumberOfProjects()
  {
      return $this->returnAssociativeArray(array(), "COUNT");
  }

  /**
  *ritorna i progetti  associati ad un numero di pagina
  *
  * @return array
  */
  public function getProjectsCardsByPageNumber($pageNumber)
  {
      return $this->find(array(), array(), "", "" , $pageNumber);
  }

  /**
  *ritorna gli articoli da visualizzare nella dashboard
  *
  * @return array
  */
  public function getProjectsForDash()
  {
      return $this->returnAssociativeArray(array(), array("user.username", "project.id", "project.title", "project.description"), "", "", "", "user", array("user"=>"id", "project"=>"idAuthor"));
  }

  /**
  *ritorna gli ultimi tre progetti inseriti
  *
  * @return array
  */
  public function getLastThreeProjects()
  {
      return $this->find(array(), array(), "", "id DESC", "3");
  }

  /**
  *ritorna l'immagine di un progetto dato il suo id
  *
  * @return string
  */
  public function getProjectImageById($id)
  {
      $project = $this->find(array("id"=>$id));
      if($project)
          return $project->getImage();
      else
          return false;
  }

  /**
  *ritorna il numero di progetti per ciascuna data e la data
  *
  * @return array
  */
  public function getProjectsCountedByDate()
  {
      return $this->returnAssociativeArray(array(), array("DATE_FORMAT(date, '%Y-%m-%d')date", "count(date)"), "", "", "", "", array(), array("YEAR(date)", "MONTH(date)", "DAY(Date)"));
  }

  /**
  *crea un oggetto Project con i dati forniti da una query sql
  *
  * @return Project
  */
  protected function createEntity($row) {
    $project =  new ProjectEntity($row["idAuthor"], $row["title"], $row["description"], $row["text"], $row["date"], $row["projectImage"]);
    $project->setId($row["id"]);

    return $project;
  }
}
