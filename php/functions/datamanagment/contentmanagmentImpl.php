<?php

include "entryAndComments.php";

//Eintrag hinzufügen
function addEntry($name, $isPublic, $size, $hasRoof, $holdingType, $description, $longitude, $latitude, $imageType){
  try {
        $db = databaseConnect();
        $db->beginTransaction();

        $sql = "INSERT INTO entry (name, isPublic, size, hasRoof, holdingType, description, longitude, latitude, image) VALUES (:name, :isPublic, :size, :hasRoof, :holdingType, :description, :longitude, :latitude, :imageType)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":isPublic", $isPublic);
        $stmt->bindParam(":size", $size);
        $stmt->bindParam(":hasRoof", $hasRoof);
        $stmt->bindParam(":holdingType", $holdingType);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":longitude", $longitude);
        $stmt->bindParam(":latitude", $latitude);
        $stmt->bindParam(":imageType", $imageType);
        $stmt->execute();

        $id = $db->lastInsertId();

        //Dateipfad des Bildes angeben
        $imagePath = "pictures/Entry".$id."/EntryPic".$id.".".$imageType;
        $sql ="UPDATE entry SET image = (:image) WHERE entryId = (:id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":image", $imagePath);
        $stmt->execute();

        $db->commit();
        //$db.close(); TODO: Funktion unbekannt ?
        $db = null;
        return $id;
    }catch (Exception $ex) {
        echo "Fehler: " . $ex->getMessage(). "<br />";
        $db->rollBack();
   }
}

function addComment($entryId, $username, $text, $imageType){
    try {
        $db = databaseConnect();
        $db->beginTransaction();

        $sql = "INSERT INTO comment (username, text, image, entryId) VALUES (:username, :text, :imageType, :entryId)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":text", $text);
        $stmt->bindParam(":imageType", $imageType);
        $stmt->bindParam(":entryId", $entryId);
        $stmt->execute();

        $id = $db->lastInsertId();

        if($imageType != null){
             //Dateipfad angeben
            $imagePath = "pictures/Entry".$entryId."/comments/Entry".$entryId."CommPic".$id.".".$imageType;
            $sql ="UPDATE comment SET image = (:image) WHERE commentId = (:id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":image", $imagePath);
            $stmt->execute();
        }


        $db->commit();
        //$db.close(); TODO: Funktion unbekannt ?
        $db = null;
        return $id;
    }catch (Exception $ex) {
        echo "Fehler: " . $ex->getMessage(). "<br />";
        $db->rollBack();
   }
}

//Gibt Eintrags-Objekt basierend auf einer Id zurück
function loadEntry($entryId){
    try {
        $db = databaseConnect();
        $sql = "SELECT * FROM entry WHERE entryId = (:id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $entryId);
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
            $holdingType = $entryData->holdingType;
            $description = $entryData->description;
            $longitude = $entryData->longitude;
            $latitude = $entryData->latitude;

            return new entry($id, $name, $image, $isPublic, $size, $hasRoof, $holdingType,$description, $longitude, $latitude);
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
        $sql = "SELECT * FROM comment WHERE entryId = (:id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $entryId);
        $stmt->execute();
        //$db.close(); TODO: Funktion unbekannt ?
        $db = null;
       while ($commentData = $stmt->fetchObject()) {
           yield new comment($commentData->username, $commentData->text, $commentData->image);
       }
   }catch (PDOException $ex) {
       echo "Fehler: " . $ex->getMessage();
   }

}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen
function searchResult($name="",$isPublic=null,$size=null,$hasRoof=null,$holdingType=null){
    //TODO: Vollständig implementieren
        $name = "%".$name."%";
    try {
        $db = databaseConnect();
        $sql = "SELECT entryId FROM entry WHERE name LIKE (:name)";
        if($isPublic!==null && is_bool($isPublic)){
            $sql = $sql." AND isPublic = (:isPublic)";
        }

        if(is_bool($size!==null && is_numeric($size) && $size>0)){
            //Noch keine Ahnung was hier hinkommt
        }

        if($hasRoof!==null && is_bool($hasRoof)){
            $sql = $sql." AND hasRoof = (:hasRoof)";
        }

        if($holdingType!==null && is_string($holdingType) && $holdingType !="(Keine Angabe)"){
            $sql = $sql." AND holdingType = (:holdingType)";
        }

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":name", $name);

        if($isPublic!==null && is_bool($isPublic)){
                $stmt->bindParam(":isPublic", $isPublic);
        }

        if(is_bool($size!==null && is_numeric($size) && $size>0)){
            //Noch keine Ahnung was hier hinkommt
        }

        if($hasRoof!==null && is_bool($hasRoof)){
            $stmt->bindParam(":hasRoof", $hasRoof);
        }

        if($holdingType!==null && is_string($holdingType) && $holdingType !="(Keine Angabe)"){
            $stmt->bindParam(":holdingType", $holdingType);
        }

        $stmt->execute();
        //$db.close(); TODO: Funktion unbekannt ?
        $db = null;
       while ($entryData = $stmt->fetchObject()) {
           yield $entryData->entryId;
       }
   }catch (PDOException $ex) {
       echo "Fehler: " . $ex->getMessage();
   }
    /* $size ist eine Zahl die folgenderweise berechnet wird
    -> $size = klein + mittel + groß
       wobei klein=1, mittel=2, groß=4 oder 0 wenn es nicht ausgewählt wurde
    */
}

//Default Anzeige der Hauptseite
function defaultEntries(){
    //Gibt alle exestierenden Einträge zurück
    try {
        $db = databaseConnect();
        $sql = "SELECT entryId FROM entry ORDER BY entryId DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        //$db.close(); TODO: Funktion unbekannt ?
        $db = null;
       while ($entryData = $stmt->fetchObject()) {
           yield $entryData->entryId;
       }
   }catch (PDOException $ex) {
       echo "Fehler: " . $ex->getMessage();
   }
}
?>
