<ul class="navbar-nav navbar-right ml-auto">
    <li class="nav-item dropdown">

        <?php if(isset($_SESSION["User"])){?>

        <form action="php/functions/logout.php" method="post" class="form-inline dropdown-item">
            <button type="submit" class="btn btn-default" name="logoutSubmit" value="logoutSubmit">
                Ausloggen
            </button>
        </form>
        <?php }else{ ?>
        <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Einloggen oder Regestrieren">Login</a>
        <div class="dropdown-menu bg-light dropdown-menu-right">
            <a class="dropdown-item">
                <div class="form-inline dropdown-item">
                    <form action="php/functions/login.php\" method="post" class="form-inline dropdown-item">
                        <div>
                            <label for="username">
                                Benutzername
                            </label>

                            <input type="text" class="form-control" id="username" name="un" placeholder="Benutzername" autocomplete="off" />
                            <label for="password">
                                Passwort
                            </label>

                            <input type="text" class="form-control" id="password" name="pw" placeholder="Passwort" autocomplete="off" />
                        </div>
                        <button type="submit" class="btn btn-default" name="loginSubmit" value="loginSubmit">
                            Einloggen
                        </button>
                    </form>

                    <a class="dropdown-item" href="../../registration.php" title="Hier kann man sich Registrieren">
                        Registrieren
                    </a>
                </div>
            </a>
        </div>
        <?php } ?>
    </li>
</ul>
