<?php
	
	namespace Entity;

	require_once 'Comment.php';
	/*
	Classe che gestisce gli articoli. La mia logica è stata quella di mettere all'interno di questa classe
	un array di istanze della classe Comment.php. Questo perché nel caso in cui si decida di cancellare per
	qualche ragione l'articolo del blog vengono automaticamente rimossi anche tutti i commenti relativi a 
	quell'articolo richiamando la funzione distruttore.
	*/

	class Article
	{
		private $title;
		private $text;
		private $vote;
		private $comments;

		public function __construct($title, $text){
			$this->title = $title;
			$this->text = $text;
			$this->comments = array(); 
		}

		public function addComment($comment){
			if($commet instanceof Comment)
				array_push($this->comments, $comment);
			else
				return false;
		}

		public function removeComment()
		{
			//da vedere in seguito
			
		}


		//GET FUNCTIONS

		public function getComments(){
			if(count($this->comments) != 0)
				return $this->comments;
			else
				return false;
		}

		public function getNumberOfComments(){
			return count($this->comments);
		}

		public function getTitle(){
			return $this->title;
		}

		public function getText(){
			return $this->text;
		}

		public function getVote(){
			return $this->vote;
		}

		//SET FUNCTIONS

		public function setTitle($title){
			$this->title = $title;
		}

		public function setText($text){
			$this->text = $text;
		}

		public function setVote($vote){
			$this->vote = $vote;
		}
	}
?>