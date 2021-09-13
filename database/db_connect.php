<?php

class db_connect
{
    protected  $database;
    function db_connect()
    {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $dbhost = HOST;
            $username = USER;
            $pass = PWD;
            $database = DB;
        } else {
            $dbhost = HOST;
            $username = USER;
            $pass = PWD;
            $database = DB;
        }
        $this->database = new PDO("mysql:host=$dbhost;dbname=$database", $username, $pass);
    }
}
