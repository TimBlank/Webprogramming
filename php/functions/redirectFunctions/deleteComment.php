<?php

if(isset($_POST["DeleteComment"])){
    $entryId=null;
    if(isset($_POST["EntryID"])){
        $entryId = htmlspecialchars($_POST["EntryID"]);
    }
    if(isset($_POST["CommentID"])){
        $commentId = htmlspecialchars($_POST["CommentID"]);
        $comment = loadComment($commentId);
        $removedFromDB = deleteComment($commentId);
        if($removedFromDB){
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
        }else{
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
        }
    }else{
        header("Location:http://localhost/entryPage.php?EntryID=".$entryId."#addCommentSection");
    }
}

?>
