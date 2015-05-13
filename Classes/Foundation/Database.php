<?php

	namespace Foundation;
	use mysqli;

    include_once('IDatabaseConfig.php');

	/**
	* La classe Database implementa l'interfaccia IDatabaseConfig, in particolare il metodo doConnect() e in più
     * utilizza le varie costanti di connessione. Il motivo per cui si utilizzano proprietà statiche
     * della classe .
	*/

	class  Database implements IDatabaseConfig
    {
        private static $server=IDatabaseConfig::HOST;
        private static $currentDB=IDatabaseConfig::DBNAME;
        private static $user=IDatabaseConfig::UNAME;
        private static $pass=IDatabaseConfig::PW;
        private static $connection;

        public static function doConnect()
        {
            self::$connection = mysqli_connect(self::$server, self::$user, self::$pass, self::$currentDB);

            if(self::$connection)
            {
                echo "Successul connection to MySQL";
            }
            elseif (mysqli_connect_error(self::$connection))
            {
                echo('here is why it failded: '  . mysqli_connect_error());
            }

            return self::$connection;
        }
	}
?>