<?php
     if(isset($_Post['login-submit'])){

        require '/functions/datamanagment/databaseConnection.php';
         require '/funtions/datamanagment/usermanagmentImpl.php';

        $Username = $_Post['un'];
        $Password = $_Post['pw'];


         try{
             verifyLogin($name, $password);

         }

             /*
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









        /* verifyLogin();


        $RePassword = $_Post['??'];
        $Email = $_Post['??'];
        $accountname = $_Post['??'];

     }*/
