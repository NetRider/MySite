<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

use Utility\Singleton;

class UserAccessView extends View {

	public function __construct()
	{
		 parent::__construct();
	}

	public function getTask()
	{
		if(isset($_REQUEST['task']))
			return $_REQUEST['task'];
		else
			return false;
	}

	private function getRequest($key)
	{
		if(isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;
	}

	public function getUsername()
	{
		return $this->getRequest('username');
	}

	public function getUserId()
	{
		return $this->getRequest('userid');
	}

	public function getUserImage()
	{
		return $this->getRequest('userimage');
	}

	public function getUserPassword()
	{
		return $this->getRequest('password');
	}

	public function getUserRoleToUpdate()
	{
		return $this->getRequest("idRole");
	}

	public function getUserIdForUpdate()
	{
		return $this->getRequest("idUser");
	}

	public function userToRemove()
	{
		return $this->getRequest("userToRemove");
	}

	public function login()
	{
		$session = Singleton::getInstance("\Control\Session");
		$this->assign('username', $session->get('username'));
		error_log(print_r("sono nel login", true));
		return $this->fetch('correctLogin.tpl');
	}

	public function loginFailure()
	{
		return $this->fetch('incorrectLogin.tpl');
	}

	public function logout()
	{
		$session = Singleton::getInstance("\Control\Session");
		$this->assign('username', $session->get('username'));
		return $this->fetch('correctLogout.tpl');
	}
}
