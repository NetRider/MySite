<?php

namespace Foundation;

require_once 'AbstractDataMapper.php';

use Entity\Project;

class ProjectMapper extends AbstractDataMapper {
  protected $entityTable = "project";

  public function insertProject(Project $project) {
    if(!$this->adapter->insert($this->entityTable, array("userId"=>$project->getUserId(), "title"=>$project->getTitle(), "description"=>$project->getDescription(), "text"=>$project->getText(), "vote"=>$project->getVote())))
      print ("errore");
  }

  public function getAllProjects() {
    return $this->find(array(), array(), null);
  }

  public function getAllProjectsByAuthorId($authorId) {
      return $this->find(array(), array("userId"=>$authorId), null);
  }

  protected function createEntity(array $row) {
    $project =  new Project($row["userId"], $row["title"], $row["description"], $row["text"], $row["vote"]);
    $project->setId($row["id"]);
    return $project;
  }
}
