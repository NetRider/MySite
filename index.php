<?php
	/**
	 * Starting php file
	 *
	 * This is the starting point of the web application.
	 */

	require_once './Classes/Control/MainController.php';
	require_once './Classes/View/MainView.php';

	$mainView = new \View\MainView();
	$mainController = new \Control\MainController($mainView);
	$mainController->getPage();
