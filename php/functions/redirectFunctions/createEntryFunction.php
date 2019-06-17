<?php
if(isset($_POST["submitEntry"])){

    if(isset($_SESSION["User"])){

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
    $inputsCorrect = true;

    if(isset($_POST["entryName"])&&is_string($_POST["entryName"])) {
        $entryName = htmlspecialchars($_POST["entryName"]);
    }else{
        $inputsCorrect = false;
    }

    if(isset($_FILES["userImage"])) {
        //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
        $image = $_FILES["userImage"];
        if(empty($image)){
            //echo "Es wurde keine Datei Hochgeladen <br>" ;
            $inputsCorrect = false;
        }else{
            //Dateiendung
            $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["userImage"]["tmp_name"]);
            if($check !==false){
                $userImage = $image;
            } else {
                //echo "Das war kein Bild <br>" ;
                $inputsCorrect = false;
            }
        }
    }

    if(isset($_POST["isPublic"])&&($_POST["isPublic"]=="false"||$_POST["isPublic"]=="true")) {
        $isPublic = ($_POST["isPublic"]=="true");
    }else{
        $inputsCorrect = false;
    }

    if(isset($_POST["size"])&&is_string($_POST["size"])&& in_array($_POST["size"],["Klein","Mittel","Groß"],true)) {
        $size = htmlspecialchars($_POST["size"]);
    }else{
        $inputsCorrect = false;
    }
    if(isset($_POST["hasRoof"])&&($_POST["hasRoof"]=="false"||$_POST["hasRoof"]=="true")) {
        $hasRoof = ($_POST["hasRoof"]=="true");
    }else{
        $inputsCorrect = false;
    }
    if(isset($_POST["holdingType"])&&is_string($_POST["holdingType"]) && in_array($_POST["holdingType"],["(Keine Angabe)","Einfache Vorderradhalter","Fahrradgerechte Vorderradhalter","Anlehnbügel","Schräghochparker"],true)) {
        $holdingType = htmlspecialchars($_POST["holdingType"]);
    }else{
        $inputsCorrect = false;
    }
    if(isset($_POST["description"])&&is_string($_POST["description"])) {
         $description = htmlspecialchars($_POST["description"]);
    }else{
        $inputsCorrect = false;
    }

    if(isset($_POST["longitude"])&&is_string($_POST["longitude"]) ){
        $longitude = (float) $_POST["longitude"];
    }else{
        $inputsCorrect = false;
    }

    if(isset($_POST["latitude"])&&is_string($_POST["latitude"]) ){
        $latitude = (float) $_POST["latitude"];
    }else{
        $inputsCorrect = false;
    }

    //TODO: Überprüfen, ob alles richtig ausgefüllt ist.
    if($inputsCorrect){
    $id = $contentmanager->addEntry($entryName, $isPublic, $size, $hasRoof, $holdingType, $description,$longitude,
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
    }else {
         header("Location:http://localhost/createEntryPage.php");
    }
    }else{
        header("Location:http://localhost/registration.php");
    }

}
?>
