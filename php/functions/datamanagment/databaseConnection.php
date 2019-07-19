<?php

function databaseConnect(){
    $user = "root";
    $pw = null;
    $dsn = "sqlite:database/database.db";
    $db = new PDO($dsn, $user, $pw);

    return $db;
}

?>
