<?php

class Model
{
    public function __construct()
    {
        global $config;

        extract($config['database']);

        $this->connection = mysqli_connect($host, $username, $password) or die('MySQL Error: ' . mysql_error());
        mysqli_select_db($this->connection, $database);
    }

    public function escapeString($string)
    {
        return mysqli_real_escape_string($this->connection, $string);
    }

    public function query($qry,$retType = 'object')
    {
        $result = mysqli_query($this->connection, $qry) or die('MySQL Error: ' . mysql_error());
        $resultObjects = array();

        switch($retType){
            case 'object':
                $fetch = 'mysqli_fetch_object';
                break;
            case 'assoc':
                $fetch = 'mysqli_fetch_assoc';
                break;
        }
        while ($row = $fetch($result)) $resultObjects[] = $row;

        self::__free($result);

        return $resultObjects;
    }

    public function execute($qry)
    {
        $exec = mysqli_query($this->connection, $qry) or die('MySQL Error: ' . mysqli_error($this->connection));

        return $exec;
    }

    public function getLastInsertedId(){
        return mysqli_insert_id($this->connection);
    }

    private function __free($result)
    {
        mysqli_free_result($result);
    }
}