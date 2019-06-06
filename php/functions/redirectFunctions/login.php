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

        if($formIsSet && verifyLogin($Username,$Password) ){
            session_start();    //$_SESSION gloable variable becomes Available
            $_SESSION["User"]= $Username;
            $_SESSION["passs"]= $Password;
        }
        header('Location: '.$PrevPage);
    }
}
    finally{
        //echo "Ende <br> ";
}
?>
