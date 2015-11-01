<?php
namespace View;

include_once(dirname(__FILE__).'/../View/View.php');

use Utility\Singleton;

class MainView extends View {
	private $rightMenu;
	private $content;

	public function __construct()
	{
		 parent::__construct();
	}

	public function setRightMenuUser()
	{
		$session = Singleton::getInstance("\Control\Session");
		$this->assign('userImage', $session->getUserImage());
		$this->assign('username', $session->get('username'));
		$this->rightMenu = $this->fetch("logged.tpl");
	}

	public function setRightMenuGuest()
	{
		$this->rightMenu = $this->fetch("notLogged.tpl");
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function wakeUpController()
	{
		if (isset($_REQUEST['controller']))
			return $_REQUEST['controller'];
		else
			return false;
	}

	public function displayPage()
	{
		$this->assign('rightMenu', $this->rightMenu);
		$this->assign('content', $this->content);
		$this->display("main.tpl");
	}
}
