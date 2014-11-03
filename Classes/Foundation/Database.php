<?php

	namespace Foundation;
	use mysqli;
	//require_once '../../Configuration Files/databaseConfig.php';

	/**
	*	Classe per la gestione della connessione al database mysql.
	*
	*	Permette la connessione al database mysql. Utilizza i valori impostati in databaseconfig.php così che se per qualche ragione questi dovrebbero cambiare
	*	basta modificare il file di configurazione senza mettere toccare il codice sorgente.
	*/

	class Database 
	{
		private $databaseLink;
		private $mysqlConfig = array('host' => "localhost", 'user' => "root", 'password' => "pippo", 'database' => "blog");

		public function __construct(){

			$this->databaseLink = new mysqli($this->mysqlConfig['host'], $this->mysqlConfig['user'], $this->mysqlConfig['password'], $this->mysqlConfig['database']);
		}

		/**
		*	Metodo per l'esecuzione di una query che restituisca un valore.
		*
		*	Il metodo va utilizzato per eseguire query del tipo SELECT.
		*
		*	@param string $query Una stringa che contiene la query completa e corretta dal punto di vista sintattico di sql.
		*
		*	@return Un array che contine i risultati. L'array può essere vuoto nel caso in cui non si verifichi la condizione della query.
		*/


		public function executeQuery($query){

			$res = $this->databaseLink->query($query);
			
			while($row = $res->fetch_assoc()) 
				$returnArray[] = $row;
						
			return $returnArray;
		}

		public function storeData($query){
			$this->databaseLink->query($query);
			//if(!$this->databaseLink->query($query));
			//	echo $this->databaseLink->erro();
		}
	}
?>