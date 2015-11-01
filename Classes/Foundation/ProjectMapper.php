<?php

namespace Foundation;

require_once 'AbstractDataMapper.php';

use Entity\Project;

class ProjectMapper extends AbstractDataMapper {

    protected $entityTable = "project";

    public function insertProject(Project $project, $dependencies)
    {
        $status = false;

        if($this->adapter->insert($this->entityTable, array("idAuthor"=>$project->getUserId(), "title"=>$project->getTitle(), "description"=>$project->getDescription(), "text"=>$project->getText(), "date"=>$project->getDate(), "projectImage"=>$project->getImage())))
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

  public function getAllProjects()
  {
    return $this->find(array(), array());
  }

  public function getAllProjectsByAuthorId($authorId)
  {
      return $this->find(array(), array("userId"=>$authorId));
  }

  public function getProjectById($id)
  {
      return $this->find(array("id"=>$id));
  }

  public function removeProjectById($id)
  {
      return $this->adapter->delete($this->entityTable, array("id"=>$id));
  }

  public function getNumberOfProjects()
  {
      return $this->returnAssociativeArray(array(), "COUNT");
  }

  public function getProjectsForDash()
  {
      return $this->returnAssociativeArray(array(), array("user.username", "project.id", "project.title", "project.description"), "", "", "", "user", array("user"=>"id", "project"=>"idAuthor"));
  }

  public function getProjectImageById($id)
  {
      $project = $this->find(array("id"=>$id));
      if($project)
          return $project->getImage();
      else
          return false;
  }


  protected function createEntity($row) {
    $project =  new Project($row["idAuthor"], $row["title"], $row["description"], $row["text"], $row["date"], $row["projectImage"]);
    $project->setId($row["id"]);

    return $project;
  }
}
