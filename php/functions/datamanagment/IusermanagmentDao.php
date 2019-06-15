<?php
interface iUsermanagment{
    function verifyLogin($name, $password);
    function registerUser($realName,$email,$password,$userName);
}

?>
