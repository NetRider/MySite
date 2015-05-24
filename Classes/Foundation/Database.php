<?php

	namespace Foundation;
	use mysqli;

    include_once(dirname(__FILE__).'/../Configuration Files/databaseConfing.php');

	/**
	* La classe Database implementa l'interfaccia IDatabaseConfig, in particolare il metodo doConnect() e in più
     * utilizza le varie costanti di connessione. Il motivo per cui si utilizzano proprietà statiche
     * della classe .
	*/

	class Database
    {
        protected $config;
        protected $connection;
        protected $statement;
        protected $fetchMode = PDO::FETCH_ASSOC;

        public function __construct() {
            global $mysqlConfig; //This variable is define in databaseConfig.php
            $this->$config = $mysqlConfig;
        }

        public function getStatement(){
            if($this->statement === null){
                throw new PDOException("There is no PDO Statement object for use.");
            }

            return $this->statement;
        }

        public function connect() {
            //if there is ad PDO object already, return early
            if ($this->connection) {
                return;
            }

            try {
                $this->connection = new \PDO('mysql:host=localhost; dbname=blog', $this->config['username'], $this->config['password']);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES,false );
            }
            catch(\PDOException $e)
            {
                throw new \RuntimeException($e->getMessage());
            }
        }

        public function disconnect() {
            $this->connection = null;
        }

        public function prepare($sql, array $options = array()) {
            $this->connect();
            try {
                $this->statement = $this->connection->prepare($sql, $options);
                return $this;
            }
            catch (PDOException $e) {
                throw new RunTimeException($e->getMessage());
            }
        }

        public function execute(array $parameters = array()) {
            try {
                $this->getStatement()->execute($parameters);
                return $this;
            }
            catch(\PDOException $e) {
                throw new \RuntimeException($e->getMessage());
            }
        }

        /*
         * Return the number of rows
         */
        public function countAffectedRows() {
            try {
                return $this->getStatement()->rowCount();
            }
            catch (\PDOException $e) {
                throw new \RunTimeException($e->getMessage());
            }
        }

        public function getLastInsertId($name = null) {
            $this->connect();
            return $this->connection->lastInsertId($name);
        }

        public function fetch($fetchStyle = null, $cursorOrientation = null, $cursorOffset = null) {
            if ($fetchStyle === null) {
                $fetchStyle = $this->fetchMode;
            }

            try {
                return $this->getStatement()->fetch($fetchStyle,
                    $cursorOrientation, $cursorOffset);
            }
            catch (\PDOException $e) {
                throw new \RunTimeException($e->getMessage());
            }
        }

        public function fetchAll($fetchStyle = null, $column = 0) {
            if ($fetchStyle === null) {
                $fetchStyle = $this->fetchMode;
            }

            try {
                return $fetchStyle === PDO::FETCH_COLUMN
                    ? $this->getStatement()->fetchAll($fetchStyle, $column)
                    : $this->getStatement()->fetchAll($fetchStyle);
            }
            catch (\DOException $e) {
                throw new \RunTimeException($e->getMessage());
            }
        }

        public function select($table, array $bind = array(), $boolOperator = "AND") {
            if ($bind) {
                $where = array();
                foreach ($bind as $col => $value) {
                    unset($bind[$col]);
                    $bind[":" . $col] = $value;
                    $where[] = $col . " = :" . $col;
                }
            }

            $sql = "SELECT * FROM " . $table
                . (($bind) ? " WHERE "
                    . implode(" " . $boolOperator . " ", $where) : " ");
            $this->prepare($sql)->execute($bind);
            return $this;
        }

        public function insert($table, array $bind) {
            $cols = implode(", ", array_keys($bind));
            $values = implode(", :", array_keys($bind));
            foreach ($bind as $col => $value) {
                unset($bind[$col]);
                $bind[":" . $col] = $value;
            }

            $sql = "INSERT INTO " . $table
                . " (" . $cols . ")  VALUES (:" . $values . ")";
            return (int) $this->prepare($sql)->execute($bind)->getLastInsertId();
        }

        public function update($table, array $bind, $where = "") {
            $set = array();
            foreach ($bind as $col => $value) {
                unset($bind[$col]);
                $bind[":" . $col] = $value;
                $set[] = $col . " = :" . $col;
            }

            /*
             * implode — Unisce gli elementi di una matrice in una stringa
             * <?php
                $array = array('lastname', 'email', 'phone');
                $comma_separated = implode(",", $array);
                echo $comma_separated; // lastname,email,phone
                ?>
             */
            $sql = "UPDATE " . $table . " SET " . implode(", ", $set)
                . (($where) ? " WHERE " . $where : " ");
            return $this->prepare($sql)->execute($bind)->countAffectedRows();
        }

        public function delete($table, $where = "")
        {
            $sql = "DELETE FROM " . $table . (($where) ? " WHERE " . $where : " ");
            return $this->prepare($sql)->execute()->countAffectedRows();
        }
    }
?>