<?php
if(isset($_POST["submitEntry"])){

    isset($_SESSION["User"]){}

    $entryName = null;
    $userImage = null;
    $isPublic = null;
    $size = null;
    $hasRoof = null;
    $holdingType = null;
    $description = null;
    $imgType =null;
    $longitude=null;
    $latitude=null;

    if(isset($_POST["entryName"])&&is_string($_POST["entryName"])) {
        $entryName = htmlspecialchars($_POST["entryName"]);
    }

    if(isset($_FILES["userImage"])) {
        //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
        $image = $_FILES["userImage"];
        if(empty($image)){
            //echo "Es wurde keine Datei Hochgeladen <br>" ;
            return false;
        }
            //Dateiendung
        $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["userImage"]["tmp_name"]);
        if($check !==false){
            $userImage = $image;
        } else {
            //echo "Das war kein Bild <br>" ;
            return false;
        }
    }

    if(isset($_POST["isPublic"])&&($_POST["isPublic"]=="false"||$_POST["isPublic"]=="true")) {
        $isPublic = ($_POST["isPublic"]=="true");
    }

    if(isset($_POST["size"])&&is_string($_POST["size"])) {
        $size = htmlspecialchars($_POST["size"]);
    }
    if(isset($_POST["hasRoof"])&&($_POST["hasRoof"]=="false"||$_POST["hasRoof"]=="true")) {
        $hasRoof = ($_POST["hasRoof"]=="true");
    }
    if(isset($_POST["holdingType"])&&is_string($_POST["holdingType"])) {
        $holdingType = htmlspecialchars($_POST["holdingType"]);
    }
    if(isset($_POST["description"])&&is_string($_POST["description"])) {
         $description = htmlspecialchars($_POST["description"]);
    }

    if(isset($_POST["longitude"])&&is_string($_POST["longitude"]) ){
        $longitude = (float) $_POST["longitude"];
    }

    if(isset($_POST["latitude"])&&is_string($_POST["latitude"]) ){
        $latitude = (float) $_POST["latitude"];
    }

    //TODO: Überprüfen, ob alles richtig ausgefüllt ist.
    $id = addEntry($entryName, $isPublic, $size, $hasRoof, $holdingType, $description,$longitude,
    $latitude, $imgType);
    if($id !== false) {
        //echo "Test erfolgreich";
        if(!is_dir("pictures/Entry".$id."/")) {
            mkdir("pictures/Entry".$id."/");
        }
        if(!is_dir("pictures/Entry".$id."/comments/")) {
            mkdir("pictures/Entry".$id."/comments/");
        }
        move_uploaded_file($_FILES["userImage"]["tmp_name"],"pictures/Entry".$id."/EntryPic".$id.".".$imgType);
            //TODO: Auf neue Eintragsseite gehen.
        header("Location:http://localhost/entryPage.php?EntryID=".$id);
    } else {
        //echo "Test fehlgeschlagen";
        //TODO: Fehler anzeigen.
         header("Location:http://localhost/createEntryPage.php");
    }

}
?>
