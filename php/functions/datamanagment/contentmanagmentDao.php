<?php

include "entryAndComments.php";

//Eintrag hinzufügen
function addEntry($name,$isPublic, $smallSize, $mediumSize, $largeSize, $hasRoof, $holdingType, $description, $longitude, $latitude, $imageType){
    if($name == "Test" && $isPublic == "true" && $smallSize == "Klein" && $hasRoof == "true" && $description == "Hallo"){
        return 3;
    }
    return false;
}

function addComment($entryId, $username, $text, $imageType){
    if($entryId == 0){
        return 3;
    }
    return false;
}

function deleteComment($commentID){
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

    //Eintrag existiert nicht
    return false;

}

function loadEntryComments($entryId){

    if($entryId == 3){
        yield new comment(0,"Silly_4_8_7","Ich kann ja Kommentare schreiben, mal schauen wie das aussieht.... und er wird länger und  länger läääääääännnnnnnngeeeeeeeeeeerrrrrrrrr. Hi","pictures/FP1.jpg");
    }
    yield new comment(4);

    yield new comment(1,"Anderer Nutzer","Hey noch ein Kommentar","pictures/Sterne.png");

    yield new comment(2,"Rainbow_Dragon31","Hey ein Kommentar ohne Bild","");
}

function loadComment($commentId){
    return new comment(1);
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen
function searchResult($name=null,$isPublic=null,$size=null,$hasRoof=null,$holdingType=null){
    /* $size ist eine Zahl die folgenderweise berechnet wird
    -> $size = klein + mittel + groß
       wobei klein=1, mittel=2, groß=4 oder 0 wenn es nicht ausgewählt wurde
    */
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
}

//Default Anzeige der Hauptseite
function defaultEntries(){
    for ($i=0; $i<1; $i++){
                yield $i;
            }
}

?>
