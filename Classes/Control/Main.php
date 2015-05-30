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
    require_once('NewArticlePage.php');

	require_once(dirname(__FILE__) . '/../View/MainView.php');

	use View\MainView;
	
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

		public function __construct()
        {
			$this->pageFactory = new PageFactory();
            $this->mainView = new MainView();

			/*
			Here is assembled the string that contains the name of class of the page to be
			instantiated. Default is HomePage.
			*/

            if(isset($_REQUEST['controllerAction']))
                $pageRequest = "Control\\".$_REQUEST['controllerAction']; //Type Hinting in action
            else
                $pageRequest = 'Control\HomePage';

            $this->pageToExecute = new $pageRequest($_REQUEST);

			$this->pageFactory->createPage($this->pageToExecute,$this->mainView);
		}

    }
?>