<!DOCTYPE html>
<!-- Seite auf der Stellplätze angzeigt werden, kann auf einen Bereich eingestellt werden(Haarentor, Wechloy, etc.) -->

<html lang="de">

<head>
    <?php include_once "php/htmlElements/head.php";?>
</head>

<body>
    <?php include_once "php/htmlElements/header.php"; ?>
    <?php include_once "php/htmlElements/navigation.php"; ?>

    <div id="background">
        <section>
            <div id="mainFrame">
                <div class="row">
                    <div class="col col-auto" id="sideSearch">
                        <div>
                            <?php include "php/htmlElements/bigWeatherWidget.php"; ?>
                            <?php include "php/htmlElements/search.php"; ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h1><a :class="card-title" title="Standort:">
                                    Standort:
                                </a></h1>
                            <!-- TODO Höhe adaptiv-->
                            <div class="mapBox">
                                <div class='box' id="importedMap">
                                    <iframe class="content" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=7.756347656250001%2C53.0193631492509%2C8.463592529296877%2C53.23772373999386&amp;layer=mapnik" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/#map=11/53.1287/8.1100">Größere Karte anzeigen</a></small>
                                </div>
                                <!--Start Quelle: https://stackoverflow.com/questions/1577598/how-to-hide-parts-of-html-when-javascript-is-disabled-->
                                <noscript>
                                    <style>
                                        #importedMap {
                                            display: none;
                                        }
                                    </style>
                                    <div>
                                        <label>Zum Nutzen der Karte bitte JavaScript Aktivieren</label>
                                    </div>
                                </noscript>
                                <!--Ende-->
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION["User"])){
                        echo "<a href=\"createEntryPage.php\" class=\"btn btn-primary\" title=\"VorlageBeitrag\">Neuen Stellplatz hinzufügen</a>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--TODO    Bereiche: einteilen
                Marker:   setzen
                Webseite: https://wiki.openstreetmap.org/wiki/OpenLayers
    -->

    <?php include_once "php/htmlElements/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
