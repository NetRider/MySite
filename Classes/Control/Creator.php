<?php
	
	namespace Control;
	include_once(dirname(__FILE__).'/../View/IView.php');

    use View\IView;

	abstract class Creator
	{
	    protected abstract function factoryMethod(IPage $page, IView $view);
	    public function doFactory($pageNow, $viewNow)
	    {
	        $mfg=$this->factoryMethod($pageNow, $viewNow);
		} 
	}
?>