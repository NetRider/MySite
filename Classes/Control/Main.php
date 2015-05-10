<?php
	namespace Control;

	/**
	 * require is identical to include except upon failure it will also produce a
	 * fatal E_COMPILE_ERROR level error. In other words, it will halt the script 
	 * whereas include only emits a warning (E_WARNING) which allows the script to 
	 * continue.
	 */
	require_once('PageFactory.php');
	require_once('HomePage.php');
	require_once('RegistrationPage.php');
	require_once(dirname(__FILE__).'/../View/DesktopView.php');

	use View\DesktopView;
	
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

		public function __construct()
		{
			$this->pageFactory = new PageFactory();

			/*
			Here is assembled the string that contains the name of class of the page to be
			instantiated. Default is HomePage.
			 */
			$pageRequest = $this->get('controllerAction');
			if(!$pageRequest)
				$pageRequest = 'Control\HomePage';	
			else
				$pageRequest = "Control\\".$pageRequest;

			$data = $this->pageFactory->doFactory(new $pageRequest, new DesktopView());
		}
		/**
		 * This function return the request of a Post
		 * @param  string $key 
		 * @return mixed
		 */
		private function get($key)
		{
			if (isset($_REQUEST[$key]))
				return $_REQUEST[$key];
			else
				return false;	
		}
	}
?>