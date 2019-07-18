<?php

//Holt Werte über get und gibt die Ergebnisse der Funktion searchResult weiter
function loadEntries($contentmanager) {
    if(isset($_GET["SubmitSearch"])) {
        $entryName = "";
        $isPublic = null;
        $smallSize = "false";
        $mediumSize = "false";
        $largeSize = "false";
        $hasRoof = null;
        $holdingType = null;

        if(isset($_GET["entryName"])) {
            $entryName = htmlspecialchars( $_GET["entryName"]);
        }

        if(isset($_GET["isPublic"])) {
            $isPublic = true;
        } else {
            $isPublic = false;
        }

        if(isset($_GET["smallSpace"])) {//klein
            $smallSize = "Klein";
        }

        if(isset($_GET["mediumSpace"])) {//mittel
            $mediumSize = "Mittel";
        }

        if(isset($_GET["largeSpace"])) {//groß
            $largeSize = "Groß";
        }

        if(isset($_GET["hasRoof"])) {
            $hasRoof = true;
        } else {
            $hasRoof = false;
        }

        if(isset($_GET["holdingType"])) {
            $holdingType = htmlspecialchars($_GET["holdingType"]);
        }

        foreach($contentmanager->searchResult($entryName, $isPublic, $smallSize, $mediumSize, $largeSize, $hasRoof, $holdingType) as $id) {
            yield $id;
        }
    } else {
        foreach($contentmanager->defaultEntries() as $id) {
            yield $id;
        }
    }
}

?>
