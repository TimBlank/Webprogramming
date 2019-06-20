<?php
             //Quelle: https://www.tutorialrepublic.com/faq/how-to-get-current-page-url-in-php.php
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

                        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        ?>

<?php if(isset($_SESSION["User"])){?>

<form action="redirect.php" method="post" class="form-inline dropdown-item">
    <?php echo '<input type="hidden" name="PrevPage" value="'.$url.'" required>';?>
    <button type="submit" class="btn btn-default" name="logoutSubmit" value="logoutSubmit">
        Ausloggen
    </button>
</form>
<?php }else{ ?>

<div class="form-inline">
    <form action="redirect.php" method="post" class="form-inline dropdown-item">
        <?php echo '<input type="hidden" name="PrevPage" value="'.$url.'" required>';?>
        <div>
            <input type="text" class="form-control" id="username" name="un" placeholder="Benutzername" autocomplete="off" required>
            <input type="password" class="form-control" id="password" name="pw" placeholder="Passwort" autocomplete="off" required>
        </div>
        <div id="loginBtn">
            <button type="submit" class="btn btn-default" name="loginSubmit" value="loginSubmit">
                Einloggen
            </button>
        </div>
    </form>

    <a class="" href="../../registration.php" title="Hier kann man sich Registrieren">
        <button class="btn btn-default noScr">
            Registrieren
        </button>
    </a>
</div>
<?php } ?>
