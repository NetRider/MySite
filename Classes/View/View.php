<?php

require('Library/Smarty-3.1.18/libs/Smarty.class.php');

abstract class View extends \Smarty {

	public function __construct()
	{
		parent::__construct();
		phpinfo();
	    $this->template_dir = '/public_html/Smarty_dir/templates';
	    $this->compile_dir = 'public_html/Smarty_dir/templates_C';
	    $this->config_dir = 'public_html/Smarty_dir/cache';
	    $this->cache_dir = 'public_html/Smarty_dir/configs';
	    $this->caching = false;
	}

	public function responseAjaxCall($data)
	{
		echo($data);
	}
}
