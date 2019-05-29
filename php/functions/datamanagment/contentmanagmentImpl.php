<?php

include "entryAndComments.php";

//Eintrag hinzufügen
function addEntry($name,$location,$isPublic,$size,$hasRoof,$holderType,$description){}

function addComment($entryId, $username, $text){}

//Gibt Eintrags-Objekt basierend auf einer Id zurück
function loadEntry($entryId){
    //Eintrag existiert nicht
    return false;
}

function loadEntryComments($entryId){
    //Kommentar existiert nicht
    return false;
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

//Default Anzeige der Hauptseite
function defaultEntries(){
}
?>
