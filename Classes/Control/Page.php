<?php
	namespace Control;

	include_once(dirname(__FILE__).'/../View/MainView.php');

    use View\MainView;

    /**
     * La classe astratta Page definisce un oggetto pagina che verrà poi esteso da ogni controllore di ogni pagina
     * All'interno della classe abbiamo metodi già implementati riguardanti i dati dalla REQUEST e i dati relativi
     * alle sessioni. Il metodo getPage(il cui nome è forviante perché non restituisce nulla) assembla la pagina ed
     * astratto perché sarà compito di ogni controllore di pagina implementarlo
     */
	abstract Class Page
	{
        private $dataFromRequest;
        protected $dataFromSession;

        public function setDataFromRequest($data)
        {
            $this->dataFromRequest = $data;
        }

        public function setDataFromSession($session)
        {
            $this->dataFromSession = $session;
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

        protected function closeSession()
        {
            $this->dataFromSession->logout();
        }

        abstract public function getPage(MainView $view);
	}