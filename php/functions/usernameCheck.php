
<?php
include_once "datamanagment/usermanagmentImpl.php";

if(isset($_REQUEST["name"])){
    // get the q parameter from URL
    $usermanager = new Usermanagment();
    $name = htmlspecialchars($_REQUEST["name"]);

    // Output "no suggestion" if no hint was found or output correct values
    echo $usermanager->userExists($name);
}
?>
