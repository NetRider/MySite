<?php

abstract class View extends Smarty {

	public function __construct()
	{
		parent::__construct();
	    $this->template_dir = '/home/u649457658/public_html/Smarty_dir/templates';
	    $this->compile_dir = '/home/u649457658/public_html/Smarty_dir/templates_C';
	    $this->config_dir = '/home/u649457658/public_html/Smarty_dir/cache';
	    $this->cache_dir = '/home/u649457658/public_html/Smarty_dir/configs';
	    $this->caching = false;
	}

	public function responseAjaxCall($data)
	{
		echo($data);
	}
}
