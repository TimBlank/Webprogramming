<?php
interface iUsermanagment{
    function verifyLogin($name, $password);
    function registerUser($email,$password,$userName);
}

?>
