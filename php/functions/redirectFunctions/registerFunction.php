<?php

if(isset($_POST["registerBtn"])){
    $name = null;
    $email = null;
    $password = null;
    $passwordRepeat = null;
    $accountName = null;

    $formCor = true;

    if(isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST["email"]);
    } else {
        $formCor = false;
        //echo "Fehler bei der E-Mail. <br>";
    }

    if(isset($_POST["password"])) {
        $password = $_POST["password"];
    } else {
        $formCor = false;
         //echo "Fehler beim Passwort. <br>";
    }

    if(isset($_POST["passwordRepeat"])) {
        $passwordRepeat = $_POST["passwordRepeat"];
    } else {
        $formCor = false;
        //echo "Fehler beim Passwort wiederholen. <br>";
    }

    if(isset($_POST["accountName"])&&is_string($_POST["accountName"])) {
        $accountName = htmlspecialchars($_POST["accountName"]);
    } else {
        $formCor = false;
        //echo "Fehler beim Account Namen. <br>";
    }

    if($formCor == true) {
        if($password == $passwordRepeat) {
            if($usermanager->registerUser($email, $password, $accountName)){
                $_SESSION["Message"] = "Registrierung erfolgreich.";
                header('Location: '.$domain."/Index.php");
            }else{
                $_SESSION["Message"] = "Registrierung fehlgeschlagen.";
                header('Location: '.$domain."/registration.php");
            }
        } else {
            $_SESSION["Message"] = "Passwörter sind nicht gleich.";
            header('Location: '.$domain."/registration.php");
        }
    } else {
         $_SESSION["Message"] = "Fehler bei der Registrierung";
        header('Location: '.$domain."/registration.php");
    }

}

?>
