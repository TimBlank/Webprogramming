<?php

if(isset($_POST["DeleteComment"])){
    $entryId=null;
    if(isset($_POST["EntryID"])){
        $entryId = htmlspecialchars($_POST["EntryID"]);
    }
    if(isset($_SESSION["User"]) && isset($_POST["CommentID"])&&$entryId!==null){
        $commentId = htmlspecialchars($_POST["CommentID"]);
        $comment = loadComment($commentId);
        if($comment->getAuthor() == $_SESSION["User"]){
        $removedFromDB = deleteComment($commentId);
        if($removedFromDB){
            $image = $comment->getImage();
            if(!empty($image) || $image!==null){
                try{
                    if(unlink($image)){
                        header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
                    }else{
                        header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
                    }
                }catch (Exception $ex) {
                    echo "Fehler: " . $ex->getMessage();
                }
            }else{
                        header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
            }

        }else{
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
        }
        }else{
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
        }
    }else{
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
    }
}
?>
