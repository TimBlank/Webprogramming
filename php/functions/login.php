<?php
     if(isset($_Post['login-submit'])){
         require 'php/funtions/login.php';

        $Username = $_Post['un'];
        $Password = $_Post['pw'];



========================================================================================================================================================================

         if(empty($Username)||empty($Password) ){
            header("Location: ../index.php?error=emptyfields")
            exit();
         }
         else(){
             //TODO richtige namen aus der Daten bank
             $sql ="SELECT * FROM usertable WHERE username=? OR email=? OR Accountname=?; ";
             //TODO verbind zur Datenbank
             $stmt= mysql_stmt_init($conn);
             if(!mysql_stmt_prepare($stmt, $sql)){
                 header("Location: ../index.php?error=sqlerror")
                 exit();
             }
             else{
                 mysql_stmt_bind_param($stmt, "ss" ,$Username,$Username );
                 mysql_stmt_execute($stmt);
                 $results= mysql_stmt_get_result($stmt);
                 if(empty($row= mysql_fetch_assoc())){
                     //TODO richtiger name aus der Datenbank
                     $passwordcheck= password_verify($Password, $row['pwdUsers' ]);
                     if($passwordcheck= false){
                        header("Location: ../index.php?error=wrongpassword")
                        exit();
                     }
                     else if($passwordcheck= true){
                         <?php
                            ini_set("session.use_cookies", 1);
                            ini_set("session.use_only_cookies", 0);
                            ini_set("session.use_trans_sid", 0);
                            session_start();
                        ?>
                     }
                     else(){
                         header("Location: ../index.php?error=wrongpassword")
                        exit();
                     }
                }
                else{
                     header("Location: ../index.php?error=nouser")
                 exit();
                }
            }
        }
    }
    else{
        header("Location: ../index.php")
        exit();
    }




========================================================================================================================================================================
//Login TODO
function login() {
    if(isset($_POST["login-submit"])){
        $name = null;
        $password = null;

        $formCor = true;

        if(isset($_POST["name"])&&is_string($_POST["name"])) {
            $name = htmlspecialchars($_POST["name"]);
        } else {
            $formCor = false;
            echo "Falscher Namen. <br>";
        }

        if(isset($_POST["password"])) {
            $password = $_POST["password"];
        } else {
            $formCor = false;
            echo "Falsches Passwort. <br>";
        }

        if($formCor == true) {
        } else {
            echo "Fehler bei beim Login";
        }
    }
}
========================================================================================================================================================================

       //prüfen ob Logindaten korrekt sind
function verifyLogin($name, $password) {
    if($name="Test"){
    return true;
    }
    return false;
}
