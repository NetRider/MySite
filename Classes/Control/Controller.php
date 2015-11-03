<?php



abstract Class Controller {

	protected $view;

	public function __construct(View $view)
	{
		$this->view = $view;
	}

	abstract public function executeTask();
}
