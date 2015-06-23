<?php

	namespace Entity;

	class User
	{
		private $id;
		private $nickname;
		private $email;
		private $password;
		private $image;

		public function __construct($nickname, $email, $password, $image){
			$this->nickname = $nickname;
			$this->email = $email;
			$this->password = $password;
			$this->image = $image;
			$this->id = -1;
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

		public function getImage(){
			return $this->image;
		}

		public function getId()
		{
			if($this->id != -1)
				return $this->id;
			else
			 	return false;
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

		public function setImage($image){
			$this->image=$image;
		}

		public function setId($id){
			$this->id = $id;
		}
	}
?>
