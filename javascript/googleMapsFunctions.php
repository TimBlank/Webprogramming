<script>
    // TODO mehrere Karten auf der Seite

    function createLocation(longitude, latitude) {
        var location = {
            lat: latitude,
            lng: longitude
        };
        return location;
    }

    function initMap(location, mapElement) {

        var map = new google.maps.Map(mapElement, {
            zoom: 16,
            center: location,
            draggable: false,
            disableDefaultUI: true
        });

        return map;
    }

    // Adds a marker to the map.
    function addMarker(location, map, entryId, entryName) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
            position: location,
            label: entryName,
            //label: content.getName(),
            map: map
        });




        map.addListener('center_changed', function() {
            // 3 seconds after the center of the map has changed, pan back to the
            // marker.
            window.setTimeout(function() {
                map.panTo(marker.getPosition());
            }, 3000);
        });

        marker.addListener('click', function() {
            window.location = "entryPage.php?EntryID=" + entryId;
        });



    }

</script>
<script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap ">
</script>
