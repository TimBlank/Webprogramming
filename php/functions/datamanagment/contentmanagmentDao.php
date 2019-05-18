<?php

class entry {
    private $name;
    private $image;
    private $location;
    private $isPublic;
    private $size;
    private $hasRoof;
    private $holderType;

    public function __construct($name="Beschreibender Name",$location,$image="DummyBild",$isPublic=true,$size="Klein(0-30)/Mittel(30-100)/Groß(100+)",$hasRoof=true,$holderType="Einfacher Vorderradhalter") {
        $this->name = $name;
        $this->location = $location;
        $this->image = $image;
        $this->isPublic = $isPublic;
        $this->size = $size;
        $this->roof = $roof;
        $this->holderType = $holderType;
    }

    public function getName(){
        return $name;
    }

    public function getImage(){
        return $image;
    }

    public function getIsPublic(){
        return $isPublic;
    }

    public function getSize(){
        return $size;
    }

    public function getHasRoof(){
        return $hasRoof;
    }

    public function getHolderType(){
        return $holderType;
    }
}



//Eintrag hinzufügen, vorher Übergabewerte prüfen
function addEntry(){

}

//Erstellt Eintrags-Objekt basierend auf einer Id
function loadEntry($entryId){
    return new entry;
}

//Gibt Ids von Einträgen zurück, auf die die Suchkriterien zutreffen
function searchResult($name,$image,$isPublic=true,$size,$hasRoof=true,$holderType){
    for ($i=0; i<3; i++){
        yield $i;
    }
}

?>
