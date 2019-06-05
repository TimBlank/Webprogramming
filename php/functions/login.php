<?php

try{
    //Prüft ob mit Post versendet wurde
     if(isset($_POST["un"])) {
         $Username = $_POST["un"];
        } else {
            echo "Fehler beim Usernamen. <br>";
        }

       if(isset($_POST["pw"])) {
        $Password = $_POST['pw'];
        } else {
            echo "Fehler beim Password. <br>";
        }

    //prüft ob werte in Password und Username sind
if (isset($Username) && isset($Password)  ){

    echo "Username da: " .$Username ;
    if($Username=="Test"){
        echo "-->Test";
    }
    echo "<br>";
       echo "Password da: ". $Password;
    if($Password=="Test"){
        echo "-->Test";
    }
    echo "<br>";

    if($Username=="Test" && $Password=="Test" ){
        session_start();    //$_SESSION gloable variable becomes Available
        $_SESSION["Test"]= $Username;
        //header('Location: http://localhost/index.php');
        exit;
    }


    /* TODO Datenbank verknüpfung wie bei usermanagmentImpl
    try{
        include "datamanagment/databaseConnection.php";
        $db = databaseConnect();
        $sql = "SELECT password FROM user WHERE username = $Username";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("$Username", $name);
        $stmt->execute();
        $hashData = $stmt->fetchObject();
        $hash = $hashData->password;
        $db.close();

        $db = null;

    return password_verify($password, $hash);

    }catch (PDOException $ex) {
        echo "Fehler: " . $ex->getMessage();
   }finally{
        echo "Fehler: ";
    }*/



}
        }
         finally{
             echo "Ende <br> ";
         }
?>
