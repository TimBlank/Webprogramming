<!DOCTYPE html>
<!-- Seite auf der Stellplätze angzeigt werden, kann auf einen Bereich eingestellt werden(Haarentor, Wechloy, etc.) -->

<html lang="de">

<head>
    <title>MainMap</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <!--Php include -->
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
                    <?php
                                $campusSite = "default";
                                if(isset($_GET["campusSite"])){
                                    $campusSite = htmlspecialchars($_GET["campusSite"]);
                                }
                                if($campusSite==="Haarentor"){
                                    echo "<p hidden class='option zoom'>17</p>";
                                    echo "<p hidden class='option longitude'>8,181954603928261</p>";
                                    echo "<p hidden class='option latitude'>53.147294</p>";
                                }elseif($campusSite==="Johann-Justus-Weg"){
                                    echo "<p hidden class='option zoom'>16</p>";
                                    echo "<p hidden class='option longitude'>8.180886</p>";
                                    echo "<p hidden class='option latitude'>53,146797826519055</p>";
                                }elseif($campusSite==="Botanischer Garten"){
                                    echo "<p hidden class='option zoom'>16</p>";
                                    echo "<p hidden class='option longitude'>8.180886</p>";
                                    echo "<p hidden class='option latitude'>53.147294</p>";
                                }elseif($campusSite==="Wechloy"){
                                    echo "<p hidden class='option zoom'>16</p>";
                                    echo "<p hidden class='option longitude'>8.180886</p>";
                                    echo "<p hidden class='option latitude'>53.147294</p>";
                                }elseif($campusSite==="Offis"){
                                    echo "<p hidden class='option zoom'>16</p>";
                                    echo "<p hidden class='option longitude'>8.180886</p>";
                                    echo "<p hidden class='option latitude'>53.147294</p>";
                                }else{
                                    echo "<p hidden class='option zoom'>13</p>";
                                    echo "<p hidden class='option longitude'>8.180886</p>";
                                    echo "<p hidden class='option latitude'>53.147294</p>";
                                }
                        ?>
                    <ul hidden>
                        <?php foreach($contentmanager->defaultEntries() as $id):?>
                        <?php $entry = $contentmanager->loadEntry($id);?>
                        <li id="<?php echo $entry->getId();?>" class="entry">
                            <p class="entryName"><?php echo $entry->getName();?></p>
                            <p class="longitude"><?php echo $entry->getLongitude();?></p>
                            <p class="latitude"><?php echo $entry->getLatitude();?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="col">
                        <div class="card">
                            <h1><a :class="card-title" title="Standort:">
                                    Standort:
                                </a></h1>

                            <div id="map">
                            </div>
                            <!--Start Quelle: https://stackoverflow.com/questions/1577598/how-to-hide-parts-of-html-when-javascript-is-disabled-->
                            <noscript>
                                <style>
                                    #map {
                                        display: none;
                                    }

                                </style>
                                <div>
                                    <label>Zum Nutzen der Karte bitte JavaScript Aktivieren</label>
                                </div>
                            </noscript>
                            <!--Ende-->

                        </div>
                        <script>
                            function initMap() {
                                var location = {
                                    lat: parseFloat($(".option.latitude").text().replace(",", ".")),
                                    lng: parseFloat($(".option.longitude").text().replace(",", "."))
                                };


                                var map = new google.maps.Map(document.getElementById("map"), {
                                    zoom: parseInt($(".option.zoom").text()),
                                    center: location,

                                });
                                var label = "uni";
                                // Add a markers for every entry.
                                $('.entry').each(function() {
                                    var entryId = this.id;
                                    var entryName = $(".entryName", this).text();
                                    var longitude = parseFloat($(".longitude", this).text().replace(",", "."));
                                    var latitude = parseFloat($(".latitude", this).text().replace(",", "."));
                                    var latlng = new google.maps.LatLng(latitude, longitude);
                                    addMarker(latlng, map, entryId, entryName);
                                });

                            }

                            // Adds a marker to the map.
                            function addMarker(location, map, entryId, entryName) {
                                var marker = new google.maps.Marker({
                                    position: location,
                                    label: entryName,
                                    //label: content.getName(),
                                    map: map
                                });


                                marker.addListener('click', function() {
                                    window.location = "entryPage.php?EntryID=" + entryId;
                                });
                            }

                        </script>
                        <script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap "></script>

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

    <div>

    </div>


    <?php include_once "php/htmlElements/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>
