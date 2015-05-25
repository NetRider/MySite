<?php
	namespace Control;
	include_once('IPage.php');
	include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;

	class RegistrationPage implements IPage
    {
		public function getPage(MainView $view)
		{
            /*
            switch($this->get('registrationAction'))
            {
                case 'getRegistrationPage':
                    $view->fetchTemplate('registrationForm.tpl');
                    break;

                case 'addNewUser':
                    $this->storeUser();
                    break;

                case 'checkUsername':
                    break;
            }*/
            $view->fetchTemplate('registrationForm.tpl');
		}

        private function storeUser(){

        }
	}
?>