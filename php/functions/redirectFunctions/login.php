<?php
try{
    if(isset($_POST["loginSubmit"])){

        $formIsSet=true;
        $Username=null;
        $Password=null;

        if(isset($_POST["un"]) && is_string($_POST["un"])) {
            $Username = htmlspecialchars($_POST["un"]);
            } else {
                //echo "Fehler beim Usernamen. <br>";
                $formIsSet=false;
            }

        if(isset($_POST["pw"]) && is_string($_POST["pw"])) {
            $Password = htmlspecialchars($_POST['pw']);
        } else {
           //echo "Fehler beim Password. <br>";
           $formIsSet=false;
        }

        if($formIsSet && $usermanager->verifyLogin($Username,$Password) ){
            $_SESSION["User"]= $Username;
            $_SESSION["passs"]= $Password;
            $_SESSION["Message"] = $_SESSION["Message"] . "Login Erfolgreich.  <br>";
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Login Falsch.  <br>";
        }
        header('Location: '.$domain.$prevPage);
    }
}
    finally{
        //echo "Ende <br> ";
}
?>
