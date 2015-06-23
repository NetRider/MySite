<?php

namespace Entity;

require_once 'Comment.php';

class Project {

	private $id;
	private $userId;
	private $title;
	private $text;
	private $vote;
	private $description;
	private $comments;

	public function __construct($userId, $title, $description, $text, $vote) {
		$this->userId = $userId;
		$this->title = $title;
		$this->description = $description;
		$this->text = $text;
		$this->vote = $vote;
	}

	public function addComment($comment) {

	}

	public function removeComment() {

	}


	//GET FUNCTIONS

	public function getComments() {
		if(count($this->comments) != 0)
		return $this->comments;
		else
		return false;
	}

	public function getNumberOfComments() {
		return count($this->comments);
	}

	public function getTitle() {
		return $this->title;
	}

	public function getText() {
		return $this->text;
	}

	public function getVote() {
		return $this->vote;
	}

	public function getId() {
		return $this->id;
	}

	public function getUserId() {
		return $this->userId;
	}

	public function getDescription() {
		return $this->description;
	}

  public function getDependencies() {
    return $this->dependencies;
  }

	//SET FUNCTIONS

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function setVote($vote) {
		$this->vote = $vote;
	}

	public function setComments($comments) {
		$this->comments = $comments;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

  public function selectedDependencies($dependencies) {
    $this->dependencies = $dependencies;
  }
}
