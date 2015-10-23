<?php

namespace Entity;

require_once 'Comment.php';
/*
Classe che gestisce gli articoli. La mia logica è stata quella di mettere all'interno di questa classe
un array di istanze della classe Comment.php. Questo perché nel caso in cui si decida di cancellare per
qualche ragione l'articolo del blog vengono automaticamente rimossi anche tutti i commenti relativi a
quell'articolo richiamando la funzione distruttore.
*/

class Article {

	private $id;
	private $userId;
	private $title;
	private $text;
	private $date;
	private $description;
	private $comments;
	private $image;

	public function __construct($userId, $title, $description, $text, $date, $image) {
		$this->userId = $userId;
		$this->title = $title;
		$this->description = $description;
		$this->text = $text;
		$this->date = $date;
		$this->image = $image;
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

	public function getDate() {
		return $this->date;
	}

	public function getId() {
		return $this->id;
	}

	public function getAuthorId() {
		return $this->userId;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getImage() {
		return $this->image;
	}

	//SET FUNCTIONS

	public function setTitle($title) {
		$this->title = $title;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function setComments($comments) {
		$this->comments = $comments;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setImage($imge) {
		$this->image = $image;
	}
}
