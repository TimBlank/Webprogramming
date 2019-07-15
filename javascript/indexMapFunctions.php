<script>
    function createLocation(longitude, latitude) {
        var location = {
            lat: latitude,
            lng: longitude
        };
        return location;
    }

    function initMap(location, entryId) {
                var map = new google.maps.Map(document.getElementById("minimap" + entryId), {
                    zoom: 16,
                    center: location,
                    draggable: false,
                    disableDefaultUI: true
                });

                return map;
    }

    function addMarker(location, map, entryId, entryName) {
        var marker = new google.maps.Marker({
            position: location,
            label: entryName,
            map: map
        });
        map.addListener('center_changed', function() {
            window.setTimeout(function() {
                map.panTo(marker.getPosition());
            }, 3000);
        });

        marker.addListener('click', function() {
            window.location = "entryPage.php?EntryID=" + entryId;
        });
    }
    //Quelle: https://developers.google.com/maps/documentation/android-sdk/marker

</script>
