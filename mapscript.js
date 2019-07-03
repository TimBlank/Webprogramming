




/*


var map;


function creatMap(){
    var a = 43;
    var b = 40;
   // var diff = 0.0033;

    var options ={
        center: {lat: a, lng: b}, // TODO abfragen wo ort
        zoom : 14
        // disabelDefaultUI: true,  //für Karten auf Hauptseite
        // draggable: flase,        //für Karten auf Hauptseite
    };

    map = new google.maps.Map(document.getElementById('map'),options);
}
    //BEREICHE hizufügen
    /*
    var polygonCordinates = [
        {lat: a + diff, lng: b -diff },
        {lat: a - diff, lng: b -diff },
        {lat: a + diff, lng: b +diff },
        {lat: a - diff, lng: b +diff },
    ];

    map =new google.maps.Map(document.getElementById('map'), options);

    var polygon = new google.maps.Polygon({
        map: map,
        paths: PolygonCoordinates,
        strokColor: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.4,
        draggabel: true,
        editable: true
    });

    google.maps.event.addListener(Polygon.getPath(), 'set_at', function(){
        logArray(polygon.getPath());
    });
    google.maps.event.addListener(Polygon.getPath(), 'insert_at', function(){
        logArray(polygon.getPath());
    });

}

function logArray (array){
    var vertices = [];

    for (var i =0; i< array.getLength(); i++){
        vertices.push({
            lat: array.getAt(i).lat(),
            lng: array.getAt(i).lng()
        });
    }

    console.log(vertices);
}
*/


    //SEARCHBAR hinzufügen von Markern
    /*
    var input = document.getElementById('search'); //TODO name von searchbar
    var searchBox= new google.maps.places.searchBox(input);

    var markers =[];

    function getMarker (Ort){
        if(!Ort.geometry)
            return;

        markers.push (new google.maps.Marker({
            map: map,
            title: Ort.name,
            position: Ort.geometry.location
        }));

        if (Ort.geometry.viewport)
            bounds.union(Ort.geometry.viewport);
        else
            bounds.extend(Ort.geometry.location)
    };
    */


    //INFO WINDOW
    /*
    infoWindow = new google.maps.infoWindow;

    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function (p){
            var position ={
            lat: p.coords.latitude,
            lng: p.coords.longitude
                };
            infoWindow.setPosition(position);
            infoWindow.setContent('your location');
            infoWindow.open('map');

        }, function() {
            handelLocationError('Geolocation serice failed', map.center();)
        })
    } else{
        handelLocationError('No geolocation available', map.center);
    }
}


function handelLocationError (content, position){
    infoWindow.setPosition(position);
    infoWindow.setContent(content);
    infoWindow.open(map);
}
*/
