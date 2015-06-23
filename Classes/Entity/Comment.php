<?php

	namespace Entity;

	require_once 'User.php';

	class Comment
	{
		private $text;
        private $date;
        private $userId;
        private $articleID;

		public function __construct($text, $date, $userId , $articleId){
			$this->text = $text;
            $this->date = $date;
            $this->userId = $userId;
            $this->articleID = $articleId;
		}

		//GET FUNCTIONS

		public function getText(){
			return $this->text;
		}

        public function getDate(){
            return $this->date;
        }

        public function getUserId(){
            return $this->userId;
        }

        public function getArticleId()
        {
            return $this->articleID;
        }

		//SET FUNCTIONS

		public function setText($text){
			$this->text = $text;
		}

		public function setUserId($userId)
		{
			$this->userId = $userId;
		}

        public function setArticleId($articleId)
        {
            $this->articleID = $articleId;
        }

        public function setDate($date)
        {
           $this->date = $date;
        }
	}
?>
