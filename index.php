<?php
	/**
	 * Starting php file
	 *
	 * This is the starting point of the web application.
	 */

	require_once './Classes/Utility/autoload.inc.php';

	$mainView = new MainView();
	$mainController = new MainController($mainView);
	$mainController->getPage();
