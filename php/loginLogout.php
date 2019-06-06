<ul class="navbar-nav navbar-right ml-auto">
    <li class="nav-item dropdown">
        <?php
             //Quelle: https://www.tutorialrepublic.com/faq/how-to-get-current-page-url-in-php.php
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

                        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        ?>

        <?php if(isset($_SESSION["User"])){?>

        <form action="redirect.php" method="post" class="form-inline dropdown-item">
            <?php echo '<input type="hidden" name="PrevPage" value="'.$url.'">';?>
            <button type="submit" class="btn btn-default" name="logoutSubmit" value="logoutSubmit">
                Ausloggen
            </button>
        </form>
        <?php }else{ ?>
        <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Einloggen oder Regestrieren">Login</a>
        <div class="dropdown-menu bg-light dropdown-menu-right">
            <a class="dropdown-item">
                <div class="form-inline dropdown-item">
                    <form action="redirect.php" method="post" class="form-inline dropdown-item">
                        <?php echo '<input type="hidden" name="PrevPage" value="'.$url.'">';?>
                        <div>
                            <label for="username">
                                Benutzername
                            </label>

                            <input type="text" class="form-control" id="username" name="un" placeholder="Benutzername" autocomplete="off" />
                            <label for="password">
                                Passwort
                            </label>

                            <input type="password" class="form-control" id="password" name="pw" placeholder="Passwort" autocomplete="off" />
                        </div>
                        <div id="loginBtn">
                            <button type="submit" class="btn btn-default" name="loginSubmit" value="loginSubmit">
                                Einloggen
                            </button>
                        </div>
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
