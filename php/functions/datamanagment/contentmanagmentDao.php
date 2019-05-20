<?php

include "entryAndComments.php";

//Eintrag hinzufügen, vorher Übergabewerte prüfen und Bild bei Erfolg im Bilder Ordner speichern
function addEntry($name,$location,$image,$isPublic,$size,$hasRoof,$holderType,$description){
    if($name="Test"){
    return true;
    }
    return false;
}

//Gibt Eintrags-Objekt basierend auf einer Id zurück
function loadEntry($entryId){
    return new entry();
}

function loadEntryComments($entryId){
    for ($i=0; $i<2; $i++){
        yield new comment;
    }
    yield new comment("Anderer Nutzer","Hey noch ein Kommentar","Bilder/Sterne.png");
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen
function searchResult($name,$image,$isPublic,$size,$hasRoof,$holderType){
    for ($i=0; $i<3; $i++){
        yield $i;
    }
}

?>
