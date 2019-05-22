<?php

include "entryAndComments.php";

//Eintrag hinzufügen
function addEntry($name,$location,$isPublic,$size,$hasRoof,$holderType,$description){
    if($name == "Test" && $isPublic == "public" && $size == "small" && $hasRoof == "covered" && $description == "Hallo"){
    return 0;
    }
    return false;
}

//Gibt Eintrags-Objekt basierend auf einer Id zurück
function loadEntry($entryId){
    if($entryId==1){
        return new entry(1,"A2 Brücke Ulhormsweg","Beitraege/A2_Bruecke_Ulhormsweg/A2BU.png",true,"Groß",true,"Einfacher Vorderradhalter","Unter der Brücke von A2 zur Bibliothek");
    }elseif($entryId==2){
        return new entry(2,"Bib Brücke Ulhormsweg","Beitraege/Bib_Bruecke_Ulhormsweg/BBU.png",true,"Groß",true,"Einfacher Vorderradhalter","Unter der Brücke von der Bibliothek zu A2");
    }elseif($entryId==3){
        return new entry(3,"W6 West","Beitraege/W6West/W6W.png",true,"Klein",true,"Einfacher Vorderradhalter","Keine");
    }else{
        return new entry(0);
    }

}

function loadEntryComments($entryId){
    for ($i=0; $i<2; $i++){
        yield new comment;
    }
    yield new comment("Anderer Nutzer","Hey noch ein Kommentar","Bilder/Sterne.png");
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen oder ausgewählte Orte wenn isSearch=false
function searchResult($isSearch,$name=null,$isPublic=null,$size=null,$hasRoof=null,$holderType=null){
    /* $size ist eine Zahl die folgenderweise berechnet wird
    -> $size = klein + mittel + groß
       wobei klein=1, mittel=2, groß=4 oder 0 wenn es nicht ausgewählt wurde
    */
    if($isSearch){
        if($name=="A2"){
            yield 1;
        }elseif($name=="Bib"){
            yield 2;
        }elseif($name=="W6"){
            yield 3;
        } else{
            for ($i=0; $i<4; $i++){
                yield $i;
            }
        }
    }else{
        //Default Anzeige der Hauptseite
            for ($i=0; $i<1; $i++){
                yield $i;
            }
    }
}

//Holt Werte über get und gibt die Ergebnisse der Funktion searchResult weiter
function search(){
    $isSearch =false;
    $name = null;
    $isPublic=null;
    $size=0;
    $hasRoof=null;
    $holderType=null;
    if(isset($_GET["SubmitSearch"])){
        $isSearch =true;
        if(isset($_GET["locationName"])){
            $name = $_GET["locationName"];
        }
        if(isset($_GET["Öffentlich"])){
            $isPublic = true;
        }
        if(isset($_GET["kleinerStellplatz"])){//klein
            $size = $size + 1;
        }
        if(isset($_GET["mittlererStellplatz"])){//mittel
            $size = $size + 2;
        }
        if(isset($_GET["großerStellplatz"])){//groß
            $size = $size + 4;
        }

        if(isset($_GET["Überdacht"])){
            $name = $_GET["locationName"];
        }
        if(isset($_GET["Halterungsart"])){
            $name = $_GET["locationName"];
        }
    }

    foreach(searchResult($isSearch,$name,$isPublic,$size,$hasRoof,$holderType) as $id) {
        yield $id;
    }
}


?>
