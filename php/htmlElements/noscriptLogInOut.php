<?php if(isset($_SESSION["User"])){?>

<form action="redirect.php" method="post" class="form-inline dropdown-item">
    <button type="submit" class="btn btn-default" name="logoutSubmit" value="logoutSubmit">
        Ausloggen
    </button>
</form>
<?php }else{ ?>

<div class="form-inline">
    <form action="redirect.php" method="post" class="form-inline dropdown-item">
        <div>
            <input type="text" class="form-control" id="username" name="un" placeholder="Benutzername" autocomplete="off" required>
            <input type="password" class="form-control" id="password" name="pw" placeholder="Passwort" autocomplete="off" required>
        </div>
        <div id="loginBtn">
            <button type="submit" class="btn btn-primary" name="loginSubmit" value="loginSubmit">
                Einloggen
            </button>
        </div>
    </form>

    <a class="btn btn-primary noScr" role="button" href="../../registration.php" title="Hier kann man sich Registrieren">
        Registrieren
    </a>
</div>
<?php } ?>
