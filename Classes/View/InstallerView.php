<?php

class InstallerView extends View {

	public function getTask()
	{
		if(isset($_REQUEST['task']))
			return $_REQUEST['task'];
		else
			return false;
	}

	public function getUser()
	{
		return $this->getRequest("user");
	}

	public function getPassword()
	{
		return $this->getRequest("password");
	}

	public function getHost()
	{
		return $this->getRequest("host");
	}

	public function getDatabaseName()
	{
		return $this->getRequest("databaseName");
	}

	public function displayForm($errorMessage, $projectDetails, $serverDetails)
	{
		$this->assign('errorMessage', $errorMessage); //enable error message
		$this->assign("projectDetails", $projectDetails);
		$this->assign("serverDetails", $serverDetails);
		$this->display("installationForm.tpl");
	}

	public function installationCompleted()
	{
		$this->display("installationCompleted.tpl");

	}
}
