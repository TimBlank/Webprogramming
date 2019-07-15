<!DOCTYPE html>
<!-- Vorlage für einen Beitrag -->

<html lang="de">

<head>
    <?php include_once "php/htmlElements/head.php";?>
    <link rel="stylesheet" href="css/noSearchWeather.css">
    <?php include_once "javascript/imagePreview.php";?>
</head>

<body>
    <?php include_once "php/htmlElements/header.php"; ?>
    <?php include_once "php/htmlElements/navigation.php"; ?>
    <?php include_once "php/functions/loadEntries.php"; ?>
    <?php
        $entryID = null;
        if (isset($_GET["EntryID"])){
            $entryID =htmlspecialchars($_GET["EntryID"]);
        }
        $content = $contentmanager->loadEntry($entryID);
        if($content==false){
            $content = new entry(null,null,$setImage="pictures/dummyEntry/DummyBild.png",null,null,null,null,null,null,null);
        }
    ?>

    <script>
        window.onload = function() {
            initMap();
        }

    </script>
    <div id="background">
        <div id="mainFrame">
            <div class="createEntryPage">
                <section>
                    <form action="redirect.php" method="post" enctype="multipart/form-data">
                        <div class="container border">
                            <div class="row border">
                                <div class="col">
                                    <input type="text" class="form-control" id="entryName" name="entryName" placeholder="Beschreibender Name des Stellplatzes" value="<?php echo $content->getName(); ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col border">
                                    <img src="<?php echo $content->getImage(); ?>" id="imagePreview" alt="Bild des Stellplatzes" class="img-fluid"><br>
                                    <label for="userImage">
                                        Bild hinzufügen
                                    </label><br>
                                    <input type="file" id="userImage" onchange="readURL(this);" name="userImage" accept="image/png, image/jpeg" <?php if($content->getId()==null){echo "required";}?>>
                                    <label for="userImage" id="imageError" style="color:red;"> </label><br>
                                </div>
                                <div class="col border">
                                    <div id="map"></div>
                                    <input type="number" class="form-control" id="longitude" name="longitude" step="any" placeholder="Längengrad" value="<?php echo $content->getLongitude(); ?>" required>
                                    <input type="number" class="form-control" id="latitude" name="latitude" step="any" placeholder="Breitengrad" value="<?php echo $content->getLatitude(); ?>" required>
                                    <button type="button" onclick="getPosition()" class="btn btn-default posBtn" id="posBtn">Meine Position</button>
                                    <?php if($content->getId()!==null){
                                        echo "<button type='button' onclick='setMarkerAndPan(".$content->getLongitude().", ".$content->getLatitude().")' class='btn btn-default posBtn' id='oldPosBtn'>Alte Position</button>";
                                    } ?>
                                    <!--Start Quelle https://stackoverflow.com/questions/1577598/how-to-hide-parts-of-html-when-javascript-is-disabled-->
                                    <noscript>
                                        <style>
                                            .posBtn {
                                                display: none;
                                            }
                                        </style>
                                    </noscript>
                                    <!--Ende-->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container border">
                                <div class="row">
                                    <div class="col border">
                                        Öffentlich:
                                    </div>
                                    <div class="col border">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isPublic" id="public" value="true" <?php
                                                       if($content->getIsPublic()){
                                                            echo "checked";}?> required>
                                            <label class="form-check-label" for="public">Ja</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isPublic" id="private" value="false" <?php
                                                       if(!$content->getIsPublic() && $content->getId()!==null){
                                                            echo "checked";}?>>
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
                                            <input class="form-check-input" type="radio" name="size" id="sizeSmall" value="Klein" <?php
                                                       if($content->getSize()=="Klein" ){
                                                            echo "checked";}?> required>
                                            <label class="form-check-label" for="sizeSmall">Klein (1-30)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="size" id="sizeMedium" value="Mittel" <?php
                                                       if($content->getSize()=="Mittel"){
                                                            echo "checked";}?>>
                                            <label class="form-check-label" for="sizeMedium">Mittel (31-99)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="size" id="sizeLarge" value="Groß" <?php
                                                       if($content->getSize()=="Groß"){
                                                            echo "checked";}?>>
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
                                            <input class="form-check-input" type="radio" name="hasRoof" id="covered" value="true" <?php
                                                       if($content->getHasRoof()){
                                                            echo "checked";}?> required>
                                            <label class="form-check-label" for="covered">Ja</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hasRoof" id="notCovered" value="false" <?php
                                                       if(!$content->getHasRoof() && $content->getId()!==null){
                                                            echo "checked";
                                                       }
                                                       ?>>
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
                                                <option value="(Keine Angabe)" <?php if($content->getHolderType()=="(Keine Angabe)" || $content->getId()==null){echo "selected";}?>>(Keine Angabe)</option>
                                                <option value="Einfache Vorderradhalter" <?php if($content->getHolderType()=="Einfache Vorderradhalter"){echo "selected";}?>>Einfacher Vorderradhalter</option>
                                                <option value="Fahrradgerechte Vorderradhalter" <?php if($content->getHolderType()=="Fahrradgerechte Vorderradhalter"){echo "selected";}?>>Fahrradgerechte Vorderradhalter</option>
                                                <option value="Anlehnbügel" <?php if($content->getHolderType()=="Anlehnbügel"){echo "selected";}?>>Anlehnbügel</option>
                                                <option value="Schräghochparker" <?php if($content->getHolderType()=="Schräghochparker"){echo "selected";}?>>Schräghochparker</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Besonderheiten:
                                    </div>
                                    <div class="col border">
                                        <textarea class="form-control" id="description" name="description" placeholder="Zum Beispiel Zugänglichkeit oder anderes"><?php echo $content->getDescription(); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="EntryID" value="<?php echo $entryID;?>">
                        <div class="createBtn">
                            <input type="submit" name="<?php if($content->getId()==null){echo "submitEntry";}else{echo "alterEntry";}?>" value="<?php if($content->getId()==null){echo "Erstellen";}else{echo "Bearbeiten";}?>" class="btn btn-default">
                        </div>

                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php include_once "php/htmlElements/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <?php include_once "javascript/createEntryMapFunctions.php";?>
</body>

</html>
