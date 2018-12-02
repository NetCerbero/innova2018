<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 500px;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <title>GabyHelp</title>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color:  #222A59">
        <a class="navbar-brand" href="#" style="color: #FFFFFF;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/UAGRM_Logo_Minimalista_Preciso.png/180px-UAGRM_Logo_Minimalista_Preciso.png" width="30" height="30" class="d-inline-block align-top" alt="">
            UAGRM
        </a>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="..." aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div id="map"></div>
            </div>

           
        </div>
        <br>
        <h3 style="text-align: center">Proximos Eventos</h3>
        <br>
        
        <div class="row">
            <iframe
    allow="microphone;"
    width="350"
    height="430"
    src="https://console.dialogflow.com/api-client/demo/embedded/03804ec7-75bc-4113-ad7c-b7dc7ba77d4b">
</iframe>
        </div>
    </div>

    <script type='text/javascript'>
                @php
                    echo "var neighborhoods= $locations;\n"
                @endphp
        var markers = [];
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: {lat: -17.7755398, lng: -63.1959845},
                styles:[
                    {
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]

            });
            for (var i = 0; i < neighborhoods.length; i++) {
                //alert(JSON.stringify(neighborhoods[i].icon));
                addMarkerWithTimeout(convertToFloat(neighborhoods[i]), i * 200, neighborhoods[i].icon, neighborhoods[i], i);
            }
        }

        function convertToFloat( latlon){

            var myLatlng = new google.maps.LatLng(parseFloat(latlon.lat),parseFloat(latlon.lng));

            return myLatlng;

        }



        function addMarkerWithTimeout(position, timeout, icon, objeto ,puntero) {

            var icon2 = {
                url: icon, // url
                scaledSize: new google.maps.Size(50, 50), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var contenido = "<div style='text-align:center'><h3 style=' font-size: 20px'>" + objeto.name + "</h3><p style='text-align:justify'>" + objeto.descripcion+ "</p><a target='_blank' style=' font-size:20px' href='"+objeto.url+"'><strong>Obtener Direccion</strong></a><img src=\""+objeto.photo+"\" height='300px'; width='100%'></div>";
            var infowindow = new google.maps.InfoWindow({
                content: contenido
            });
            var marker = new google.maps.Marker({
                position: position,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: icon2
            });


            window.setTimeout(function() {
                markers.push(marker);
                // Add info window to marker
                google.maps.event.addListener(marker, 'click', (function(marker, puntero) {
                    return function() {
                        infowindow.close();
                        infowindow.setContent(infowindow.content);
                        infowindow.open(map, marker);
                    }
                })(marker, puntero));


            }, timeout);
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOX_dLJgyMhwjvLLxA6QQtXn8PuaNYGYI&callback=initMap">
    </script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>