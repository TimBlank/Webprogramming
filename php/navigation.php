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

            <ul class="navbar-nav navbar-right ml-auto">
                <li class="nav-item dropdown">

                            <?php
                                if(isset($_SESSION["User"])){
                                    echo "<form action=\"php/functions/logout.php\" class=\"form-inline dropdown-item\">";
                                    echo "<button type=\"submit\" class=\"btn btn-default\" name=\"logout-button\">";
                                        echo "Auslogen";
                                    echo "</button>";

                                }else{
                                    echo"<a class=\"nav-link dropdown-toggle active\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" title=\"Einloggen oder Regestrieren\">Login</a>";
                                    echo"<div class=\"dropdown-menu bg-light dropdown-menu-right\">";
                                    echo"<a class=\"dropdown-item\">";
                                    echo"<div  class=\"form-inline dropdown-item\">";
                                    echo"<form  action=\"php/functions/login.php\" method=\"post\" class=\"form-inline dropdown-item\">";
                                    echo"<label for=\"username\">";
                                        echo"Benutzername";
                                    echo"</label>";

                                    echo"<input type=\"text\" class=\"form-control\" id=\"username\" name=\"un\" placeholder=\"Benutzername\" autocomplete=\"off\" />";
                                    echo"<label for=\"password\">";
                                        echo"Passwort";
                                    echo"</label>";

                                    echo"<input type=\"text\" class=\"form-control\" id=\"password\" name=\"pw\" placeholder=\"Passwort\" autocomplete=\"off\" />";
                                    echo"<button type=\"submit\" class=\"btn btn-default\" name=\"login-submit\">";
                                        echo"Einloggen";
                                    echo"</button>";
                                    echo" </form>";

                                    echo"<a class=\"dropdown-item\" href=\"../../registration.php\" title=\"Hier kann man sich Registrieren\">";
                                        echo"Registrieren";
                                    echo"</a>";
                                    echo"</div>";
                                    echo"</a>";
                                    echo"</div>";
                                //echo"";
                                }
                                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
