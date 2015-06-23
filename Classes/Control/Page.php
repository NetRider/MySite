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
abstract Class Page {

	protected $dataFromSession;

	public function setSession($session) {
		$this->dataFromSession = $session;
	}

	protected function getDataFromSession($key) {
		if ($this->dataFromSession->get($key) != null)
			return $this->dataFromSession->get($key);
		else
			return false;
	}

	protected function closeSession() {
		$this->dataFromSession->logout();
	}

	abstract public function getPage(MainView $view);
}
