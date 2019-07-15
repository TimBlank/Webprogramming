<script>
    function initMap() {
        var entryName = $(".entryName").text();
        var location = {
            lat: parseFloat($(".latitude").text().replace(",", ".")),
            lng: parseFloat($(".longitude").text().replace(",", "."))

            //TODO die werte aus Datenbank

            /*lat: ?php echo $content->getLatitude(); ?> ,
            lng= ?php echo $content->getLongitude(); ?>*/

        };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: location
        });
        // Add a marker at the center of the map.
        addMarker(location, map, entryName);
    }

    // Adds a marker to the map.
    function addMarker(location, map, label) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
            position: location,
            label: label,
            map: map
        });




        map.addListener('center_changed', function() {
            // 3 seconds after the center of the map has changed, pan back to the
            // marker.
            window.setTimeout(function() {
                map.panTo(marker.getPosition());
            }, 3000);
        });

    }

</script>
<script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap ">
</script>
