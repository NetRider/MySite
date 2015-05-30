<?php
	namespace Control;

	include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;

    /**
     * Interface IPage is responsable of the signature of each pageController that 
     * implements a getPage method used for pass to the view the data and the correnct 
     * template.
     */
	abstract Class Page
	{
        private $dataFromRequest;


        function __construct($data)
        {
            $this->dataFromRequest = $data;
        }

        protected function get($key)
        {
            if (isset($this->dataFromRequest[$key]))
                return $this->dataFromRequest[$key];
            else
                return false;
        }

        abstract public function getPage(MainView $view);
	}