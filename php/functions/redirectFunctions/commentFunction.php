<?php

if(isset($_POST["SubmitComment"])){

    if(isset($_SESSION["User"])){

        $entry = $contentmanager->loadEntry($_POST["EntryID"]);
        if($entry !== false){
            $inputsCorrect = true;
            $entryId = $entry->getId();
            if(!empty($_POST["commentText"])){

            }else{
                //echo "Du musst schon was schreiben <br>" ;
                $inputsCorrect = false;
            }

            $imageExists = false;
            $imgType = null;
            if( !empty($_FILES["commentImg"]["tmp_name"])){
                //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
                $image = $_FILES["commentImg"];

                //Überprüfung ob Datei ein Bild ist
                $check = getimagesize($_FILES["commentImg"]["tmp_name"]);
                if($check == false){
                    //echo "Das war kein Bild <br>" ;
                    $inputsCorrect = false;
                }else {
                    //Dateiendung
                    $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
                    $imageExists = true;
                }
            }

            if($inputsCorrect){
                $username = htmlspecialchars($_SESSION["User"]);
                $text = htmlspecialchars($_POST["commentText"]);
                $commentId = $contentmanager->addComment($entryId, $username, $text, $imgType);
                if($imageExists && $commentId !== false){
                    mkdir("pictures/Entry".$entryId."/comments/");
                    if (move_uploaded_file($_FILES["commentImg"]["tmp_name"],"pictures/Entry".$entryId."/comments/Entry".$entryId."CommPic".$commentId.".".$imgType)) {

                    }else{
                        //echo "Fehler beim speichern des Bildes <br>";
                    }

                }elseif($commentId == false){
                    //echo "Fehler beim speichern des Kommentares in der Datenbank <br>";
                    header('Location: '.$domain.$prevPage."#addCommentSection");
                }
                header('Location: '.$domain.$prevPage."#addCommentSection");
            }else{
                //echo "Falsche Eingabe <br>";
                header('Location: '.$domain.$prevPage."#addCommentSection");
            }

        }else{
            //echo "Dieser Stellplatz existiert nicht in der Datenbank <br>";
            header('Location: '.$domain."/Index.php");

        }
    }else{
        //echo nicht eingeloggt;
        header('Location: '.$domain."/registration.php");
    }
}


?>
