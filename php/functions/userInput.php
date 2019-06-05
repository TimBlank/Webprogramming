<?php
//Diese Datei könnte einen besseren Namen haben


//Holt Werte über get und gibt die Ergebnisse der Funktion searchResult weiter
function loadEntries(){
    if(isset($_GET["SubmitSearch"])){
        $entryName = null;
        $isPublic = null;
        $size = 0;
        $hasRoof = null;
        $holdingType = null;
        if(isset($_GET["entryName"])){
            $entryName = htmlspecialchars( $_GET["entryName"]);
        }
        if(isset($_GET["isPublic"])&&($_GET["isPublic"]=="false"||$_GET["isPublic"]=="true")) {
            $isPublic = ($_GET["isPublic"]=="true");
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

        if(isset($_GET["hasRoof"])&&($_GET["hasRoof"]=="false"||$_GET["hasRoof"]=="true")) {
            $hasRoof = ($_GET["hasRoof"]=="true");
        }
        if(isset($_GET["holdingType"])){
            $holdingType = htmlspecialchars($_GET["holdingType"]);
        }
        foreach(searchResult($entryName,$isPublic,$size,$hasRoof,$holdingType) as $id) {
            yield $id;
        }
    }else{
        foreach(defaultEntries() as $id) {
            yield $id;
        }
    }


}

function newEntry() {
    if(isset($_POST["submitEntry"])){
        //T0D0: prüfen ob Benutzer eingeloggt ist

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
            echo "Test erfolgreich";

            if(!is_dir("pictures/Entry".$id."/")) {
                mkdir("pictures/Entry".$id."/");
            }
            if(!is_dir("pictures/Entry".$id."/comments/")) {
                mkdir("pictures/Entry".$id."/comments/");
            }
            move_uploaded_file($_FILES["userImage"]["tmp_name"],"pictures/Entry".$id."/EntryPic".$id.".".$imgType);
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

                //Überprüfung ob Datei ein Bild ist
                $check = getimagesize($_FILES["commentImg"]["tmp_name"]);
                if($check == false){
                    echo "Das war kein Bild <br>" ;
                    return false;
                }else {
                    //Dateiendung
                    $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
                    $imageExists = true;
                }
            }

            $username = "Testnutzer";//TODO: richtigen Benutzernamen hinzufügen
            $text = htmlspecialchars($_POST["commentText"]);
            $entryId = $entry->getId();
            $commentId = addComment($entryId, $username, $text, $imgType);
            if($imageExists && $commentId !== false){
                if (move_uploaded_file($_FILES["commentImg"]["tmp_name"],"pictures/Entry".$entryId."/comments/Entry".$entryId."CommPic".$commentId.".".$imgType)) {
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

function register() {
    if(isset($_POST["registerBtn"])){
        $name = null;
        $email = null;
        $password = null;
        $passwordRepeat = null;
        $accountName = null;

        $formCor = true;

        if(isset($_POST["name"])&&is_string($_POST["name"])) {
            $name = htmlspecialchars($_POST["name"]);
        } else {
            $formCor = false;
            echo "Fehler beim Namen. <br>";
        }

        if(isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST["email"]);
        } else {
            $formCor = false;
            echo "Fehler bei der E-Mail. <br>";
        }

        if(isset($_POST["password"])) {
            $password = $_POST["password"];
        } else {
            $formCor = false;
            echo "Fehler beim Passwort. <br>";
        }

        if(isset($_POST["passwordRepeat"])) {
            $passwordRepeat = $_POST["passwordRepeat"];
        } else {
            $formCor = false;
            echo "Fehler beim Passwort wiederholen. <br>";
        }

        if(isset($_POST["accountName"])&&is_string($_POST["accountName"])) {
            $accountName = htmlspecialchars($_POST["accountName"]);
        } else {
            $formCor = false;
            echo "Fehler beim Account Namen. <br>";
        }

        if($formCor == true) {
            if($password == $passwordRepeat) {
                registerUser($name, $email, $password, $accountName);
            } else {
                echo "Passwörter sind nicht gleich.";
            }
        } else {
            echo "Fehler bei der Registrierung";
        }
    }
}


?>
