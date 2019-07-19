<?php

function databaseConnect(){
    $user = "root";
    $pw = null;
    $dsn = "sqlite:../database/database.db";
    $db = new PDO($dsn, $user, $pw);

    return $db;
}

include_once "functions/datamanagment/usermanagmentImpl.php";

    $usermanager = new Usermanagment();
    $name = htmlspecialchars($_REQUEST["name"]);

    echo "".$usermanager->userExists($name);
?>
