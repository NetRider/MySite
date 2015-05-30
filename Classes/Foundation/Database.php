<?php

    namespace Foundation;

    use mysqli;

    include_once(dirname(__FILE__) . '/../../ConfigurationFiles/databaseConfig.php');

    /**
     * Class Database
     * @package Foundation
     *
     * Questa classe è responsabile della connessione al database e implementa le funzioni CRUD.
     * Attualmente non supporta SQL query sanitation.
     */

	class Database
    {
        protected $config;
        protected $dbConnection;
        protected $statement;

        public function __construct() {
            //This variable is define in databaseConfig.php
            global $mysqlConfig;

            $this->config = $mysqlConfig;
        }

        public function connect() {
            //if there is ad dbConnection object already, return early
            if ($this->dbConnection) {
                return;
            }
            $this->dbConnection = new mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['database']);

            if($this->dbConnection->connect_error){
                trigger_error('Unable to connect to database [' . $this->$dbConnection->connect_error . ']');
            }
        }

        //Probabilmente non è necessaria perché la connessione viene chiusa automaticamente
        //dopo che lo script è terminato.
        public function disconnect() {
            $this->dbConnection->close();
        }

        public function select($table, array $bind, array $cond = array(), $op) {
            $this->connect();

            if (empty ($bind))
                $columns = '*';
            else
                $columns=implode(",", $bind);

            $i = 0;
            $StValue = [];

            foreach($cond as $key =>$value)
            {
                $StValue[$i] = "'".$value."'";
                $i++;
            }

            if (empty($cond))
                $sql = "SELECT " . $columns. " FROM " . $table;
            else
                $sql = "SELECT " . $columns. " FROM " . $table . " WHERE " . implode(" " . $op . " ", $cond);

            $result = $this->dbConnection->query($sql);

            return $result->fetch_all(MYSQLI_ASSOC);

        }

        public function insert($table, array $bind) {

            $this->connect();

            $cols = implode(", ", array_keys($bind));

            $i = 0;
            $StValue = [];

            foreach($bind as $key =>$value)
            {
                $StValue[$i] = "'".$value."'";
                $i++;
            }

            $StValues = implode(", ",$StValue);


            if($this->dbConnection->query("INSERT INTO $table ($cols) VALUES ($StValues)") === TRUE){
                echo "New record has been inserted successfully!";
            }else{
                echo "Error ".$this->connection->error;
            }
        }

        public function update($table, array $bind, array $cond) {

            $this->connect();

            //append set_val_cols associative array elements
            $i=0;
            foreach($bind as $key=>$value) {
                $set[$i] = $key." = '".$value."'";
                $i++;
            }

            $Stset = implode(", ",$set);

            $i=0;
            foreach($cond as $key=>$value) {
                $cod[$i] = $key." = '".$value."'";
                $i++;
            }

            $Stcod = implode(" AND ",$cod);

            //Update operation
            if($this->dbConnection->query("UPDATE $table SET $Stset WHERE $Stcod") === TRUE){
                if(mysqli_affected_rows($this->dbConnection)){
                    echo "Record updated successfully";
                }
                else{
                    echo "The Record you want to updated is no longer exists";
                }
            }else{
                echo "Error to update".$this->dbConnection->error;
            }
        }

        public function delete($table, array $cond) {
            $this->connect();
            $i=0;
            foreach($cond as $key=>$value) {
                $exp[$i] = $key." = '".$value."'";
                $i++;
            }
            $Stexp = implode(" AND ",$exp);

            //Perform Delete operation
            if($this->dbConnection->query("DELETE FROM $table WHERE $Stexp") === TRUE){
                if(mysqli_affected_rows($this->connection)){
                    echo "Record has been deleted successfully";
                }
                else{
                    echo "The Record you want to delete is no loger exists";
                }
            }
            else{
                echo "Error to delete".$this->dbConnection->error;
            }
        }
    }
?>