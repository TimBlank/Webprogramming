<?php

include "entryAndComments.php";
include "databaseConnection.php";

//Eintrag hinzufügen
function addEntry($name,$location,$isPublic,$size,$hasRoof,$holderType,$description){
    try {
        $db = databaseConnect();
        //hier Datenbank Manipulationen
        $db.close();
        $db = null;
    }catch (PDOException $e) {

   }
}

function addComment($entryId, $username, $text){
    try {
        $db = databaseConnect();
        //hier Datenbank Manipulationen
        $db.close();
        $db = null;
    }catch (PDOException $e) {

   }
}

//Gibt Eintrags-Objekt basierend auf einer Id zurück
function loadEntry($entryId){
    try {
        $db = databaseConnect();
        $sql = "SELECT * FROM entry WHERE entryId = (:loadId)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":loadId", $entryId);
        $stmt->execute();
        $entryData = $stmt->fetchObject();
        //$db.close(); Funktion unbekannt ?
        $db = null;
        if(!empty($entryData)){
            $id = $entryData->entryId;
            $name = $entryData->name;
            $image = $entryData->image;
            $isPublic = $entryData->isPublic;
            $size = $entryData->size;
            $hasRoof = $entryData->hasRoof;
            $holderType = $entryData->holdingType;
            $description = $entryData->description;
            $longitude = $entryData->longitude;
            $latitude = $entryData->latitude;

            return new entry($id, $name, $image, $isPublic, $size, $hasRoof, $holderType,$description, $longitude, $latitude);
        }else{
            //Eintrag existiert nicht
            return false;
        }

    }catch (PDOException $ex) {
        echo "Fehler: " . $ex->getMessage();
    }

    //Aus $entryData entryObjekte erzeugen oder Fehler zurückgeben
}

function loadEntryComments($entryId){

   try {
        $db = databaseConnect();
        $sql = "SELECT * FROM comment WHERE entryId = (:loadId)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":loadId", $entryId);
        $stmt->execute();
        //$db.close(); Funktion unbekannt ?
        $db = null;
       while ($commentData = $stmt->fetchObject()) {
           yield new comment($commentData->username, $commentData->text, $commentData->image);
       }
   }catch (PDOException $ex) {
       echo "Fehler: " . $ex->getMessage();
   }

    //Aus $entryData Kommentar Objekte erzeugen oder Fehler zurückgeben

    //Kommentar existiert nicht
    //return false;
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen oder ausgewählte Orte wenn isSearch=false
function searchResult($isSearch,$name=null,$isPublic=null,$size=null,$hasRoof=null,$holderType=null){
    /* $size ist eine Zahl die folgenderweise berechnet wird
    -> $size = klein + mittel + groß
       wobei klein=1, mittel=2, groß=4 oder 0 wenn es nicht ausgewählt wurde
    */

        try {
        $db = databaseConnect();
        //hier Datenbank Manipulationen
        $db.close();
        $db = null;
    }catch (PDOException $e) {

   }
}

//Default Anzeige der Hauptseite
function defaultEntries(){

        try {
        $db = databaseConnect();
        //hier Datenbank Manipulationen
        $db.close();
        $db = null;
    }catch (PDOException $e) {

   }
}
?>
