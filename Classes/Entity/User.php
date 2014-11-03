<?php

	namespace Entity;
	
	class User
	{
		private $nickname;
		private $email;
		private $password;

		public function __construct($nickname, $email, $password){
			$this->nickname = $nickname;
			$this->email = $email;
			$this->password = $password;
		}

		//GET FUNCTIONS

		public function getNickname(){
			return $this->nickname;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getPassword(){
			return $this->password;
		}

		//SET FUNCTIONS

		public function setNickname($nickname){
			$this->nickname = $nickname;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function setPassword($password){
			$this->password = $password;
		}
	}
?>