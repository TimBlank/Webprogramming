<?php
ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 0);
ini_set("session.use_trans_sid", 0);
session_start();

include "php/functions/datamanagment/usermanagmentDao.php";

include "php/functions/datamanagment/contentmanagmentDao.php";

include "php/functions/redirectFunctions/createEntryFunction.php";

include "php/functions/redirectFunctions/commentFunction.php";

include "php/functions/redirectFunctions/registerFunction.php";

include "php/functions/redirectFunctions/login.php";

include "php/functions/redirectFunctions/logout.php";

?>
