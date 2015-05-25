<?php
	namespace Control;
	include_once('IPage.php');
	include_once(dirname(__FILE__).'/../View/IView.php');

    use View\IView;

	class RegistrationPage implements IPage
    {
		public function getPage(IView $view)
		{

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
            }
		}

        private function storeUser(){

        }
	}
?>