<?php

require('Library/Smarty-3.1.18/libs/Smarty.class.php');

abstract class View extends \Smarty {

	public function __construct()
	{
		parent::__construct();
	    $this->template_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates';
	    $this->compile_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates_C';
	    $this->config_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/cache';
	    $this->cache_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/configs';
	    $this->caching = false;
	}

	public function responseAjaxCall($data)
	{
		echo($data);
	}
}
