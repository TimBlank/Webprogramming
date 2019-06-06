<?php
ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 0);
session_start();

$PrevPage = "http://localhost/index.php";
if(isset($_POST["PrevPage"])){
 $PrevPage = htmlspecialchars($_POST["PrevPage"]);
}
include "php/functions/datamanagment/databaseConnection.php";

include "php/functions/datamanagment/usermanagmentImpl.php";

include "php/functions/datamanagment/contentmanagmentImpl.php";

include "php/functions/redirectFunctions/createEntryFunction.php";

include "php/functions/redirectFunctions/commentFunction.php";

include "php/functions/redirectFunctions/registerFunction.php";

include "php/functions/redirectFunctions/login.php";

include "php/functions/redirectFunctions/logout.php";

?>
