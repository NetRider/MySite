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
require_once('HomeController.php');
require_once('RegistrationController.php');
require_once('ArticleController.php');
require_once('UserAccessController.php');
require_once('DashboardController.php');
require_once('CommentController.php');
require_once('ProjectController.php');

require_once(dirname(__FILE__).'/../Entity/User.php');
require_once(dirname(__FILE__) . '/../View/MainView.php');
require_once(dirname(__FILE__) . '/../View/HomeView.php');
require_once(dirname(__FILE__) . '/../View/UserAccessView.php');
require_once(dirname(__FILE__) . '/../View/ArticleView.php');
require_once(dirname(__FILE__) . '/../View/DashboardView.php');
require_once(dirname(__FILE__) . '/../View/ProjectView.php');
require_once(dirname(__FILE__) . '/../View/CommentView.php');
require_once(dirname(__FILE__) . '/../View/RegistrationView.php');
require_once(dirname(__FILE__) . '/../Utility/Session.php');

use View\MainView;
use View\UserAccessView;
use Control\Controller;
use Utility\Singleton;
/**
*It is the main project controller,
*
*Every request passes through it
*and it manages these request and call the respective controller
*
*/

class MainController extends Controller {

	/*
		Questo metodo viene richiamato ogni volta dalla index.php e serve per impostare la
		struttura generale della pagina.
	 */
	public function getPage()
	{
		$session = Singleton::getInstance("\Control\Session");

		$data = $this->executeTask();
		if($data == "true" || $data == "false")
		{
			$this->view->sendData($data);
		}else {
			$this->view->setContent($data);

			//Controllo se c'è un utente registrato
			if($session->userIsLogged())
				$this->view->setRightMenuUser();
			else
				$this->view->setRightMenuGuest();

			$this->view->displayPage();
		}
	}

	public function executeTask()
	{

		//La MainView è responsabile del risveglio del giusto controllore
		if($this->view->wakeUpController())
		{
			/*
				Per ogni controllore c'è una view associata. Il controllore e la view
				condividono il nome ad eccezione della parte terminale che è rispettivamente
				"Controller" e "View"
			 */
			$controllerAwakened = "Control\\".$this->view->wakeUpController()."Controller";
			$controllerView = "View\\".$this->view->wakeUpController()."View";
		}
		else
		{
			$controllerAwakened = 'Control\HomeController';
			$controllerView = 'View\HomeView';
		}
		/*
			Qui vengono effettivamente istanziati il controllore svegliato dalla MainView e la view
			relativa a quel controllore.
		 */
		$view = new $controllerView();
		$controller = new $controllerAwakened($view);

		/*
			Ritorna il contenuto da impostare nel mainView oppure i dati di risposta alle form
		 */
		return $controller->executeTask();
	}
}
