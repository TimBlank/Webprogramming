<?php

include_once "IusermanagmentDao.php";
class Usermanagment implements iUsermanagment {
    //prüfen ob Logindaten korrekt sind
    function verifyLogin($name, $password) {
        try {
            $db = databaseConnect();
            $sql = "SELECT password FROM user WHERE username = (:loadName)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":loadName", $name);
            $stmt->execute();
            $hashData = $stmt->fetchObject();
            $hash = $hashData->password;

            $db = null;

            return password_verify($password, $hash);
        } catch (PDOException $ex) {
            echo "Fehler: " . $ex->getMessage();
        }
    }

    //neuenBenutzer regristrieren
    function registerUser($email,$password,$username) {
        try {
            $db = databaseConnect();
            $db->beginTransaction();

            //Überprüfen ob Benutzer schon existiert
            $sql = "SELECT username FROM user WHERE username = (:username)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $userData = $stmt->fetchObject();
            if(empty($userData)) {
                //Passwort Hashen und neuen Benutzer hinzufügen
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user (username, password, email) VALUES (:username, :passwordHash, :email)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":passwordHash", $passwordHash);
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                $db->commit();
                $db = null;
                return true;
            } else {
                //Benutzer existiert bereits
                $db->commit();
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            echo "Fehler: " . $ex->getMessage(). "<br />";
            $db->rollBack();
            $db = null;
        }
    }

    public function userExists($username){
        try {
            $db = databaseConnect();
            $db->beginTransaction();

            $sql = "SELECT username FROM user WHERE username = (:username)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $userData = $stmt->fetchObject();

                $db->commit();
                $db = null;
                return !empty($userData);

        } catch (PDOException $ex) {
            echo "Fehler: " . $ex->getMessage(). "<br />";
            $db->rollBack();
            $db = null;
        }
    }
}

?>
