<?php
ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 0);
session_start();

$PrevPage = "http://localhost/index.php";
if(isset($_POST["PrevPage"])){
 $PrevPage = htmlspecialchars($_POST["PrevPage"]);
}
include_once "php/functions/datamanagment/databaseConnection.php";

include_once "php/functions/datamanagment/usermanagmentImpl.php";
$usermanager = new Usermanagment;

include_once "php/functions/datamanagment/contentmanagmentImpl.php";
$contentmanager = new Contentmanagment;

include_once "php/functions/redirectFunctions/createEntryFunction.php";

include_once "php/functions/redirectFunctions/commentFunction.php";

include_once "php/functions/redirectFunctions/deleteEntry.php";

include_once "php/functions/redirectFunctions/alterEntry.php";

include_once "php/functions/redirectFunctions/deleteComment.php";

include_once "php/functions/redirectFunctions/registerFunction.php";

include_once "php/functions/redirectFunctions/login.php";

include_once "php/functions/redirectFunctions/logout.php";

?>
