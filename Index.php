<!DOCTYPE html>
<!-- Hauptseite-->

<html lang="de">

<head>
    <?php include_once "php/head.php";?>
</head>

<body>
    <?php include_once "php/header.php"; ?>
    <?php include_once "php/navigation.php"; ?>
    <?php include_once "php/functions/datamanagment/databaseConnection.php"; ?>
    <?php include_once "php/functions/datamanagment/contentmanagmentImpl.php"; ?>
    <?php include_once "php/functions/userInput.php"; ?>

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
                        <?php include "php/search.php"; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card-group">
                        <div class="card">
                            <ul class="list-unstyled">
                                <?php foreach(loadEntries($contentmanager) as $entryID): ?>
                                <li>
                                    <?php $content = $contentmanager->loadEntry($entryID); ?>
                                    <h1><a class="card-title" title="<?php echo $content->getName(); ?>">
                                        </a></h1>
                                    <div class="card-group">
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="<?php echo $content->getImage(); ?>" alt="Bild des Stellplatzes">
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
                                            <div id="minimap">
                                                <?php $content->getId() ?>
                                            </div>
                                            <script>
                                                function initMap() {
                                                    var location = {
                                                        lat: 53.147294,
                                                        lng: 8.180886
                                                    };


                                                    var map = new google.maps.Map(document.getElementById("minimap"), {
                                                        zoom: 10,
                                                        center: location,

                                                    });
                                                    var label = "uni";
                                                    addMarker(location, map, label);
                                                }

                                                function addMarker(location, map, label) {
                                                    var marker = new google.maps.Marker({
                                                        position: location,
                                                        label: label,
                                                        map: map
                                                    });
                                                }

                                            </script>
                                        </div>

                                    </div>
                                    <a href="entryPage.php?EntryID=<?php echo $content->getId() ?>" class="btn btn-primary">Mehr informationen</a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Googlemaps script -->
    <script src="mapscript.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7xuOTZWXpbH7CgL8f7ZS9_pGUygPPYro" async defer></script>
</body>

</html>
