<?php
include "datamanagment/contentmanagmentDao.php";

function entry() {
    if(isset($_POST["submitEntry"])){
        $entryName = null;
        $location = null;
        $userImage = null;
        $optionsPublic = null;
        $optionsSize = null;
        $optionsCovered = null;
        $holdingType = null;
        $features = null;

        if(isset($_POST["entryName"])) {
            $entryName = htmlspecialchars($_POST["entryName"]);
        }

        if(isset($_FILES["userImage"])) {
            //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
            $image = $_FILES["userImage"];
            //Dateiendung
            $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["userImage"]["tmp_name"]);
            if($check !==false){
                $userImage = $image;
            } else {
               echo "Das war kein Bild <br>" ;
            }
        }

        if(isset($_POST["optionsPublic"])) {
            $optionsPublic = $_POST["optionsPublic"];
        }

        if(isset($_POST["optionsSize"])) {
            $optionsSize = $_POST["optionsSize"];
        }
        if(isset($_POST["optionsCovered"])) {
            $optionsCovered = $_POST["optionsCovered"];
        }
        if(isset($_POST["holdingType"])) {
            $holdingType = $_POST["holdingType"];
        }
        if(isset($_POST["features"])) {
            $features = htmlspecialchars($_POST["features"]);
        }

        //TODO: Überprüfen, ob alles richtig ausgefüllt ist.
        $id = addEntry($entryName, $location, $userImage, $optionsPublic, $optionsSize, $optionsCovered, $holdingType, $features);
        if($id !== false) {
            echo "Test erfolgreich";

            mkdir("Bilder/".$id."/");
            mkdir("Bilder/".$id."/comments/");
            move_uploaded_file($_FILES["userImage"]["tmp_name"],"Bilder/".$id."/".$image['name']);
            //TODO: Auf neue Eintragsseite gehen.
        } else {
            echo "Test fehlgeschlagen";
            //TODO: Fehler anzeigen.
        }
    }
}

?>
