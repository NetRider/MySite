<?php


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
		$session = Singleton::getInstance("Session");

		$data = $this->executeTask();

		/*
		Se sto rispondendo ad una chiamata Ajax non devo visualizzare una nuova pagina.
		In altre parole il controllore non mi ritorna la pagina da aggiungere al main.tpl
		Quindi non devo fare nulla ci pensa la View del rispettivo controllore ad inviare i dati
		 */

		if($data != null)
		{
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
			$controllerAwakened = $this->view->wakeUpController()."Controller";
			$controllerView = $this->view->wakeUpController()."View";
		}
		else
		{
			$controllerAwakened = 'HomeController';
			$controllerView = 'HomeView';
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
