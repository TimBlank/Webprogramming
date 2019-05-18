<?php
 class entry {
    private $name;
    private $image;
    private $location;
    private $isPublic;
    private $size;
    private $hasRoof;
    private $holderType;
    private $description;

    public function __construct($setName="Beschreibender Name",$setLocation=null,$setImage="DummyBild.png",$setIsPublic=true,$setSize="Klein(0-30)/Mittel(30-100)/Groß(100+)",$setHasRoof=true,$setHolderType="Einfacher Vorderradhalter",$setDescription="Zum Beispiel Zugänglichkeit oder anderes") {
        $this->name = $setName;
        $this->location = $setLocation;
        $this->image = $setImage;
        $this->isPublic = $setIsPublic;
        $this->size = $setSize;
        $this->hasRoof = $setHasRoof;
        $this->holderType = $setHolderType;
        $this->description = $setDescription;
    }

    public function getName(){
            return $this->name;
    }

     public function getLocation(){
        return $this->location;
    }

    public function getImage(){
        return $this->image;
    }

    public function getIsPublic(){
        return $this->isPublic;
    }

    public function stringIsPublic(){
        if($this->isPublic){
            return "Öffentlich";
        }else{
            return "Privat";
        }
    }

    public function getSize(){
        return $this->size;
    }

    public function getHasRoof(){
        return $this->hasRoof;
    }

    public function stringHasRoof(){
        if($this->hasRoof){
            return "Überdacht";
        }else{
            return "Unüberdacht";
        }
    }

    public function getHolderType(){
        return $this->holderType;
    }

     public function getDescription(){
        return $this->description;
    }
}
?>
