<?php
if(isset($_POST["alterEntry"])){
    $entryId=null;
    if(isset($_POST["EntryID"])){
        $entryId = htmlspecialchars($_POST["EntryID"]);
    }
    if(isset($_SESSION["User"]) && $entryId!==null){
    $oldEntryData= $contentmanager->loadEntry($entryId);

    $entryName = null;
    $userImage = null;
    $isPublic = null;
    $size = null;
    $hasRoof = null;
    $holdingType = null;
    $description = null;
    $imgType =null;
    $longitude=null;
    $latitude=null;
    $inputsCorrect = true;


    if(isset($_POST["entryName"])&&is_string($_POST["entryName"])) {
        $entryName = htmlspecialchars($_POST["entryName"]);
    }

    if(isset($_FILES["userImage"])) {
        //Ein Teil hier von ist von https://www.w3schools.com/php/php_file_upload.asp
        $image = $_FILES["userImage"];
        if(!empty($image)){
            //Dateiendung
            $imgType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["userImage"]["tmp_name"]);
            if($check !==false){
                $userImage = $image;
            } else {
                $imgType= null;
            }
        }
    }

    if(isset($_POST["isPublic"])&&($_POST["isPublic"]=="false"||$_POST["isPublic"]=="true")) {
        $isPublic = ($_POST["isPublic"]=="true");
    }

    if(isset($_POST["size"])&&is_string($_POST["size"])&& in_array($_POST["size"],["Klein","Mittel","Groß"],true)) {
        $size = htmlspecialchars($_POST["size"]);
    }
    if(isset($_POST["hasRoof"])&&($_POST["hasRoof"]=="false"||$_POST["hasRoof"]=="true")) {
        $hasRoof = ($_POST["hasRoof"]=="true");
    }

    if(isset($_POST["holdingType"])&&is_string($_POST["holdingType"]) && in_array($_POST["size"],["(Keine Angabe)","Einfache Vorderradhalter","Fahrradgerechte Vorderradhalter","Anlehnbügel","Schräghochparker"],true)) {
        $holdingType = htmlspecialchars($_POST["holdingType"]);
    }

    if(isset($_POST["description"])&&is_string($_POST["description"])) {
         $description = htmlspecialchars($_POST["description"]);
    }

    if(isset($_POST["longitude"])&&is_string($_POST["longitude"]) ){
        $longitude = (float) $_POST["longitude"];
    }

    if(isset($_POST["latitude"])&&is_string($_POST["latitude"]) ){
        $latitude = (float) $_POST["latitude"];
    }

    $wasAltered = $contentmanager->alterEntry($entryName, $isPublic, $size, $hasRoof, $holdingType, $description,$longitude,
    $latitude, $imgType);
    if($wasAltered) {
            if($imgType!==null){
                try{
                    $image=$oldEntryData->getImage();
                    if(unlink($image)){
                        move_uploaded_file($_FILES["userImage"]["tmp_name"],"pictures/Entry".$id."/EntryPic".$id.".".$imgType);
                        header("Location:http://localhost/entryPage.php?EntryID=".$entryId);
                    }else{
                        header("Location:http://localhost/entryPage.php?EntryID=".$entryId);
                    }
                }catch (Exception $ex) {
                    echo "Fehler: " . $ex->getMessage();
                }
            }else{
                header("Location:http://localhost/entryPage.php?EntryID=".$entryId);
            }

        header("Location:http://localhost/entryPage.php?EntryID=".$id);
    } else {
         header("Location:http://localhost/createEntryPage.php");
    }

    }else{
        header("Location:http://localhost/registration.php");
    }

}
?>
