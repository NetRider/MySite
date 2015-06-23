<?php
namespace Control;

include_once('Page.php');
include_once(dirname(__FILE__).'/../Entity/User.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');
include_once(dirname(__FILE__).'/../View/MainView.php');

use View\MainView;
use Entity\User;
use Foundation\Database;
use Foundation\UserMapper;

class RegistrationController extends Page {
	public function getPage(MainView $view)
	{
		switch ($view->getDataFromRequest('RegistrationAction')) {
				case 'getRegistrationPage':
				$view->assignData('templateToDisplay', 'registrationForm.tpl');
				$view->fetchTemplate('main.tpl');
			break;

			case 'addNewUser':
				$databaseAdapter = new Database();
				$userMapper = new UserMapper($databaseAdapter);

				$image = "default_avatar.png";
				if(is_uploaded_file($_FILES['image']['tmp_name'])) {
					$image = basename($_FILES["image"]["name"]);
					$target_file = "Data/profile_images/" . $image;
					move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
				}

				$user = new User($view->getDataFromRequest('nickname'), $view->getDataFromRequest('email'),$view->getDataFromRequest('password'), $image);

				if($userMapper->insert($user))
					$view->assignData('templateToDisplay', 'home.tpl');
				else
					$view->assignData('templateToDisplay', 'error.tpl');
			break;

			case 'checkUsername':
			break;
		}
	}
}
