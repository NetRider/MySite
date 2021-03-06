<?php
/**
 * Installer Controller File
 *
 * Questo file contiene l'installer controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */

class InstallerController extends Controller
{
	/**
	 * Contiene informazioni sul software sul server
	 *
	 * @var array
	 */
	private $serverDetails;

	/**
	 * Contiene informazioni su questa applicazione
	 *
	 * @var array
	 */
	private $projectDetails;

	/**
	 * Il path della Directory che contiene il file di configurazione
	 *
	 * @var string
	 */
	private $configurationDirectory = "./ConfigurationFiles";

	/**
	 * il nome del file di configurazione
	 *
	 * @var string
	 */
	private $configurationFile = "databaseConfig.php";

	/**
	 * Il nome dello script che crea tabelle e inserisce i dati all'intero.
	 *
	 * @var string
	 */
	private $databaseScriptName = "ElectronicsHub.sql";

	/**
	 * Costruttore .
	 *
	 * Ottiene le informazioni sul software instalalto sul server.
	 */
	 public function __construct(View $view)
 	{
		parent::__construct($view);

 		$this->serverDetails = array("phpVersion" => phpversion(),
 									 "Server software" => $_SERVER["SERVER_SOFTWARE"],
 								     "Upload_max_filesize" => ini_get("upload_max_filesize"));

 		$this->projectDetails = array("phpVersion" => "5.5.9",
 									  "Server software" => "Apache/2.4.7 (Unix) OpenSSL/1.0.1f PHP/5.5.9 mod_perl/2.0.8-dev Perl/v5.16.3",
 									  "Upload_max_filesize" => "128M");
 	}

	/**
	 * Controlla la procedura di installazione
	 */
	public function executeTask()
	{
		switch($this->view->getTask())
		{
			case "createConfigFile":
				if ($this->formCompleted())
				{
					if($this->testConfig())
					{
						if ($this->createConfigFile() == false)
						{
							$this->getForm("Error while creating the configuration file");
						}
						else
						{
							if($this->installDatabase())
								$this->getForm("Errore durante l'installazione del database.");
							else
								$this->view->installationCompleted();
						}
					}
					else
					{
						$this->getForm("La configurazione immessa non &egrave valida. Ricontrolla tutti i campi.");
					}
				}
				else
				{
					$this->getForm("Tutti i campi sono obbligatori");
				}

				break;

			default:
				$this->getForm(false);
				break;
		}
	}

	/**
	 * Controlla se l'applicazione è installata
	 *
	 *  @return bool
	 */
	public function testInstallation()
	{
		$configurationCompleted = false;
		$configFile = $this->configurationDirectory."/".$this->configurationFile;

		if(file_exists($configFile))
		{
			$configurationCompleted = true;
		}

		return $configurationCompleted;
	}

	/**
	 * Ritorna il form per l'installazione
	 *
	 * Se $errorMessage è una stringa vuota il form viene visualizzato senza errori, altrimenti
	 * viene aggiunto
	 *
	 * @param string $errorMessage
	 * @return string Ritorna il template costruito con smarty
	 */
	public function getForm($errorMessage)
	{
		error_log($errorMessage);
		return $this->view->displayForm($errorMessage, $this->projectDetails, $this->serverDetails);
	}

	/**
	 * Controlla se la form è stata completata.
	 *
	 * Tutti i campi devono essere non vuoti
	 *
	 * @return bool
	 */
	public function formCompleted()
	{
		$formCompleted = false;

		$user = $this->view->getUser();
		$passw = $this->view->getPassword();
		$host = $this->view->getHost();
		$databaseName = $this->view->getDatabaseName();

		if(!empty($user) && !empty($passw) && !empty($host) && !empty($databaseName))
			$formCompleted = true;

		return $formCompleted;
	}

	/**
	 * Crea il file di configurazione.
	 *
	 *
	 * @return bool true se tutto è andato a buon fine, false se il file non può essere scritto.
	 */
	public function createConfigFile()
	{
		$confiFileCreated = false;

		$configFileTemplate = $this->configurationDirectory."/"."databaseConfig.example.php";

		$templateContent =  file_get_contents($configFileTemplate);
		$templateContent = "<?php\n".$templateContent;

		$user = $this->view->getUser();
		$password = $this->view->getPassword();
		$host = $this->view->getHost();
		$database = $this->view->getDatabaseName();

		$processedTemplate = str_replace("your_user", $user, $templateContent);
		$processedTemplate = str_replace("your_password", $password, $processedTemplate);
		$processedTemplate = str_replace("your_host", $host, $processedTemplate);
		$processedTemplate = str_replace("your_database_name", $database, $processedTemplate);

		$configFile = fopen($this->configurationDirectory."/"."databaseConfig.php", "w");

		if($configFile!=false)
		{
			fwrite($configFile, $processedTemplate);
			fclose($configFile);

			$confiFileCreated = true;
		}


		return $confiFileCreated;
	}

	/**
	 * Stringa con le informazioni riguardanti l'Installer Object
	 *
	 * @return string
	 */
	public function __toString()
	{
		print "Server info : <br>";
		foreach($this->serverDetails as $key => $value)
		{
			print "$key => $value <br>";
		}

		print "<br>";
		print "ElectronicsHub project info : <br>";
		foreach($this->projectDetails as $key => $value)
		{
			print "$key => $value <br>";
		}
	}

	/**
	 *
	 * Prende i valori dal form e fa il ping al database per vedere se sono corretti
	 *
	 * @return bool true on success, false on failure
	 */
	public function testConfig()
	{

		$user = $this->view->getUser();
		$password = $this->view->getPassword();
		$host = $this->view->getHost();
		$database = $this->view->getDatabaseName();

		$db = new mysqli($host, $user, $password, $database);

		return $db->ping();
	}

	/**
	 * Esegue lo script iniziale sql
	 *
	 * @return bool true on success, false on failure
	 */
	public function installDatabase()
	{
		include_once(dirname(__FILE__) . '/../../ConfigurationFiles/databaseConfig.php');
		$database = new mysqli($mysqlConfig['host'], $mysqlConfig['username'], $mysqlConfig['password'], $mysqlConfig['database']);
		$databaseCreationScript = file_get_contents(dirname(dirname(dirname(__FILE__)))."/".$this->databaseScriptName);

		$error = true;
		if ($databaseCreationScript)
		{
			$database->multi_query($databaseCreationScript);
			$error = false;
		}

		$database->close();

		return $error;
	}
}
