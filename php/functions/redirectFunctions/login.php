<?php
try{
    if(isset($_POST["loginSubmit"])){

        $formIsSet=true;
        $Username=null;
        $Password=null;

        if(isset($_POST["un"]) && is_string($_POST["un"])) {
            if(strlen($_POST["un"]) !== 0) {
                $Username = htmlspecialchars($_POST["un"]);
            } else {
                $_SESSION["Message"] = $_SESSION["Message"] . "Der Benutzername ist leer. <br>";
            $formIsSet=false;
            }
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Benutzername. <br>";
            $formIsSet=false;
        }

        if(isset($_POST["pw"]) && is_string($_POST["pw"])) {
            if(strlen($_POST['pw']) !== 0){
                $Password = htmlspecialchars($_POST['pw']);
            } else {
                $_SESSION["Message"] = $_SESSION["Message"] . "Password ist leer. <br>";
                $formIsSet=false;
            }
        } else {
           $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Password. <br>";
           $formIsSet=false;
        }

        if($formIsSet && $usermanager->verifyLogin($Username,$Password) ){
            $_SESSION["User"]= $Username;
            $_SESSION["passs"]= $Password;
            $_SESSION["Message"] = $_SESSION["Message"] . "Login Erfolgreich.  <br>";
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Login nicht erfolgreich.  <br>";
        }
        header('Location: '.$domain.$prevPage);
    }
}
    finally{
        //echo "Ende <br> ";
}
?>
