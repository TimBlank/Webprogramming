<?php

if(isset($_POST["DeleteComment"])) {
    if(isset($_SESSION["User"])) {
        if(isset($_POST["CommentID"])) {

            $commentId = htmlspecialchars($_POST["CommentID"]);
            $comment = $contentmanager->loadComment($commentId);

            if($comment != null) {
                if($comment->getAuthor() == $_SESSION["User"]) {
                    $removedFromDB = $contentmanager->deleteComment($commentId);
                    if($removedFromDB) {
                        $image = $comment->getImage();
                        if(!empty($image) || $image !== null) {
                            try {
                                if(unlink($image)) {
                                    $_SESSION["Message"] = $_SESSION["Message"] . "Kommentar und Bild wurden erfolgreich entfernt. <br>";
                                    header('Location: '.$domain.$prevPage."#addCommentSection");
                                } else {
                                    $_SESSION["Message"] = $_SESSION["Message"] . "Fehler geworfen beim Kommentar löschen! <br>";
                                    header('Location: '.$domain.$prevPage."#addCommentSection");
                                }
                            } catch (Exception $ex) {
                                $_SESSION["Message"] = $_SESSION["Message"] . "Fehler geworfen beim Kommentar löschen! <br>";
                                header('Location: '.$domain.$prevPage."#addCommentSection");
                            }
                        } else {
                            $_SESSION["Message"] = $_SESSION["Message"] . "Kommentar wurde Erfolgreich entfernt. <br>";
                            header('Location: '.$domain.$prevPage."#addCommentSection");
                        }
                    } else {
                        $_SESSION["Message"] = $_SESSION["Message"] . "Dieser Kommentar existiert nicht. <br>";
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                    }
                } else {
                    $_SESSION["Message"] = $_SESSION["Message"] . "Nur der Ersteller des Kommentares kann diesen Kommentar löschen. <br>";
                    header('Location: '.$domain.$prevPage."#addCommentSection");
                }
            } else {
                $_SESSION["Message"] = $_SESSION["Message"] . "Fehler beim Finden des Kommentars. Der Kommentar existiert nicht. <br>";
                header('Location: '.$domain.$prevPage."#addCommentSection");
            }
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Die Kommentar-ID fehlt. Kommentar konnte nicht gelöscht werden. <br>";
            header('Location: '.$domain.$prevPage."#addCommentSection");
        }
    } else {
        $_SESSION["Message"] = $_SESSION["Message"] . "Nur eingeloggte, registrierte Accounts können Komentare löschen. <br>";
        header('Location: '.$domain.$prevPage."#addCommentSection");
    }
}

?>
