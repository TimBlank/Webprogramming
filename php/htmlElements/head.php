<?php
    ini_set("session.use_cookies", 1);
    ini_set("session.use_only_cookies", 0);
    ini_set("session.use_trans_sid", 0);
    session_start();

    include_once "php/functions/datamanagment/databaseConnection.php";
    include_once "php/functions/datamanagment/contentmanagmentImpl.php";
    //Quelle: https://www.tutorialrepublic.com/faq/how-to-get-current-page-url-in-php.php
    $contentmanager = new Contentmanagment;
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domain = $protocol.$_SERVER['HTTP_HOST'];
    $page = $_SERVER['REQUEST_URI'];
    $_SESSION["domain"]=$domain;
    $_SESSION["page"]=$page;
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/structure.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fahrrad Stellpätze</title>
<link href="pictures/IconTransparent.png" rel="icon">
