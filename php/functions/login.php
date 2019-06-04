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
             //TODO  $sql ="SELECT * FROM user WHERE username=? OR email=? OR Accountname=?;";
             $sql ="SELECT * FROM user WHERE username=?;";
             $db = databaseConnect();
             $stmt= mysql_stmt_init(db);

             if(!mysql_stmt_prepare($stmt, $sql)){
                 header("Location: ../index.php?error=sqlerror")
                 exit();
             }
             else{
                 mysql_stmt_bind_param($stmt, "ss" ,$Username,$Username );
                 mysql_stmt_execute($stmt);
                 $results= mysql_stmt_get_result($stmt);
                 if(!empty($row= mysql_fetch_assoc())){
                     //TODO richtiger name aus der Datenbank
                     $passwordcheck= password_verify($Password, $row['password' ]);
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

                            $db = null;
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




function verifyLogin($name, $password) {
    try{
        $db = databaseConnect();
        $sql = "SELECT password FROM user WHERE username = (:loadName)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":loadName", $name);
        $stmt->execute();
        $hashData = $stmt->fetchObject();
        $hash = $hashData->password;
        $db.close();

        $db = null;

    return password_verify($password, $hash);

    }catch (PDOException $ex) {
        echo "Fehler: " . $ex->getMessage();
   }
}
