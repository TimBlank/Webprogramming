<?php

include_once "IusermanagmentDao.php";
class UsermanagmentDao implements iUsermanagment{
//prüfen ob Logindaten korrekt sind
public function verifyLogin($name, $password) {
    if($name=="Test" && $password=="Test"){
    return true;
    }
    return false;
}

//neuenBenutzer regristrieren
public function registerUser($realName,$email,$password,$userName){
    if($realName == "Test") {
        $file = 'reg.txt';
        $handle = fopen($file, 'a') or die('Cannot open file:  '.$file);
        $text = fwrite($handle, $realName . ";" . $email . ";" . $password . ";" . $userName . "\n");
        fclose($handle);
        return true;
    } else {
        //echo "Error";
        return false;
    }
}
    }
?>
