<?php
	namespace View;

	/**
	 * Interface IView is responsable of the signature of each View. Now there is only a DesktopView that 
	 * use smarty as template engine but in future it is possible for example adding a MobileView that probably 
	 * use another template engine. 
	 */
	interface IView
	{
		public function assignData($reference, $data);
		public function fetchTemplate($data);
	}
?>