<?php

//Wenn man eine MySql-Datenbank verwenden will muss nur diese Datei geändert werden
function databaseConnect(){
    $user = "root";
    $pw = null;
    $dsn = "sqlite:php/functions/datamanagment/database.db";
    $db = new PDO($dsn, $user, $pw);

    return $db;
}

?>
