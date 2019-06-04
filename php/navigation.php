<nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img alt="Pixel Bike" src="../../pictures/IconTransparent.png"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr- auto ">
                <li class="nav-item active"><a class="nav-link" href="../../index.php" title="Hauptseite">
                        Start
                    </a></li>
                <li class="nav-item active"><a class="nav-link" href="../../map.php" title="Haarentor">
                        Haarentor
                    </a></li>
                <li class="nav-item active"><a class="nav-link" href="../../map.php" title="Wechloy">
                        Wechloy
                    </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Weitere Standorte">Weitere</a>
                    <div class="dropdown-menu bg-light">
                        <a class="dropdown-item" href="../../map.php" title="Johann-Justus-Weg">
                            Johann-Justus-Weg
                        </a>
                        <a class="dropdown-item" href="../../map.php" title="Botanischer Garten">
                            Botanischer Garten
                        </a>
                        <a class="dropdown-item" href="../../map.php" title="Offis">
                            Offis
                        </a>
                    </div>

                </li>
                <li class="nav-item dropdown sm-only" id="navSearch">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Suche">
                        <i class="fas fa-search"></i>
                        <span class="sr-only">Suche</span>
                    </a>
                    <div class="dropdown-menu bg-light dropdown-menu-right">
                        <a class="dropdown-item">
                            <?php include "php/search.php"; ?>
                        </a>
                    </div>

                </li>
            </ul>
<!--Login


<form action="php/login.php" methode="post">
<input type="text" name="username" placeholder="Benutzername">
<input type="password" name="password" placeholder="Passwort">
</form>
-->
<?php include "php/functions/datamanagment/usermanagmentDao.php"; ?>

            <ul class="navbar-nav navbar-right ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Einloggen oder Regestrieren">Login/Registrierung</a>
                    <div class="dropdown-menu bg-light dropdown-menu-right">
                        <a class="dropdown-item">

                            <form action="php/login.php" methode="post" class="form-inline dropdown-item">
                                <?php //verifyLogin(); ?>
                                    <div class="form-group">
                                    <label for="username">
                                        Benutzername
                                    </label>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="un" value="" placeholder="Benutzername" autocomplete="off" />
                                <div class="form-group">
                                    <label for="password">
                                        Passwort
                                    </label>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="pw" value="" placeholder="Passwort" autocomplete="off" />
                                    <button type="submit" class="btn btn-default" name="login-submit">Einloggen</button>
                            </form>

                            <a class="dropdown-item" href="../../registration.php" title="Hier kann man sich Registrieren">Registrieren </a>

                            <form action="php/logout.php" class="form-inline dropdown-item">
                                    <button type="submit" class="btn btn-default">Auslogen</button>
                            </form>

                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
