    <script>
        var map = null;
        var marker = null;

        function changeInputCoordinates(longitude, latitude) {
            document.getElementById("longitude").value = longitude;
            document.getElementById("latitude").value = latitude;
        }

        function getPosition() {
            if (navigator.geolocation) {
                var options = {
                    enableHighAccuracy: true
                }
                navigator.geolocation.getCurrentPosition(showPosition, showError, options);
            } else {
                alert('Browser unterstützt kein Geolocation.');
            }
        }

        function showPosition(position) {
            var longitude = position.coords.longitude;
            var latitude = position.coords.latitude;
            showOldPosition(longitude, latitude);
        }

        function showOldPosition(longitude, latitude) {
            changeInputCoordinates(longitude, latitude);
            var latlng = new google.maps.LatLng(latitude, longitude);
            if (map !== null) {
                map.panTo(latlng);
                addMarker(latlng, map);
            }
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert('Abfrage ihrer Geoposition ist untersagt.');
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert('Keine Geopositionsdaten verfügbar.');
                    break;
                case error.TIMEOUT:
                    alert('Timeout überschritten.');
                    break;
                default:
                    alert('Fehler: ' + error.message + ')');
            }

        }

        function initMap() {
            var latlng = new google.maps.LatLng(53.147294, 8.180886);
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: latlng
            });
            // This event listener calls addMarker() when the map is clicked.
            google.maps.event.addListener(map, 'click', function(event) {
                addMarker(event.latLng, map);
            });
        }

        // Adds a marker to the map.
        function addMarker(location, map) {
            // Add the marker at the clicked location, and add the next-available label
            // from the array of alphabetical characters.
            changeInputCoordinates(location.lng(), location.lat());
            if (marker == null) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
                google.maps.event.addListener(marker, 'dragend', function() {
                    changeInputCoordinates(marker.getPosition().lng(), marker.getPosition().lat());
                });
            } else {
                marker.setPosition(location);
            };
        }

    </script>
    <script async defer src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6fPCUYbyDko0vrNu4vZvR_Yz5jVNvik&callback=initMap ">
    </script>
