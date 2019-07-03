<!DOCTYPE html>
<!-- Vorlage für einen Beitrag -->

<html lang="de">

<head>
    <?php include "php/head.php";?>
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php include "php/functions/datamanagment/databaseConnection.php"; ?>
    <?php include "php/functions/datamanagment/contentmanagmentImpl.php"; ?>
    <div id="background">
        <?php   $entryID = null;
        if (isset($_GET["EntryID"])){
            $entryID =htmlspecialchars($_GET["EntryID"]);
        }
        $content = loadEntry($entryID);
        if($content==false){
            $content = new entry(null);
        }
    ?>
        <?php include "php/functions/userInput.php"; ?>
        <div id="mainFrame">

            <section>
                <div class="row">
                    <div class="col col-auto" id="sideSearch">
                        <div>
                            <?php include "php/search.php"; ?>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="container border">
                                <div class="row border">
                                    <div class="col">
                                        <h1><?php echo $content->getName(); ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        <img src="<?php echo $content->getImage(); ?>" alt="Bild des Stellplatzes" class="img-fluid">
                                    </div>
                                    <div id="map"></div>

                                    <script>
                                        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        var labelIndex = 0;

                                        function initMap() {
                                            var location = {
                                                lat: 53.147294,
                                                lng: 8.180886
                                            };
                                            var map = new google.maps.Map(document.getElementById("map"), {
                                                zoom: 10,
                                                center: location
                                            });
                                            // This event listener calls addMarker() when the map is clicked.
                                            google.maps.event.addListener(map, 'click', function(event) {
                                                addMarker(event.latLng, map);
                                            });

                                            // Add a marker at the center of the map.
                                            addMarker(location, map);
                                        }

                                        // Adds a marker to the map.
                                        function addMarker(location, map) {
                                            // Add the marker at the clicked location, and add the next-available label
                                            // from the array of alphabetical characters.
                                            var marker = new google.maps.Marker({
                                                position: location,
                                                label: labels[labelIndex++ % labels.length],
                                                map: map
                                            });




                                            map.addListener('center_changed', function() {
                                                // 3 seconds after the center of the map has changed, pan back to the
                                                // marker.
                                                window.setTimeout(function() {
                                                    map.panTo(marker.getPosition());
                                                }, 3000);
                                            });

                                            marker.addListener('click', function() {
                                                window.location = "../Index.php";
                                            });



                                        }

                                    </script>
                                    <script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap ">
                                    </script>
                                </div>
                                <div class="row border">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col border">
                                                Öffentlich/Privat:
                                            </div>
                                            <div class="col border">
                                                <?php echo $content->stringIsPublic() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col border">
                                                Stellplatzgröße:
                                            </div>
                                            <div class="col border">
                                                <?php echo $content->getSize() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col border">
                                                Überdacht:
                                            </div>
                                            <div class="col border">
                                                <?php echo $content->stringHasRoof() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col border">
                                                Art:
                                            </div>
                                            <div class="col border">
                                                <?php echo $content->getHolderType() ?>
                                                <!-- https://de.wikipedia.org/wiki/Fahrradabstellanlage#Bauformen_von_Fahrradhaltern -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col border">
                                                Besonderheiten:
                                            </div>
                                            <div class="col border">
                                                <?php echo $content->getDescription() ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                        if(isset($_SESSION["User"])){
                        echo "<a href=\"createEntryPage.php\" class=\"btn btn-primary\" title=\"VorlageBeitrag\">löschen</a>";
                        }
                        ?>
                                    <?php
                        if(isset($_SESSION["User"])){
                        echo "<a href=\"createEntryPage.php\" class=\"btn btn-primary\" title=\"VorlageBeitrag\">überarbeiten</a>";
                        }
                        ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <div id="marginTop">
                <?php if($content->getId() !== null): ?>
                <div class="card">
                    <section>
                        <div class="card">
                            <h1>Kommentare</h1>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php foreach(loadEntryComments($entryID) as $comment): ?>
                            <li class="list-group-item">
                                <div class="card">
                                    <?php if($comment->getImage()!=""): ?>
                                    <img src="<?php echo $comment->getImage(); ?>" class="card-img-top" alt="Bild des Stellplatzes">
                                    <?php endif ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $comment->getAuthor(); ?></h5>
                                        <p class="card-text"><?php echo $comment->getText(); ?></p>
                                    </div>
                                </div>
                            </li>

                            <?php endforeach;?>

                            <li class="list-group-item" id="addCommentSection">


                                <form action="redirect.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="EntryID" value="<?php echo $entryID;?>">
                                    <div class="form-group">
                                        <label for="userImage">
                                            Bild hinzufügen
                                        </label>
                                        <input type="file" id="userImage" name="commentImg" accept="image/png, image/jpeg">
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="commentText">
                                                Schreibe etwas:
                                            </label>
                                            <!--<input type="text" class="form-control" id="commentText" name="ct" value="" placeholder="Kommentar" autocomplete="off" />-->
                                            <textarea class="form-control" id="commentText" name="commentText" placeholder="Kommentar" cols="30" rows="2" required></textarea>
                                        </div>
                                        <input type="submit" name="SubmitComment" value="Kommentieren" class="btn btn-default" />
                                    </div>
                                </form>

                            </li>

                        </ul>
                    </section>
                </div>
                <?php endif; ?>

            </div>
        </div>
        <?php include "php/footer.php"; ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
