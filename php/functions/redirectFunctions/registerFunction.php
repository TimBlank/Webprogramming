<?php

if(isset($_POST["registerBtn"])) {
    $name = null;
    $email = null;
    $password = null;
    $passwordRepeat = null;
    $accountName = null;
    $formCor = true;

    //Check E-Mail
    if(isset($_POST["email"]) && is_string($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        if(strlen($_POST["email"]) !== 0) {
            $email = htmlspecialchars($_POST["email"]);
        } else {
            $formCor = false;
            $_SESSION["Message"] = $_SESSION["Message"] . "E-Mail ist leer. <br>";
        }
    } else {
        $formCor = false;
        $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der E-Mail. <br>";
    }

    //Check Password
    if(isset($_POST["password"]) && is_string($_POST["password"])) {
        if(strlen($_POST["password"]) !== 0) {
            $password = htmlspecialchars($_POST["password"]);
        } else {
            $formCor = false;
            $_SESSION["Message"] = $_SESSION["Message"] . "Passwort is leer. <br>";
        }
    } else {
        $formCor = false;
        $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Passwort. <br>";
    }

    //Check repeated Password
    if(isset($_POST["passwordRepeat"]) && is_string($_POST["passwordRepeat"])) {
        if(strlen($_POST["passwordRepeat"]) !== 0) {
            $passwordRepeat = htmlspecialchars($_POST["passwordRepeat"]);
        } else {
            $formCor = false;
            $_SESSION["Message"] = $_SESSION["Message"] . "Wiederholtes Passwort is leer. <br>";
        }
    } else {
        $formCor = false;
        $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Passwort wiederholen. <br>";
    }

    //Check Accountname
    if(isset($_POST["accountName"]) && is_string($_POST["accountName"])) {
        if(strlen($_POST["accountName"]) !== 0) {
            $accountName = htmlspecialchars($_POST["accountName"]);
        } else {
            $formCor = false;
            $_SESSION["Message"] = $_SESSION["Message"] . "Passwort is leer. <br>";
        }
    } else {
        $formCor = false;
        $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Account Namen. <br>";
    }

    //Check agreed to Data Protection
    if(isset($_POST["dataProtection"]) && $_POST["dataProtection"] == true) {

    } else {
        $formCor = false;
        $_SESSION["Message"] = $_SESSION["Message"] . "Um ein Account zu erstellen muss dem Datenschutz zugestimmt werden. <br>";
    }


    if($formCor == true) {
        if($password == $passwordRepeat) {
            if($usermanager->registerUser($email, $password, $accountName)) {
                $_SESSION["Message"] = $_SESSION["Message"] . "Registrierung erfolgreich. <br>";
                header('Location: '.$domain."/Index.php");
            } else {
                $_SESSION["Message"] = $_SESSION["Message"] . "Registrierung fehlgeschlagen. <br>";
                header('Location: '.$domain."/registration.php");
            }
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Passwörter sind nicht gleich. <br>";
            header('Location: '.$domain."/registration.php");
        }
    } else {
         $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Registrierung. <br>";
        header('Location: '.$domain."/registration.php");
    }
}

?>
