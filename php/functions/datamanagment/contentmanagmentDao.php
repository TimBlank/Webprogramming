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
        return new entry(1,"A2 Brücke Ulhormsweg","Beitraege/A2_Bruecke_Ulhormsweg/A2BU.png",true,"Groß",true,"Einfacher Vorderradhalter","Unter der Brücke von A2 zur Bibliothek");
    }elseif($entryId==2){
        return new entry(2,"Bib Brücke Ulhormsweg","Beitraege/Bib_Bruecke_Ulhormsweg/BBU.png",true,"Groß",true,"Einfacher Vorderradhalter","Unter der Brücke von der Bibliothek zu A2");
    }elseif($entryId==3){
        return new entry(3,"W6 West","Beitraege/W6West/W6W.png",true,"Klein",true,"Einfacher Vorderradhalter","Keine");
    }else{
        return new entry(0);
    }

}

function loadEntryComments($entryId){
    for ($i=0; $i<2; $i++){
        yield new comment;
    }
    yield new comment("Anderer Nutzer","Hey noch ein Kommentar","Bilder/Sterne.png");
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen oder ausgewählte Orte wenn isSearch=false
function searchResult($isSearch,$name=null,$isPublic=null,$size=null,$hasRoof=null,$holderType=null){
    if($isSearch){
        if($name=="A2"){
            yield 1;
        }elseif($name=="Bib"){
            yield 2;
        }elseif($name=="W6"){
            yield 3;
        } else{
            for ($i=0; $i<4; $i++){
                yield $i;
            }
        }
    }else{
        //Default Anzeige der Hauptseite
            for ($i=0; $i<1; $i++){
                yield $i;
            }
    }
}


?>
