<?php
	namespace Control;

	include_once('Page.php');
	include_once(dirname(__FILE__).'/../View/MainView.php');
    include_once(dirname(__FILE__).'/../Entity/User.php');
    include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
    include_once(dirname(__FILE__).'/../Foundation/Database.php');

    use Entity\User;
    use Foundation\Database;
    use Foundation\UserMapper;
    use View\MainView;

	class RegistrationPage extends Page
    {
		public function getPage(MainView $view)
        {
            switch($this->getDataFromRequest('registrationAction'))
            {
                case 'getRegistrationPage':
                    $view->fetchTemplate('registrationForm.tpl');
                    break;

                case 'addNewUser':
                    $this->storeUser();
                    break;

                case 'checkUsername':
                    break;
            }
		}
        private function storeUser() {

            $databaseAdapter = new Database();
            $userMapper = new UserMapper($databaseAdapter);
            $user = new User($this->getDataFromRequest('nickname'), $this->getDataFromRequest('email'),$this->getDataFromRequest('password'));
            $userMapper->insert($user);

        }
	}
?>