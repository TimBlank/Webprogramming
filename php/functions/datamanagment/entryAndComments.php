<?php
 class entry {
    private $id;
    private $name;
    private $image;
    private $isPublic;
    private $size;
    private $hasRoof;
    private $holderType;
    private $description;
    private $longitude;
    private $latitude;

    public function __construct($setId,$setName="Beschreibender Name",$setImage="pictures/dummyEntry/DummyBild.png",$setIsPublic=true,$setSize="Klein(0-30)/Mittel(30-100)/Groß(100+)",$setHasRoof=true,$setHolderType="Einfacher Vorderradhalter",$setDescription="Zum Beispiel Zugänglichkeit oder anderes",$setLongitude=null,$setLatitude=null) {
        $this->id = $setId;
        $this->name = $setName;
        $this->image = $setImage;
        $this->isPublic = $setIsPublic;
        $this->size = $setSize;
        $this->hasRoof = $setHasRoof;
        $this->holderType = $setHolderType;
        $this->description = $setDescription;
        $this->longitude = $setLongitude;
        $this->latitude = $setLatitude;
    }

    public function getId(){
            return $this->id;
    }

     public function getName(){
            return $this->name;
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

    public function getLongitude(){
        return $this->longitude;
    }

    public function getLatitude(){
        return $this->latitude;
    }


}

class comment{
    private $commentID;
    private $author;
    private $text;
    private $image;

    public function __construct($setCommentID, $setAuthor="Benutzername",$setText="Hier Steht ein Kommentar, den ein Nutzer geschrieben hat.",$setImage="pictures/dummyEntry/DummyBild.png"){
        $this->commentID = $setCommentID;
        $this->author = $setAuthor;
        $this->text = $setText;
        $this->image = $setImage;
    }

    public function getCommentID(){
        return $this->commentID;
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
