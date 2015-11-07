<?php


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

	public function getUserPassword()
	{
		return $this->getRequest('password');
	}

	public function getUserEmail()
	{
		return $this->getRequest('email');
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

	public function getUpdateImage()
	{
		$imagePath = "";

        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
			$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
			if(!preg_match("/\.(gif|png|jpg|jpeg)$/", $ext))
			{
				$image = basename($_FILES["image"]["name"]);
	            $imagePath = "Data/profile_images/" . $image;
	            move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
			}

        }

		return $imagePath;
	}

  	public function getRememberMe()
	{
		return $this->getRequest("rememberMe");
	}

	public function login()
	{
		$session = Singleton::getInstance("Session");
		$this->assign('username', $session->get('username'));
		error_log(print_r("sono nel login", true));
		return $this->fetch('correctLogin.tpl');
	}

	public function logout()
	{
		$session = Singleton::getInstance("Session");
		$this->assign('username', $session->get('username'));
		return $this->fetch('correctLogout.tpl');
	}
}
