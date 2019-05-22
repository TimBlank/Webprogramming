<?php

include "entryAndComments.php";

//Eintrag hinzufügen, vorher Übergabewerte prüfen und Bild bei Erfolg im Bilder Ordner speichern
function addEntry($name,$location,$image,$isPublic,$size,$hasRoof,$holderType,$description){
    if($name="Test"){
    return true;
    }
    return false;
}

function addComment($entryId, $username, $text, $image){
    return true;
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

    if($entryId == 3){
        yield new comment("Silly_4_8_7","Ich kann ja Kommentare schreiben, mal schauen wie das aussieht.... und er wird länger und  länger läääääääännnnnnnngeeeeeeeeeeerrrrrrrrr. Hi","Bilder/FP1.jpg");
    }
    yield new comment;

    yield new comment("Anderer Nutzer","Hey noch ein Kommentar","Bilder/Sterne.png");

    yield new comment("Rainbow_Dragon31","Hey ein Kommentar ohne Bild","");
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen oder ausgewählte Orte wenn isSearch=false
function searchResult($isSearch,$name=null,$isPublic=null,$size=null,$hasRoof=null,$holderType=null){
    /* $size ist eine Zahl die folgenderweise berechnet wird
    -> $size = klein + mittel + groß
       wobei klein=1, mittel=2, groß=4 oder 0 wenn es nicht ausgewählt wurde
    */
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
