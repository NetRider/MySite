<?php
	
	namespace Entity;

	require_once 'User.php';

	class Comment
	{
		private $text;
		private $user;

		public function __construct($text){
			$this->text = $text;
		}

		//GET FUNCTIONS

		public function getText(){
			return $this->text;
		}

		public function getUserNickname(){
			return $this->user->getNickname();
		}

		//SET FUNCTIONS

		public function setText($text){
			$this->text = $text;
		}

		public function setUser($user)
		{
			if($user instanceof User)
				$this->user = $user;
			else
				echo "Error You must pass a User instance";
		}	
	}
?>