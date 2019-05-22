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
        if(isset($_GET["Öffentlich"])){
            $isPublic = true;
        }
        if(isset($_GET["kleinerStellplatz"])){//klein
            $size = $size + 1;
        }
        if(isset($_GET["mittlererStellplatz"])){//mittel
            $size = $size + 2;
        }
        if(isset($_GET["großerStellplatz"])){//groß
            $size = $size + 4;
        }

        if(isset($_GET["Überdacht"])){
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

function comment(){
    if(isset($_POST["SubmitComment"])){

        //TODO: Hier muss überprüft werden, ob der Benutzer eingeloggt ist

        $entry = loadEntry($_GET[EntryID]);
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
                if (move_uploaded_file($_FILES["commentImg"]["tmp_name"],"Bilder/".$entryId."/comments/".$commentId.$imgType)) {
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
