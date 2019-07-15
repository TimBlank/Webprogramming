<!DOCTYPE html>
<!-- Hauptseite-->

<html lang="de">

<head>
    <?php include_once "php/htmlElements/head.php";?>
    <?php include_once "javascript/indexMapFunctions.php"; ?>
</head>

<body>
    <?php include_once "php/htmlElements/header.php"; ?>
    <?php include_once "php/htmlElements/navigation.php"; ?>
    <?php include_once "php/functions/datamanagment/databaseConnection.php"; ?>
    <?php include_once "php/functions/datamanagment/contentmanagmentImpl.php"; ?>
    <?php include_once "php/functions/loadEntries.php"; ?>

    <div id="background">
        <div id="mainFrame">
            <article class="card border-0">

                <h1> <a class="card-title" title="Über diese Seite">
                        Über diese Seite
                    </a></h1>
                <div class="card-body">
                    Auf dieser Seite kannst du die Fahrradstellplätze in der Nähe der Carl von Ossietzky Universität in Oldenburg finden und regestrierte Benutzer können fehlende Plätze hinzufügen und Kommentare schreiben.
                </div>

            </article>
            <div class="row">
                <div class="col col-auto" id="sideSearch">
                    <div>
                        <?php include "php/htmlElements/bigWeatherWidget.php"; ?>
                        <?php include "php/htmlElements/search.php"; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card-group">
                        <div class="card">
                            <ul class="list-unstyled">
                                <?php
                                    $resultCount=0;
                                    foreach(loadEntries($contentmanager) as $entryID):
                                ?>
                                <?php
                                    $resultCount=$resultCount+1;
                                    $content = $contentmanager->loadEntry($entryID);
                                    ?>
                                <li id="<?php echo $content->getId();?>" class="entry">
                                    <h1><a class="card-title entryName" title="<?php echo $content->getName(); ?>">
                                            <?php echo $content->getName(); ?>
                                        </a></h1>
                                    <div class="card-group">
                                        <div class="card">
                                            <p hidden class="longitude"><?php echo $content->getLongitude();?></p>
                                            <p hidden class="latitude"><?php echo $content->getLatitude();?></p>
                                            <img class="card-img-top" class="img-fluid" src="<?php echo $content->getImage(); ?>" alt="Bild des Stellplatzes" onclick="openImgModal(this.src);">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Infos</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><?php echo $content->stringIsPublic() ?></li>
                                                    <li class="list-group-item"><?php echo $content->getSize() ?></li>
                                                    <li class="list-group-item"><?php echo $content->stringHasRoof() ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div id="minimap<?php echo $content->getId(); ?>" class="map">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="entryPage.php?EntryID=<?php echo $content->getId() ?>" class="btn btn-primary">Mehr informationen</a>
                                </li>
                                <?php endforeach;
                                if($resultCount==0){
                                    echo "<li>Keine Ergebnisse</li>";
                                }
                                ?>
                                <script>
                                    window.onload = function() {
                                        $('.entry').each(function() {
                                            var entryId = this.id;
                                            var entryName = $(".entryName", this).text();
                                            var longitude = parseFloat($(".longitude", this).text().replace(",", "."));
                                            var latitude = parseFloat($(".latitude", this).text().replace(",", "."));
                                            var mapElement = $(".minimap", this);
                                            var location = createLocation(longitude, latitude);
                                            var map = initMap(location, entryId);
                                            addMarker(location, map, entryId, entryName);
                                        });
                                    }

                                </script>
                                <script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap ">
                                </script>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "php/htmlElements/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
