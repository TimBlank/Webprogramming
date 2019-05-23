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
            $name = htmlspecialchars( $_GET["locationName"]);
        }
        if(isset($_GET["isPublic"])){
            $isPublic = true;
        }
        if(isset($_GET["smallSpace"])){//klein
            $size = $size + 1;
        }
        if(isset($_GET["mediumSpace"])){//mittel
            $size = $size + 2;
        }
        if(isset($_GET["largeSpace"])){//groß
            $size = $size + 4;
        }

        if(isset($_GET["hasRoof"])){
            $hasRoof = true;
        }
        if(isset($_GET["Halterungsart"])){
            $holderType = htmlspecialchars($_GET["Halterungsart"]);
        }
    }

    foreach(searchResult($isSearch,$name,$isPublic,$size,$hasRoof,$holderType) as $id) {
        yield $id;
    }
}

function newEntry() {
    if(isset($_POST["submitEntry"])){
        //T0D0: prüfen ob Benutzer eingeloggt ist

        $entryName = null;
        $location = null;
        $userImage = null;
        $isPublic = null;
        $size = null;
        $hasRoof = null;
        $holdingType = null;
        $features = null;
        $imgType =null;

        if(isset($_POST["entryName"])) {
            $entryName = htmlspecialchars($_POST["entryName"]);
        }

        if(isset($_FILES["userImage"])) {
            //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
            $image = $_FILES["userImage"];
            if(empty($image)){
                echo "Es wurde keine Datei Hochgeladen <br>" ;
                return false;
            }
            //Dateiendung
            $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["userImage"]["tmp_name"]);
            if($check !==false){
                $userImage = $image;
            } else {
               echo "Das war kein Bild <br>" ;
                return false;
            }
        }

        if(isset($_POST["isPublic"])) {
            $isPublic = $_POST["optionsPublic"];
        }

        if(isset($_POST["size"])) {
            $size = $_POST["size"];
        }
        if(isset($_POST["hasRoof"])) {
            $hasRoof = $_POST["hasRoof"];
        }
        if(isset($_POST["holdingType"])) {
            $holdingType = $_POST["holdingType"];
        }
        if(isset($_POST["features"])) {
            $features = htmlspecialchars($_POST["features"]);
        }

        //TODO: Überprüfen, ob alles richtig ausgefüllt ist.
        $id = addEntry($entryName, $location, $isPublic, $size, $hasRoof, $holdingType, $features);
        if($id !== false) {
            echo "Test erfolgreich";

            mkdir("Bilder/".$id."/");
            mkdir("Bilder/".$id."/comments/");
            move_uploaded_file($_FILES["userImage"]["tmp_name"],"Bilder/".$id."/".$id.".".$imgType);
            //TODO: Auf neue Eintragsseite gehen.
        } else {
            echo "Test fehlgeschlagen";
            //TODO: Fehler anzeigen.
        }
    }
}

function comment(){
    if(isset($_POST["SubmitComment"])){

        //TODO: Hier muss überprüft werden, ob der Benutzer eingeloggt ist

        $entry = loadEntry($_GET["EntryID"]);
        if($entry !== false){
            if(!empty($_POST["commentText"])){

            }else{
                echo "Du musst schon was schreiben <br>" ;
                return false;
            }

            $imageExists = false;
            $imgType = null;
            if( !empty($_FILES["commentImg"]["tmp_name"])){
                //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
                $image = $_FILES["commentImg"];

                //Dateiendung
                $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));

                //Überprüfung ob Datei ein Bild ist
                $check = getimagesize($_FILES["commentImg"]["tmp_name"]);
                if($check == false){
                    echo "Das war kein Bild <br>" ;
                    return false;
                }else {
                    $imageExists = true;
                }
            }

            $username = "Testnutzer";//TODO: richtigen Benutzernamen hinzufügen
            $text = htmlspecialchars($_POST["commentText"]);
            $entryId = $entry->getId();
            $commentId = addComment($entryId, $username, $text);
            if($commentId !== false && $imageExists){
                if (move_uploaded_file($_FILES["commentImg"]["tmp_name"],"Bilder/".$entryId."/comments/".$commentId.".".$imgType)) {
                            echo "Bild erfolgreich hochgeladen <br>";
                }else{
                    echo "Fehler beim speichern des Bildes <br>";
                }

            }elseif($commentId == false){
                echo "Fehler beim speichern des Kommentares in der Datenbank <br>";
            }
        }else{
            echo "Dieser Stellplatz existiert nicht in der Datenbank <br>";
        }
    }



}

?>
