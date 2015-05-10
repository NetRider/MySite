<?php
	
	namespace Foundation;

	use Entity\User;
	
	require_once 'Database.php';
	require_once '../Classes/Entity/User.php';

	Class UserDatabase
	{
        private $connection;

		public function __construct(){
			$this->connection = Database::doConnect();
		}

		public function storeUser($user)
		{
			if($user instanceof User)
			{
				$nickname = '"'.$user->getNickname().'"';
				$email = '"'.$user->getEmail().'"';
				$password = '"'.$user->getPassword().'"';

				$query = "INSERT INTO user (nickname, email, password) VALUES ($nickname, $email, $password)"; //I doppi apici permetto di valutare il valore della variabile nella stringa;

				return $this->storeData($query);
			}
			else 
				echo "Non mi stai passando uno user";
		}

		public function existeUserName($user)
		{
			if($user instanceof User)
			{
				$nickname = '"'.$user->getNickname().'"';

				$query = "SELECT nickname FROM user WHERE nickname = $nickname"; 

				return count($this->executeQuery($query));
			}
		}

		public function existeUserEmail($user)
		{
			if($user instanceof User)
			{
				$email = '"'.$user->getEmail().'"';

				$query = "SELECT email FROM user WHERE email = $email"; 

				return count($this->executeQuery($query));
			
			}
		}

	}
?>