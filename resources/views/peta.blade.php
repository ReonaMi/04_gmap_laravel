<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gmap - Laravel</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEwj5R5dEdiM4XLhRIuD8If83nFm3roE4&callback=initMap"
      defer
    ></script>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
        height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
        height: 100%;
        margin: 0;
        padding: 0;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
        let map;

        function initMap(){
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: { lat:-6.886497, lng: 112.008156  },
            });

            let data;

            @foreach($peta as $item)

                data = {!! $item->geojson !!};
                
                map.data.addGeoJson(data);

            @endforeach

            map.data.setStyle(function(feature){
                let color = feature.getProperty('color');
                return {
                    fillColor: color,
                    strokeWeight: 1
                }
            });

            let infoWindow = new google.maps.InfoWindow();

            map.data.addListener('click', function(event){
                let namaKecamatan = event.feature.getProperty('description');
                infoWindow.setContent(namaKecamatan);
                infoWindow.setPosition(event.latLng);
                infoWindow.open(map);
            });
        }
    </script>
</body>
</html>