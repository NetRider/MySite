<?php

class RegistrationController extends Controller {

	public function executeTask()
	{
		switch ($this->view->getTask())
		{

			case 'addNewUser':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);
				$image = $this->view->getProfileImage();
				if($image == "beccato")
				{

				}else {
					$user = new UserEntity($this->view->getUsername(), $this->view->getEmail(), $this->view->getPassword(), $image, 2);
					$this->view->responseAjaxCall($userMapper->insert($user));
				}
			break;

			case 'checkUsername':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);
				$usernameToCheck = $this->view->getUsernameToCheck();
				$found = $userMapper->existUserName($usernameToCheck);

				$session = Singleton::getInstance("Session");

				if($session->userIsLogged() && $usernameToCheck == $session->getUsername()) {
					$this->view->responseAjaxCall("true");
				}else {
					if($found)
						$this->view->responseAjaxCall("false");
					else
						$this->view->responseAjaxCall("true");
					break;
				}

			break;

			case 'checkEmail':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);
				$emailToCheck = $this->view->getEmailToCheck();
				$found = $userMapper->existUserEmail($emailToCheck);

				$session = Singleton::getInstance("Session");

				if($session->userIsLogged() && $emailToCheck == $session->getUserEmail()) {
					$this->view->responseAjaxCall("true");
				}else {
					if($found)
						$this->view->responseAjaxCall("false");
					else
						$this->view->responseAjaxCall("true");
					break;
				}

			case 'getRegistrationPage':
				$this->view->setTemplate('registrationForm');
				return $this->view->getContent();
			break;
		}
	}
}
