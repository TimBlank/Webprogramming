<script>
    function initMap() {
        var location = {
            lat: parseFloat($(".option.latitude").text().replace(",", ".")),
            lng: parseFloat($(".option.longitude").text().replace(",", "."))
        };


        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: parseInt($(".option.zoom").text()),
            center: location,

        });
        var label = "uni";
        // Add a markers for every entry.
        $('.entry').each(function() {
            var entryId = this.id;
            var entryName = $(".entryName", this).text();
            var longitude = parseFloat($(".longitude", this).text().replace(",", "."));
            var latitude = parseFloat($(".latitude", this).text().replace(",", "."));
            var latlng = new google.maps.LatLng(latitude, longitude);
            addMarker(latlng, map, entryId, entryName);
        });

    }

    // Adds a marker to the map.
    function addMarker(location, map, entryId, entryName) {
        var marker = new google.maps.Marker({
            position: location,
            label: entryName,
            //label: content.getName(),
            map: map
        });


        marker.addListener('click', function() {
            window.location = "entryPage.php?EntryID=" + entryId;
        });
    }

</script>
<script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap "></script>
