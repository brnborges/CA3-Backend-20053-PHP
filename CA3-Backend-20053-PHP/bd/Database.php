<?php


// Database connection
class Database{ 
    var $connection;

    function openConnect(){
        $servername = 'localhost';
        $username ='root';
        $password = '';
        $dbname =  'dbtest';
        $this -> connection = new  mysqli($servername, $username, $password, $dbname);
    }
    function getConnect(){
        return $this -> connection;
    }
}
?>  