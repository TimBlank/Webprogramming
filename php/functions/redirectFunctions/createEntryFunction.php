<?php
include_once "php/functions/redirectFunctions/checkFunctions.php";

if(isset($_POST["submitEntry"])) {
    if(isset($_SESSION["User"])) {
        $entryName = null;
        $userImage = null;
        $isPublic = null;
        $size = null;
        $hasRoof = null;
        $holdingType = null;
        $description = null;
        $imgType = null;
        $longitude = null;
        $latitude = null;
        $inputsCorrect = true;

        //Check Entry-Name
        if(isset($_POST["entryName"]) && is_string($_POST["entryName"])) {
            if(strlen($_POST["entryName"]) !== 0) {
                $entryName = htmlspecialchars($_POST["entryName"]);
            } else {
                $_SESSION["Message"] = $_SESSION["Message"] . "Name des Stellplatzes ist leer. <br>";
                $inputsCorrect = false;
            }
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Namen des Stellplatzes. <br>";
            $inputsCorrect = false;
        }

        if(isset($_FILES["userImage"])) {
            //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
            $image = $_FILES["userImage"];
            if(empty($image) || (array_sum($image)) <= 4){
                $_SESSION["Message"] = $_SESSION["Message"] . "Es wurde keine Datei Hochgeladen <br>" ;
                $inputsCorrect = false;
            } else {
                $check = getimagesize($_FILES["userImage"]["tmp_name"]);

                if(checkImage($check)) {
                    $userImage = $image;
                    $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
                } else {
                    $inputsCorrect = false;
                }
            }
        }

        //Check Public Radiobuttons
        if(isset($_POST["isPublic"]) && ($_POST["isPublic"]=="false"||$_POST["isPublic"]=="true")) {
            $isPublic = ($_POST["isPublic"]=="true");
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Öffentlichkeits-Auswahl. <br>";
            $inputsCorrect = false;
        }

        //Check Size Radiobuttons
        if(isset($_POST["size"])&&is_string($_POST["size"])&& in_array($_POST["size"],["Klein","Mittel","Groß"],true)) {
            $size = htmlspecialchars($_POST["size"]);
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Größen-Auswahl. <br>";
            $inputsCorrect = false;
        }

        //Check Size Radiobuttons
        if(isset($_POST["hasRoof"]) && ($_POST["hasRoof"]=="false" || $_POST["hasRoof"]=="true")) {
            $hasRoof = ($_POST["hasRoof"]=="true");
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Überdachungs-Auswahl. <br>";
            $inputsCorrect = false;
        }

        //Check Holdingtype Dropdown
        if(isset($_POST["holdingType"])&&is_string($_POST["holdingType"]) && in_array($_POST["holdingType"],["(Keine Angabe)","Einfache Vorderradhalter","Fahrradgerechte Vorderradhalter","Anlehnbügel","Schräghochparker"],true)) {
            $holdingType = htmlspecialchars($_POST["holdingType"]);
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Fahrradshalterungs-Auswahl. <br>";
            $inputsCorrect = false;
        }

        //Check Discription Text
        if(isset($_POST["description"]) && is_string($_POST["description"])) {
             $description = htmlspecialchars($_POST["description"]);
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei den Besonderheiten. <br>";
            $inputsCorrect = false;
        }

        //Check longitude Value
        if(isset($_POST["longitude"]) && is_string($_POST["longitude"])) {
            $longitude = (float) $_POST["longitude"];
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Längengrad-Einstellung. <br>";
            $inputsCorrect = false;
        }

        //Check latitude Value
        if(isset($_POST["latitude"]) && is_string($_POST["latitude"])) {
            $latitude = (float) $_POST["latitude"];
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Breitengrad-Einstellung. <br>";
            $inputsCorrect = false;
        }

        //TODO: Überprüfen, ob alles richtig ausgefüllt ist.
        if($inputsCorrect) {
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
                header('Location: '.$domain."/entryPage.php?EntryID=".$id);
            } else {
                //echo "Test fehlgeschlagen";
                //TODO: Fehler anzeigen.
                 header('Location: '.$domain.$prevPage);
            }
        }else {
             header('Location: '.$domain.$prevPage);
        }
    }else{
        header('Location: '.$domain."/registration.php");
    }

}
?>
