<?php
	namespace Control;
	include_once('IPage.php');
	include_once(dirname(__FILE__).'/../View/IView.php');

    use View\IView;

	class RegistrationPage implements IPage
	{
		public function getPage(IView $view)
		{
			$view->fetchTemplate('registrationForm.tpl');
		}
	}
?>