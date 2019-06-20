<?php

if(isset($_POST["DeleteComment"])){
    if(isset($_SESSION["User"]) && isset($_POST["CommentID"])){
        $commentId = htmlspecialchars($_POST["CommentID"]);
        $comment = $contentmanager->loadComment($commentId);
        if($comment->getAuthor() == $_SESSION["User"]){
        $removedFromDB = $contentmanager->deleteComment($commentId);
        if($removedFromDB){
            $image = $comment->getImage();
            if(!empty($image) || $image!==null){
                try{
                    if(unlink($image)){
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                    }else{
                        header('Location: '.$domain.$prevPage."#addCommentSection");
                    }
                }catch (Exception $ex) {
                    echo "Fehler: " . $ex->getMessage();
                }
            }else{
                        header('Location: '.$domain.$prevPage."#addCommentSection");
            }

        }else{
            header('Location: '.$domain.$prevPage."#addCommentSection");
        }
        }else{
            header('Location: '.$domain.$prevPage."#addCommentSection");
        }
    }else{
            header('Location: '.$domain.$prevPage."#addCommentSection");
    }
}
?>
