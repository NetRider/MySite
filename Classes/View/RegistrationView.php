<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

use Utility\Singleton;

class RegistrationView extends View {

	private $template;

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

	public function getUsername()
	{
		return $this->getRequest('username');
	}

	public function getEmail()
	{
		return $this->getRequest('email');
	}

	public function getPassword()
	{
		return $this->getRequest('password');
	}

	public function getUsernameToCheck()
	{
		return $this->getRequest('username');
	}

	public function getEmailToCheck()
	{
		return $this->getRequest('email');
	}

	public function getProfileImage()
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

        }else {
			$imagePath = "Data/profile_images/default_profile_image.gif";
		}

		return $imagePath;
	}

	private function getRequest($key)
	{
		if(isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;
	}

	public function setTemplate($template)
	{
		$this->template = $template;
	}

	public function getContent()
	{
		return $this->fetch($this->template.'.tpl');
	}
}
