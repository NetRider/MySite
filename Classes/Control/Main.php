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

			/*
			Here is assembled the string that contains the name of class of the page to be
			instantiated. Default is HomePage.
			*/

            if(isset($_REQUEST['controllerAction']))
                $pageRequest = "Control\\".$_REQUEST['controllerAction']; //Type Hinting in action
            else
                $pageRequest = 'Control\HomePage';//qui ci va la pagina di errore

            $this->pageToExecute = new $pageRequest();

            $this->pageToExecute->setDataFromRequest($_REQUEST);
            $this->pageToExecute->setDataFromSession($_SESSION);

            if($this->session->isLoggedIn())
                $this->mainView->assignData("loggedIn", true);
            else
                $this->mainView->assignData("loggedIn", false);

			$this->pageFactory->createPage($this->pageToExecute,$this->mainView);
            $this->mainView->fetchTemplate('main.tpl');
		}
    }
?>