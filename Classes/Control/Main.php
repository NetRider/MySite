<?php

namespace Control;
/*
function autoloadModel($class_name) {
print($class_name);
include($class_name . '.php');
}
spl_autoload_register('Control\autoloadModel');
*/
/**
* require is identical to include except upon failure it will also produce a
* fatal E_COMPILE_ERROR level error. In other words, it will halt the script
* whereas include only emits a warning (E_WARNING) which allows the script to
* continue.
*/
require_once('PageFactory.php');
require_once('HomeController.php');
require_once('RegistrationController.php');
require_once('ArticleController.php');
require_once('LogController.php');
require_once('ProfileController.php');
require_once('CommentController.php');
require_once('ProjectController.php');



require_once(dirname(__FILE__).'/../Entity/User.php');
require_once(dirname(__FILE__) . '/../View/MainView.php');
require_once(dirname(__FILE__) . '/../Utility/Session.php');

use View\MainView;
use Control\LogController;

/**
*It is the main project controller,
*
*Every request passes through it
*and it manages these request and call the respective controller
*
*/

class Main {
	private $pageFactory;
	private $pageToExecute;
	private $mainView;
	private $session;

	public function __construct() {
		$this->pageFactory = new PageFactory();
		$this->mainView = new MainView();
		$this->session = new Session();

		//Qui viene assemblata la stringa che contiene il nome del controllore della pagina da istanziare
		//contenuto nell'url
		if($this->mainView->getDataFromRequest('controllerAction'))
			$pageRequest = "Control\\".$this->mainView->getDataFromRequest('controllerAction');
		else
			$pageRequest = 'Control\HomeController';//qui ci va la pagina di errore

		//Qui viene istanziato il controllore della pagina richiesta dall'url
		$this->pageToExecute = new $pageRequest();

		//Passo la sessione e i dati provenienti dai post
		//Setter Injection
		$this->pageToExecute->setSession($this->session);

		if($this->session->isLoggedIn()) {
			$this->mainView->assignData("loggedIn", true);
			$this->mainView->assignData("username", $this->session->get('username'));
			$this->mainView->assignData("userimage",$this->session->get('userimage'));
		}else
			$this->mainView->assignData("loggedIn", false);

		//Constructor Injection
		$this->pageFactory->createPage($this->pageToExecute,$this->mainView);
	}
}
