<?php

include "entryAndComments.php";
include "databaseConnection.php";

//Eintrag hinzufügen
function addEntry($name,$location,$isPublic,$size,$hasRoof,$holderType,$description){

    $db = databaseConnect();
    //hier Datenbank Manipulationen
    $db.close();
    $db = null;
}

function addComment($entryId, $username, $text){

    $db = databaseConnect();
    //hier Datenbank Manipulationen
    $db.close();
    $db = null;
}

//Gibt Eintrags-Objekt basierend auf einer Id zurück
function loadEntry($entryId){

    $db = databaseConnect();
    //hier Datenbank Manipulationen
    $db.close();
    $db = null;

    //Eintrag existiert nicht
    return false;
}

function loadEntryComments($entryId){

    $db = databaseConnect();
    //hier Datenbank Manipulationen
    $db.close();
    $db = null;

    //Kommentar existiert nicht
    return false;
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen oder ausgewählte Orte wenn isSearch=false
function searchResult($isSearch,$name=null,$isPublic=null,$size=null,$hasRoof=null,$holderType=null){
    /* $size ist eine Zahl die folgenderweise berechnet wird
    -> $size = klein + mittel + groß
       wobei klein=1, mittel=2, groß=4 oder 0 wenn es nicht ausgewählt wurde
    */

    $db = databaseConnect();
    //hier Datenbank Manipulationen
    $db.close();
    $db = null;
}

//Default Anzeige der Hauptseite
function defaultEntries(){

    $db = databaseConnect();
    //hier Datenbank Manipulationen
    $db.close();
    $db = null;
}
?>
