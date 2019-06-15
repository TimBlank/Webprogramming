<?php
interface Iusermanagment{
    function verifyLogin($name, $password);
    function registerUser($realName,$email,$password,$userName);
}

?>
