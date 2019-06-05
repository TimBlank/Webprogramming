<?php

//prüfen ob Logindaten korrekt sind
function verifyLogin($name, $password) {
    if($name=="Test" && $password=="Test"){
    return true;
    }
    return false;
}

//neuenBenutzer regristrieren
function registerUser($realName,$email,$password,$userName){
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
?>
