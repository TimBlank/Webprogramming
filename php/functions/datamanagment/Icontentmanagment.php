<?php
include_once "entryAndComments.php";
interface iContentmanagment {

    public function addEntry($name, $isPublic, $size, $hasRoof, $holdingType, $description, $longitude, $latitude, $imageType);

    public function deleteEntry($entryId);

    public function alterEntry($entryId,$name, $isPublic, $size, $hasRoof, $holdingType, $description, $longitude, $latitude, $imageType);

    public function addComment($entryId, $username, $text, $imageType);


    public function deleteComment($commentID);

    public function loadEntry($entryId);

    public function loadEntryComments($entryId);

    public function loadComment($commentId);

    public function searchResult($name, $isPublic, $smallSize, $mediumSize, $largeSize, $hasRoof, $holdingType);

    public function defaultEntries();
}
?>
