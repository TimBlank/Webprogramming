var map, infoWindow;

function creatMap(){
    var a=42
    var b=22
    var diff= 0.0033

    var options ={
        center:{lat: a, lng: b},
        zoom : 14
        //disabelDefaultUI: true    //für Karte auf Hauptseite
        //drarggable: false         // für Karte auf Hauptseite
    };

    map = new google.maps.Map(document.getElementById('map'),options);
}

//BEREICHE hinzufügen