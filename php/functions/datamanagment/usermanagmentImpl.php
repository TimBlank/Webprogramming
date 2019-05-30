<?php
include "databaseConnection.php";

//prüfen ob Logindaten korrekt sind
function verifyLogin($name, $password) {
    try{
        $db = databaseConnect();
        $sql = "SELECT password FROM user WHERE username = (:loadName)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":loadName", $name);
        $stmt->execute();
        $hashData = $stmt->fetchObject();
        $hash = $hashData->password
        $db.close();
        $db = null;

    yield password_verify($password, $hash);

    }catch (PDOException $ex) {
        echo "Fehler: " . $ex->getMessage();
   }
}

//neuenBenutzer regristrieren
function registerUser($realName,$email,$password,$userName){}

?>
