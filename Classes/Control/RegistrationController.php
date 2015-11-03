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
					$user = new User($this->view->getUsername(), $this->view->getEmail(), md5($this->view->getPassword()), $image, 2);
					$this->view->responseAjaxCall($userMapper->insert($user));
				}
			break;

			case 'checkUsername':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);
				$found = $userMapper->existUserName($this->view->getUsernameToCheck());

				$session = Singleton::getInstance("Session");

				if($session->userIsLogged() && $this->view->getUsernameToCheck() == $session->getUsername()) {
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
				$found = $userMapper->existUserEmail($this->view->getEmailToCheck());

				$session = Singleton::getInstance("Session");

				if($session->userIsLogged() && $this->view->getEmailToCheck() == $session->getUserEmail()) {
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
