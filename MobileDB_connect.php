<?php

class DB_CONNECT {

    // constructor
    function __construct(){
        // connection to DB
        $this -> connect();
    }

    // destructor
    function __destruct(){
        $this ->close();
    }

    function connect(){
        require_once __DIR__ . "/MobileDB_config.php";

        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die (mysql_error());
        $db  = mysql_select_db(DB_DATABASE) or die (mysql_error()) or die (mysql_error());

        return $con;
    }

    function close(){
        mysql_close();
    }
}

?>