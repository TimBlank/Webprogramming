<?php
if(isset($_POST["DeleteEntry"])){
    $entryId=null;
    if(isset($_POST["EntryID"])){
        $entryId = htmlspecialchars($_POST["EntryID"]);
    }
    if(isset($_SESSION["User"]) && $entryId!==null){
        $entry = $contentmanager->loadEntry($entryId);
        $removedFromDB = $contentmanager->deleteEntry($entryId);
        if($removedFromDB){
            delete_directory("pictures/Entry".$entryId);
            header("Location:http://localhost/Index.php");
        }else{
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId);
        }

    }else{
            header("Location:http://localhost/entryPage.php?EntryID=".$entryId);
    }
}


//Quelle: https://paulund.co.uk/php-delete-directory-and-files-in-directory
function delete_directory($dirname) {
         if (is_dir($dirname))
           $dir_handle = opendir($dirname);
     if (!$dir_handle)
          return false;
     while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
     }
     closedir($dir_handle);
     rmdir($dirname);
     return true;
}


?>
