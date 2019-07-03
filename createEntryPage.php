<!DOCTYPE html>
<!-- Vorlage für einen Beitrag -->

<html lang="de">
<head>
<?php include "php/head.php";?>
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php include "php/functions/userInput.php"; ?>
    <?php include "php/functions/datamanagment/contentmanagmentDao.php"; ?>
    <div id="background">
        <div id="mainFrame">
            <div class="createEntryPage">
                <section>
                    <form action="redirect.php" method="post" enctype="multipart/form-data">
                        <div class="container border">
                            <div class="row border">
                                <div class="col">
                                    <input type="text" class="form-control" id="entryName" name="entryName" placeholder="Beschreibender Name des Stellplatzes" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col border">
                                    <img src="pictures/dummyEntry/DummyBild.png" alt="Bild des Stellplatzes" class="img-fluid">
                                    <label for="userImage">
                                        Bild hinzufügen
                                    </label>
                                    <input type="file" id="userImage" name="userImage" accept="image/png, image/jpeg" required>
                                </div>
                                <div class="col border">
                                    <div id="map"></div>

                                    <script>
                                        var markerSet =0;
                                        var label = "Name des Stellplatzes";
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


                                        }

                                        // Adds a marker to the map.
                                        function addMarker(location, map) {
                                            // Add the marker at the clicked location, and add the next-available label
                                            // from the array of alphabetical characters.
                                            if (markerSet==0){
                                                markerSet=1;
                                            var marker = new google.maps.Marker({
                                                position: location,
                                                map: map,
                                                draggable: true
                                            });
                                                };
                                }

                                    </script>
                                    <script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap ">
                                    </script>
                                </div>
                                    <input type="number" class="form-control" id="longitude" name="longitude" step="any" placeholder="Längengrad" required>
                                    <input type="number" class="form-control" id="latitude" name="latitude" step="any" placeholder="Breitengrad" required>
                                </div>
                            </div>
                            <div class="row border">
                                <div class="container">
                                    <div class="row">
                                        <div class="col border">
                                            Öffentlich:
                                        </div>
                                        <div class="col border">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="isPublic" id="public" value="true" checked>
                                                <label class="form-check-label" for="public">Ja</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="isPublic" id="private" value="false">
                                                <label class="form-check-label" for="private">Nein</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            Stellplatzgröße:
                                        </div>
                                        <div class="col border">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="size" id="sizeSmall" value="Klein" checked>
                                                <label class="form-check-label" for="sizeSmall">Klein (1-30)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="size" id="sizeMedium" value="Mittel">
                                                <label class="form-check-label" for="sizeMedium">Mittel (31-99)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="size" id="sizeLarge" value="Groß">
                                                <label class="form-check-label" for="sizeLarge">Groß (100+)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            Überdacht:
                                        </div>
                                        <div class="col border">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hasRoof" id="covered" value="true">
                                                <label class="form-check-label" for="covered">Ja</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hasRoof" id="notCovered" value="false" checked>
                                                <label class="form-check-label" for="notCovered">Nein</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            Art:
                                        </div>
                                        <div class="col border">
                                            Art der Fahrradhalterung siehe
                                            <a href="https://de.wikipedia.org/wiki/Fahrradabstellanlage#Bauformen_von_Fahrradhaltern" target="_side" title="Bauformen von Fahrradhaltern">
                                                Wikipedia
                                            </a>
                                            <div class="form-group">
                                                <select class="form-control" name="holdingType" id="holderType" required>
                                                    <option value="(Keine Angabe)">(Keine Angabe)</option>
                                                    <option value="Einfacher Vorderradhalter">Einfacher Vorderradhalter</option>
                                                    <option value="Fahrradgerechte Vorderradhalter">Fahrradgerechte Vorderradhalter</option>
                                                    <option value="Anlehnbügel">Anlehnbügel</option>
                                                    <option value="Schräghochparker">Schräghochparker</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col border">
                                            Besonderheiten:
                                        </div>
                                        <div class="col border">
                                            <textarea class="form-control" id="description" name="description" placeholder="Zum Beispiel Zugänglichkeit oder anderes"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="createBtn">
                            <input type="submit" name="submitEntry" value="Erstellen" class="btn btn-default">
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
