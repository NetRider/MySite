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
	require_once('HomePage.php');
	require_once('RegistrationPage.php');
    require_once('ArticlePage.php');
    require_once('SessionPage.php');

    require_once(dirname(__FILE__).'/../Entity/User.php');
	require_once(dirname(__FILE__) . '/../View/MainView.php');
    require_once(dirname(__FILE__) . '/../Utility/Session.php');

	use View\MainView;
    use Control\Session;
	
	/**
 	*It is the main project controller,
 	*
 	*Every request passes through it
 	*and it manages these request and call the respective controller 
 	* 
 	*/
 
	class Main
	{
		private $pageFactory;
        private $pageToExecute;
        private $mainView;
        private $session;

		public function __construct()
        {
			$this->pageFactory = new PageFactory();
            $this->mainView = new MainView();
            $this->session = new Session();


			//Qui viene assemblata la stringa che contiene il nome del controllore della pagina da istanziare
            //contenuto nell'url

            if(isset($_REQUEST['controllerAction']))
                $pageRequest = "Control\\".$_REQUEST['controllerAction'];
            else
                $pageRequest = 'Control\HomePage';//qui ci va la pagina di errore

            //Qui viene istanziato il controllore della pagina richiesta dall'url
            $this->pageToExecute = new $pageRequest();

            //Passo la sessione e i dati provenienti dai post
            //Setter Injection
            $this->pageToExecute->setDataFromRequest($_REQUEST);
            $this->pageToExecute->setDataFromSession($this->session);

            if($this->session->isLoggedIn())
                $this->mainView->assignData("loggedIn", true);
            else
                $this->mainView->assignData("loggedIn", false);

            //Constructor Injection
			$this->pageFactory->createPage($this->pageToExecute,$this->mainView);

            /**
             * Una volta che il pageFactory attraverso la createPage assegna alla mainView i template da visualizzare
             * e i dati da rimpiazziare nelle variabili contenute nei template posso fare il fetch.
            */
            $this->mainView->fetchTemplate('main.tpl');
		}
    }
?>