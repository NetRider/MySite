<?php
/**
 * View File
 *
 * Questo file contiene la classe astratta view che viene implementata
 * da tutte le view
 *
 * @package View
 * @author Matteo Polsinelli
 */

require('Library/Smarty-3.1.18/libs/Smarty.class.php');
//require('/home/u649457658/public_html/Library/Smarty-3.1.18/libs/Smarty.class.php');


/**
 * Classe astratta View che estende Smarty
 */
abstract class View extends Smarty {

	/**
	 * Costruttore di View
	 *
	 * Crea una nuova view
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		/*
	    $this->template_dir = '/home/u649457658/public_html/Smarty_dir/templates';
	    $this->compile_dir = '/home/u649457658/public_html/Smarty_dir/templates_C';
	    $this->config_dir = '/home/u649457658/public_html/Smarty_dir/cache';
	    $this->cache_dir = '/home/u649457658/public_html/Smarty_dir/configs';
	    $this->caching = false;
		*/

		$this->template_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates';
		$this->compile_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates_C';
		$this->config_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/cache';
		$this->cache_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/configs';
		$this->caching = false;
	}

	/**
	 * Metodo responseAjaxCall
	 *
	 * Risponde alle richieste delle chiamate Ajax
	 *
	 * @param string $data
	 *
	 */
	protected function responseAjaxCall($data)
	{
		echo($data);
	}

	/**
	 * Metodo getRequest
	 *
	 *Controlla se in $_REQUEST è presente la chiave $key
	 *
	 * @param string $key
	 * @return string con il valore relativo alla chiave - false se il controller non esiste
	 */
	protected function getRequest($key)
	{
		if(isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else
			return false;
	}
}
