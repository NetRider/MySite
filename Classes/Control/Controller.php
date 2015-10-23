<?php
namespace Control;

include_once(dirname(__FILE__).'/../View/View.php');

use View\View;

abstract Class Controller {

	protected $view;

	public function __construct(View $view)
	{
		$this->view = $view;
	}

	abstract public function executeTask();
}
