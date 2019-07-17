<?php
if(isset($_POST["DeleteEntry"])) {
    $entryId = null;
    if(isset($_POST["EntryID"])) {
        $entryId = htmlspecialchars($_POST["EntryID"]);
    }
    if($entryId !== null) {
        if(isset($_SESSION["User"])) {
            $entry = $contentmanager->loadEntry($entryId);
            $removedFromDB = $contentmanager->deleteEntry($entryId);
            if($removedFromDB) {
                delete_directory("pictures/Entry".$entryId);
                $_SESSION["Message"] = $_SESSION["Message"] . "Beitrag wurde erfolgreich entfernt. <br>";
                header('Location: '.$domain."/Index.php");
            } else {
                $_SESSION["Message"] = $_SESSION["Message"] . "Beitrag wurde nicht erfolgreich gelöscht. <br>";
                header('Location: '.$domain.$prevPage);
            }
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Nur eingeloggte Nutzer können Beiträge löschen. <br>";
            header('Location: '.$domain.$prevPage);
        }
    } else {
        $_SESSION["Message"] = $_SESSION["Message"] . "Fehler bei der Erkennung des Beitrages. <br>";
        header('Location: '.$domain.$prevPage);
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
