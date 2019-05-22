<?php
//Diese Datei könnte einen besseren Namen haben


//Holt Werte über get und gibt die Ergebnisse der Funktion searchResult weiter
function search(){
    $isSearch =false;
    $name = null;
    $isPublic=null;
    $size=0;
    $hasRoof=null;
    $holderType=null;
    if(isset($_GET["SubmitSearch"])){
        $isSearch =true;
        if(isset($_GET["locationName"])){
            $name = $_GET["locationName"];
        }
        if(isset($_GET["Öffentlich"])){
            $isPublic = true;
        }
        if(isset($_GET["kleinerStellplatz"])){//klein
            $size = $size + 1;
        }
        if(isset($_GET["mittlererStellplatz"])){//mittel
            $size = $size + 2;
        }
        if(isset($_GET["großerStellplatz"])){//groß
            $size = $size + 4;
        }

        if(isset($_GET["Überdacht"])){
            $name = $_GET["locationName"];
        }
        if(isset($_GET["Halterungsart"])){
            $name = $_GET["locationName"];
        }
    }

    foreach(searchResult($isSearch,$name,$isPublic,$size,$hasRoof,$holderType) as $id) {
        yield $id;
    }
}


?>
