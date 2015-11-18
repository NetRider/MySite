<?php
	/**
	 * Starting php file
	 *
	 * This is the starting point of the web application.
	 */

	require_once './Classes/Utility/autoload.inc.php';

	$installView = new InstallerView();
	$installerController = new InstallerController($installView);

	if($installerController->testInstallation())
	{
		$mainView = new MainView();
		$mainController = new MainController($mainView);
		$mainController->getPage();
	}
	else
	{

		$installerController->executeTask();
	}
