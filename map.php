<!DOCTYPE html>
<!-- Seite auf der Stellplätze angzeigt werden, kann auf einen Bereich eingestellt werden(Haarentor, Wechloy, etc.) -->

<html lang="de">

<head>
    <?php include "php/head.php";?>
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>

    <div id="background">
    <section>
        <div id="mainFrame">
            <div class="row">
                <div class="col col-auto" id="sideSearch">
                    <div>
                        <?php include "php/search.php"; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h1><a :class="card-title" title="Standort:">
                                Standort:
                            </a></h1>
                        <!-- TODO Höhe adaptiv-->
                        <div class="mapBox">
                            <div class='box'>
                               <iframe src="https://www.google.com/maps/d/embed?mid=1PEH14t02jnaQdPOHBk3g4pOd2qnDYgeT" width="100%" height="100%"></iframe>

                            </div>
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

    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
