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

        public function setDataFromRequest($data)
        {
            $this->dataFromRequest = $data;
        }

        public function setDataFromSession($session)
        {
            $this->dataFromRequest = $session;
        }

        protected function getDataFromRequest($key)
        {
            if (isset($this->dataFromRequest[$key]))
                return $this->dataFromRequest[$key];
            else
                return false;
        }

        protected function getDataFromSession($key)
        {
            if (isset($this->dataFromSession[$key]))
                return $this->dataFromSession[$key];
            else
                return false;
        }

        abstract public function getPage(MainView $view);
	}