<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/User.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../Utility/Singleton.php');
include_once(dirname(__FILE__).'/../View/View.php');

use Control\Controller;
use View\View;
use Entity\User;
use Foundation\Database;
use Foundation\UserMapper;
use Utility\Singleton;

class RegistrationController extends Controller {

	public function executeTask()
	{
		switch ($this->view->getTask())
		{

			case 'addNewUser':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);

				if($this->view->getProfileImage() == "beccato")
				{

				}else {
					$user = new User($this->view->getUsername(), $this->view->getEmail(),$this->view->getPassword(), $this->view->getProfileImage(), 2);
					$this->view->responseAjaxCall($userMapper->insert($user));
				}
			break;

			case 'checkUsername':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);
				$found = $userMapper->existUserName($this->view->getUsernameToCheck());

				$session = Singleton::getInstance("\Control\Session");

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

				$session = Singleton::getInstance("\Control\Session");

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
