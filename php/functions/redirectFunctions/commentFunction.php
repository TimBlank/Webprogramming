<?php
include_once "php/functions/redirectFunctions/checkFunctions.php";

if(isset($_POST["SubmitComment"])){
    if(isset($_SESSION["User"])){
        if(isset($_POST["EntryID"])){
            $entry = $contentmanager->loadEntry($_POST["EntryID"]);
            if($entry !== false){
                $inputsCorrect = true;
                $entryId = $entry->getId();
                if(isset($_POST["commentText"]) && !empty($_POST["commentText"])){

                }else{
                    $_SESSION["Message"] = "Du musst schon was schreiben";
                    $inputsCorrect = false;
                }
                $imageExists = false;
                $imgType = null;
                if(isset($_FILES["commentImg"]) && !empty($_FILES["commentImg"]["tmp_name"])){
                    //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
                    $image = $_FILES["commentImg"];
                    //Überprüfung ob Datei ein Bild ist
                    $check = getimagesize($_FILES["commentImg"]["tmp_name"]);

                    $imageExists = checkImage($check);
                    if(!$imageExists) {
                        $inputsCorrect = false;
                    }
                }
                if($inputsCorrect){
                    $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));

                    $username = htmlspecialchars($_SESSION["User"]);
                    $text = htmlspecialchars($_POST["commentText"]);
                    $commentId = $contentmanager->addComment($entryId, $username, $text, $imgType);
                    if($imageExists && $commentId !== false){
                        mkdir("pictures/Entry".$entryId."/comments/");
                        if (move_uploaded_file($_FILES["commentImg"]["tmp_name"],"pictures/Entry".$entryId."/comments/Entry".$entryId."CommPic".$commentId.".".$imgType)) {

                        }else{
                            $_SESSION["Message"] = "Fehler beim speichern des Bildes.";
                        }
                    }elseif($commentId == false){
                        $_SESSION["Message"] = "Fehler beim speichern des Kommentares in der Datenbank.";
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                    }
                    header('Location: '.$domain.$prevPage."#addCommentSection");

                }else{
                    header('Location: '.$domain.$prevPage."#addCommentSection");
                }
            }else{
                $_SESSION["Message"] = "Dieser Stellplatz existiert nicht in der Datenbank";
                header('Location: '.$domain."Index.php");
            }
        }else{
            $_SESSION["Message"] = "Fehler beim Erkennen des Stellplatzes.";
        }
    }else{
        $_SESSION["Message"] = "Bitte mit einem Registrierten Account einloggen um Kommentare zu schreiben.";
        header('Location: '.$domain."registration.php");
    }
}

?>
