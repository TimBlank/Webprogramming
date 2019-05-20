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
    if($entryId==1){
        return new entry("A2 Brücke Ulhormsweg","Beitraege/A2_Bruecke_Ulhormsweg/A2BU.png",true,"Groß",true,"Einfacher Vorderradhalter","Unter der Brücke von A2 zur Bibliothek");
    }elseif($entryId==2){
        return new entry("Bib Brücke Ulhormsweg","Beitraege/Bib_Bruecke_Ulhormsweg/BBU.png",true,"Groß",true,"Einfacher Vorderradhalter","Unter der Brücke von der Bibliothek zu A2");
    }elseif($entryId==3){
        return new entry("W6 West","Beitraege/W6West/W6W.png",true,"Klein",true,"Einfacher Vorderradhalter","Keine");
    }else{
        return new entry();
    }

}

function loadEntryComments($entryId){
    for ($i=0; $i<2; $i++){
        yield new comment;
    }
    yield new comment("Anderer Nutzer","Hey noch ein Kommentar","Bilder/Sterne.png");
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen
function searchResult($name,$isPublic,$size,$hasRoof,$holderType){
    if($name=="Test"){
        for ($i=0; $i<3; $i++){
            yield $i;
        }
    }
    else{
        for ($i=0; $i<3; $i++){
            yield 0;
        }
    }
}

?>
