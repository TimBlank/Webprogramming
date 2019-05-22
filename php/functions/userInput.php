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
        //Hier muss überprüft werden, ob der Benutzer eingeloggt ist
        if (isset($_FILES["commentImg"])) {

            //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
            $image = $_FILES["commentImg"];

            //Dateiendung
            $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["commentImg"]["tmp_name"]);
            if($check !==false){
                if (move_uploaded_file($_FILES["commentImg"]["tmp_name"],"Bilder/Kommentare/".$image['name'])) {
                echo "Da wama Bild".$image['name']."<br>";
                echo "Dateiendung".$imgType."<br>";
                }
            }else {
               echo "Das war kein Bild <br>" ;
            }


        }
    }

}


?>
