<?php

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

        public function select($table, $cond, $bind, $op, $order, $limit, $joinTable, $joinBind, $groupBy) {
            $this->connect();
            $sql = "";

            if (empty($bind))
                $columns = '*';
            elseif($bind == "COUNT")
                $columns = "COUNT(*)";
            else
                $columns=implode(",", $bind);

            $joinString = "";
            if($joinTable!='')
            {
                $joinFinal= [];
                $i = 0;
                foreach($joinBind as $key=>$value)
                {
                  $joinFinal[$i] = $key . "." . $value;
                  $i = $i + 1;
                }

                $joinString = " INNER JOIN " . $joinTable . " ON " . implode(" = ", $joinFinal);
            }

            if (empty($cond))
                $sql = "SELECT " . $columns. " FROM " . $table . $joinString;
            else
            {
                if($op=='')
                    $op = "AND";
                $i = 0;
                $condition = [];

                foreach($cond as $key=>$value)
                {
                  $condition[$i] = $key."='".$value."'";
                  $i = $i + 1;
                }
                $sql = "SELECT " . $columns. " FROM " . $table . $joinString . " WHERE " . implode(" " . $op . " ", $condition);
            }

            if($order!='')
                $sql = $sql . " ORDER BY " . $order;
            if($limit!='')
                $sql = $sql . " LIMIT " . $limit;

            if(!empty($groupBy))
            {
                error_log("faccio il groupBy");
                $group=implode(",", $groupBy);
                $sql = $sql . " GROUP BY " . $group;
            }

            $this->statement = $sql;
            error_log($this->statement);
            return $this->executeQuery();
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

            if($this->dbConnection->query("INSERT INTO $table ($cols) VALUES ($StValues)") === TRUE)
                return true;
            else
                return false;
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
            $this->statement = "UPDATE $table SET $Stset WHERE $Stcod";

            if($this->dbConnection->query($this->statement) === TRUE)
                return true;
            else
                return false;
        }

        public function delete($table, array $cond) {

            $this->connect();
            $i=0;
            foreach($cond as $key=>$value) {
                $exp[$i] = $key." = '".$value."'";
                $i++;
            }
            $Stexp = implode(" AND ",$exp);

            $this->statement = "DELETE FROM $table WHERE $Stexp";
            error_log($this->statement);
            if($this->dbConnection->query($this->statement) === TRUE)
                return true;
            else
                return false;
        }

        public function executeQuery()
        {
            $result = $this->dbConnection->query($this->statement);
            /* Not supported by Hostinger
                return $result->fetch_all(MYSQLI_ASSOC);
            */
            $results_array = array();
            while ($row = $result->fetch_assoc()) {
                $results_array[] = $row;
            }
            return $results_array;
        }

        public function getLastId()
        {
            return $this->dbConnection->insert_id;
        }
    }
