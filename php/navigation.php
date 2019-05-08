<nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img alt="Pixel Bike" src="../../Bilder/IconTransparent.png"></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr- auto ">
                <li class="nav-item active"><a class="nav-link" href="../../Index.php" title="Hauptseite">
                        Start
                        <span class="sr-only">(current)</span>
                    </a></li>
                <li class="nav-item"><a class="nav-link" href="../../Karte.php" title="Haarentor">
                        Haarentor
                    </a></li>
                <li class="nav-item"><a class="nav-link" href="../../Karte.php" title="Wechloy">
                        Wechloy
                    </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Weitere Standorte">Weitere</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../Karte.php" title="Johann-Justus-Weg">
                            Johann-Justus-Weg
                        </a>
                        <a class="dropdown-item" href="../../Karte.php" title="Botanischer Garten">
                            Botanischer Garten
                        </a>
                        <a class="dropdown-item" href="../../Karte.php" title="Offis">
                            Offis
                        </a>
                    </div>

                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="navbarNav">
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Registrierung</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item">
                            <form class="form-inline dropdown-item">
                                <div class="form-group">
                                    <label for="username">
                                        Benutzername
                                    </label>
                                    <input type="text" class="form-control" id="username" name="un" value="" placeholder="Benutzername" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        Passwort
                                    </label>
                                    <input type="text" class="form-control" id="password" name="pw" value="" placeholder="Passwort" autocomplete="off" />
                                </div>
                                <button type="submit" class="btn btn-default">Einloggen</button>
                            </form>
                            <a class="dropdown-item" href="../../Regestrierung.php" title="Registrieren">Registrieren </a>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
