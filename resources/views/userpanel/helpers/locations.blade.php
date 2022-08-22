@extends('userpanel.layout.layout')

@section('content')
    <style>
        .map {
            width: 100% !important;
            height: 470px !important;
            border: 0;
            border-radius: 12px !important;
            margin: 0 !important;
        }
    </style>
    <section>
        <div class="container">
            <div class="row mt-5 mb-2 mapLocation">
                <div class="col-lg-12">
                    <div class="map" id="map"></div>
                </div>
            </div>
            <div class="row showBoxes">
                @foreach ($locations as $location)
                    {{-- {{ dd($location) }} --}}
                    <div class="col-lg-12">
                        <div class="row show-map">
                            <div class="map-text">
                                <div class="text-title d-flex align-items-start">
                                    <h5>{{ $location->country }}</h5>
                                    <span>|</span>
                                    <h5 class="align-self-end">{{ $location->city }}</h5>
                                </div>
                            </div>
                            <div class="show-map-button d-flex align-items-center justify-content-between flex-wrap">
                                <div class="text-desc mb-3">
                                    <span class="ms-4">{{ $location->address }}</span>
                                </div>
                                <button class="ms-4 mb-3" type="button" onclick="selectLocation('{{ $location->latitude }}', '{{ $location->longitude }}' ,'{{ $location->title }}')">
                                    Show on map
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <script>
        var map, infoWindow;
        var geocoder;
        var marker;
        var geo_address = '';

        function geocodeLatLng() {

            geocoder
                .geocode({
                    location: marker.getPosition()
                })
                .then((response) => {
                    if (response.results[0]) {
                        // map.setZoom(11);

                        // const marker = new google.maps.Marker({
                        //   position: latlng,
                        //   map: map,
                        // });

                        infoWindow.setContent(response.results[0].formatted_address);
                        infoWindow.open(map, marker);

                        geo_address = response.results[0].formatted_address;
                        // map.setCenter(marker.getPosition());
                    } else {
                        window.alert("No results found");
                    }
                })
                .catch((e) => window.alert("Geocoder failed due to: " + e));
        }



        function initMap() {
            var myLatlng = new google.maps.LatLng(40, 40);

            geocoder = new google.maps.Geocoder();


            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 40,
                    lng: 40
                },
                zoom: 12.5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            infoWindow = new google.maps.InfoWindow();


            // Place a draggable marker on the map
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: "Drag me!"
            });



            infoWindow.setContent();

            //Go to center
            infoWindow.open(map, marker);

        }


        function selectLocation(lat, lon, name) {

            if (lat == '' && lon == '') {
                return;
            }

            infoWindow.setContent(name);

            marker.setPosition(new google.maps.LatLng(lat, lon));
            infoWindow.open(map, marker);
            map.setCenter(marker.getPosition());



            window.location.href = '#map';

        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBByp1zFwtmhqM3ibxX-oVAVxi2eaYXlbk&callback=initMap">
    </script>
@endsection
