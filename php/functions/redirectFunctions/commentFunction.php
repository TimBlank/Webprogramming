<?php
include_once "php/functions/redirectFunctions/checkFunctions.php";

if(isset($_POST["SubmitComment"])){

    $noscript = isset($_POST["Noscript"]);

    if(isset($_SESSION["User"])){
        if(isset($_POST["EntryID"])){
            $entry = $contentmanager->loadEntry($_POST["EntryID"]);
            if($entry !== false){
                $inputsCorrect = true;
                $entryId = $entry->getId();
                if(isset($_POST["commentText"]) && !empty($_POST["commentText"])){

                }else{
                    $_SESSION["Message"] = $_SESSION["Message"] . "Du musst schon was schreiben. <br>";
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
                        $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
                        $inputsCorrect = false;
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
                            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim speichern des Bildes. <br>";
                        }
                    }elseif($commentId == false){
                        //Kommentar konnte in der Datenbank nicht hinzugefügt werden
                        $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim speichern des Kommentares in der Datenbank. <br>";
                        if($noscript){
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                        }else{
                            // Set a 500 (internal server error) response code.
                            http_response_code(500);
                            echo "<li> ".$_SESSION["Message"]." </li>";
                            exit;
                        }
                    }
                    //Kommentar erfolgreich erstellt.
                    if($noscript){
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                    }else{
                        // Set a 200 (okay) response code.
                        http_response_code(200);
                        echo "<li>Test Erfolgreich <br> -----------</li>";//TODO: Kommentarinhalt
                        exit;
                    }
                }else{
                    //Fehlerhafte Eingabe
                    if($noscript){
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                    }else{
                        // Set a 400 (bad request) response code and exit.
                        http_response_code(400);
                        echo "<li> ".$_SESSION["Message"]." </li>";
                        exit;
                    }
                }
            }else{
                //Der Beitrag existiert nicht
                $_SESSION["Message"] = $_SESSION["Message"] . "Dieser Stellplatz existiert nicht in der Datenbank. <br>";
                if($noscript){
                    header('Location: '.$domain."/Index.php");
                }else{
                     // Set a 400 (bad request) response code and exit.
                    http_response_code(400);
                    echo "<li> ".$_SESSION["Message"]." </li>";
                    exit;
                }
            }
        }else{
            $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Erkennen des Stellplatzes.  <br>";
        }
    }else{
        //Nicht eingeloggt
        $_SESSION["Message"] = $_SESSION["Message"] . "Bitte mit einem Registrierten Account einloggen um Kommentare zu schreiben.  <br>";
        if($noscript){
            header('Location: '.$domain."/registration.php");
        }else{
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "<li> ".$_SESSION["Message"]." </li>";
            exit;
        }
    }
}

?>
