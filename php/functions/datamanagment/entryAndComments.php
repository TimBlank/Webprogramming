<?php
 class entry {
    private $id;
    private $name;
    private $image;
    private $location;
    private $isPublic;
    private $size;
    private $hasRoof;
    private $holderType;
    private $description;

    public function __construct($setId,$setName="Beschreibender Name",$setImage="Bilder/DummyBild.png",$setIsPublic=true,$setSize="Klein(0-30)/Mittel(30-100)/Groß(100+)",$setHasRoof=true,$setHolderType="Einfacher Vorderradhalter",$setDescription="Zum Beispiel Zugänglichkeit oder anderes",$setLocation=null) {
        $this->id = $setId;
        $this->name = $setName;
        $this->location = $setLocation;
        $this->image = $setImage;
        $this->isPublic = $setIsPublic;
        $this->size = $setSize;
        $this->hasRoof = $setHasRoof;
        $this->holderType = $setHolderType;
        $this->description = $setDescription;
    }

    public function getId(){
            return $this->id;
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

class comment{
    private $author;
    private $text;
    private $image;

    public function __construct($setAuthor="Benutzername",$setText="Hier Steht ein Kommentar, den ein Nutzer geschrieben hat.",$setImage="Bilder/DummyBild.png"){
        $this->author = $setAuthor;
        $this->text = $setText;
        $this->image = $setImage;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getText(){
        return $this->text;
    }

    public function getImage(){
        return $this->image;
    }
}
?>
