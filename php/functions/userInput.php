<?php
//Diese Datei könnte einen besseren Namen haben


//Holt Werte über get und gibt die Ergebnisse der Funktion searchResult weiter
function loadEntries(){
    if(isset($_GET["SubmitSearch"])){
        $entryName = null;
        $isPublic = null;
        $size = 0;
        $hasRoof = null;
        $holdingType = null;
        if(isset($_GET["entryName"])){
            $entryName = htmlspecialchars( $_GET["entryName"]);
        }
        if(isset($_GET["isPublic"])&&($_GET["isPublic"]=="false"||$_GET["isPublic"]=="true")) {
            $isPublic = ($_GET["isPublic"]=="true");
        }
        if(isset($_GET["smallSpace"])){//klein
            $size = $size + 1;
        }
        if(isset($_GET["mediumSpace"])){//mittel
            $size = $size + 2;
        }
        if(isset($_GET["largeSpace"])){//groß
            $size = $size + 4;
        }

        if(isset($_GET["hasRoof"])&&($_GET["hasRoof"]=="false"||$_GET["hasRoof"]=="true")) {
            $hasRoof = ($_GET["hasRoof"]=="true");
        }
        if(isset($_GET["holdingType"])){
            $holdingType = htmlspecialchars($_GET["holdingType"]);
        }
        foreach(searchResult($entryName,$isPublic,$size,$hasRoof,$holdingType) as $id) {
            yield $id;
        }
    }else{
        foreach(defaultEntries() as $id) {
            yield $id;
        }
    }
}


?>
