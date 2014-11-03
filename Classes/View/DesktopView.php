<?php
	namespace View;

	require('./Library/Smarty-3.1.18/libs/Smarty.class.php');

	class DesktopView implements IView
	{
		private $smarty;

		public function __construct()
		{
			$this->smarty = new \Smarty();
			$this->smarty->template_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates';  
			$this->smarty->compile_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates_C';
			$this->smarty->cache_dir = '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/cache';
			$this->smarty->config_dir ='/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/configs';
		}

		public function fetchTemplate($template)
		{
				$test = $this->smarty->fetch($template);
				print $test;
		}

		public function assignData($reference, $data)
		{
				$this->smarty->assign($reference, $data);
		}
}
?>