/**
 * Created by Jubilus on 3/16/2017 AD.
 */
var source, destination;
var directionsDisplay= new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();
var lat_start=document.getElementById('txtLatStart');
var lng_start=document.getElementById('txtLngStart');
var result_weight=document.getElementById('result_weight');
var result_distance=document.getElementById('distance');
var result_current_distance=document.getElementById('current_distance');
var result_total_price=document.getElementById('total_price');
/*Marker Object*/
var driver_marker=new google.maps.Marker;
var driver_marker_move=true;
var destination_marker= new google.maps.Marker();
var destination_marker_move=true;
var sender_marker=new google.maps.Marker();
var p2_driver_marker=new google.maps.Marker();
var p2_driver_marker_move=true;
var p2_sender_marker=new google.maps.Marker();
/*Icon*/
var home_icon=null;
var driver_icon=null;
var package_icon=null;
var p1_driver_icon=null;
var p2_driver_icon=null;
var start_price=0;

/*Main Map*/
var bangkok = new google.maps.LatLng(13.7251097, 100.3529072);
var mapOptions = {
    zoom: 7,
    center: bangkok
};
/****Create a map and center it on Bangkok*****/
var map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
/*Location Search Auto Complete*/
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('txtSource'));
    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
});

/*Show Route*/
function getRoute(){

    //directionsDisplay.setMap(map);
    //*********DIRECTIONS AND ROUTE**********************//
    source = document.getElementById("txtSource").value;
    destination = document.getElementById("txtDestination").value;

    var request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };//Route request
    /*Display Route*/
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setOptions({
                suppressMarkers:true
                //draggable:true
            });
            directionsDisplay.setDirections(response);//set directions on map
            directionsDisplay.setMap(map);
            var position=response.routes[0].legs[0];

            destination_marker.setMap(null);
            destination_marker.setMap(map);
            destination_marker.setPosition(position.end_location);
            destination_marker.setIcon(home_icon);
            destination_marker.setDraggable(destination_marker_move);

            driver_marker.setMap(null);
            driver_marker.setMap(map);
            driver_marker.setPosition(position.start_location);
            driver_marker.setIcon(driver_icon);
            driver_marker.setDraggable(driver_marker_move);
            calculatePrice();
        }
        else {
            driver_marker.setPosition(null);
            alert("Unable to find the distance via road.");
        }
        /*Get way point for driver position*/
        //getWayPoints(response);
    });
}
/*Destination Marker Changed Event*/
destination_marker.addListener('dragend',function(){
    document.getElementById('txtSource').value=driver_marker.getPosition().lat()+','+driver_marker.getPosition().lng();
    document.getElementById('txtDestination').value=destination_marker.getPosition().lat()+','+destination_marker.getPosition().lng();
    getRoute()

});
/*Driver Marker Changed Event*/
driver_marker.addListener('dragend',function(){
    document.getElementById('txtSource').value=driver_marker.getPosition().lat()+','+driver_marker.getPosition().lng();
    document.getElementById('txtDestination').value=destination_marker.getPosition().lat()+','+destination_marker.getPosition().lng();
    console.log(driver_marker.getPosition().lat());
    getRoute()
});

/*Calculate Price*/
function calculatePrice(){
    var direction=directionsDisplay.getDirections();
    var destination=direction.routes[0].legs[0].end_address;
    var result_lat_start=document.getElementById("lat_start");
    var result_lng_start=document.getElementById('lng_start');
    var result_lat_end=document.getElementById('lat_end');
    var result_lng_end=document.getElementById('lng_end');


    //document.getElementById('txtSource').value=direction.routes[0].legs[0].start_address;
    //document.getElementById('txtDestination').value=direction.routes[0].legs[0].end_address;

    /*Result of LatLng*/
    result_lat_start.value=direction.routes[0].legs[0].start_location.lat();
    result_lng_start.value=direction.routes[0].legs[0].start_location.lng();
    result_lat_end.value=direction.routes[0].legs[0].end_location.lat();
    result_lng_end.value=direction.routes[0].legs[0].end_location.lng();

    calDistance();
    //*********DISTANCE AND DURATION**********************//
    function calDistance(){

        var service = new google.maps.DistanceMatrixService();
        //var current_position=direction.routes[0].legs[0].start_address;
        //console.log(direction);
        var current_position=direction.routes[0].legs[0].start_location;
        var start_position="";

        if(lat_start ==null && lng_start == null){
            start_position=current_position;
        }
        else{
            start_position=new google.maps.LatLng(lat_start.value,lng_start.value);
        }
        service.getDistanceMatrix({
            origins:[start_position,current_position],
            destinations:[destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function (response, status) {
            console.log(start_position);
            console.log(current_position);
            if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                var distance = response.rows[0].elements[0].distance.text;
                var curent_distance=response.rows[1].elements[0].distance.text;
                var duration = response.rows[0].elements[0].duration.text;
                var dvDistance = document.getElementById("dvDistance");
                var distance_price=distance_per_price*parseFloat(distance);
                var weight_price=weight_per_price*document.getElementById("weight").value;
                var total_price=distance_price+weight_price+parseFloat(start_price);

                /*Calculate Result*/
                result_distance.value=distance;
                //result_distance_price.value=distance_price;
                result_weight.value=document.getElementById("weight").value;
                result_total_price.value=total_price;
                if(result_current_distance != null)
                {
                    result_current_distance.value=curent_distance;
                }
            }
            else {
                alert("Unable to find the distance via road.");
            }
        });
    }

}
/*Route After Submit*/
function getCurrentlyRoute(){
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': false });
    //directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
    getRoute();
}

/*Driver Function*/
function showSenderLocationMap() {
    var p1_driver_marker=new google.maps.Marker();
    var sender_place = new google.maps.LatLng(lat_start.value, lng_start.value);
    var mapOptions = {
        zoom: 15,
        center: sender_place
    };
    /****Create a map and center it on Sender Place*****/
    var sender_map = new google.maps.Map(document.getElementById('senderLocationMap'), mapOptions);
    sender_marker.setMap(sender_map);
    sender_marker.setPosition(sender_place);
    sender_marker.setIcon(package_icon);

    google.maps.event.addListener(sender_map, 'click', function(event) {
        addDriverMarker(event.latLng);
    });

    /*Add Driver Position Marker*/
    function addDriverMarker(location){
        var driver_position_lat=document.getElementById('driver_position_lat');
        var driver_position_lng=document.getElementById('driver_position_lng');
        p1_driver_marker.setMap(null);//remove old marker
        p1_driver_marker.setMap(sender_map);
        p1_driver_marker.setPosition(location);
        p1_driver_marker.setIcon(p1_driver_icon);
        p1_driver_marker.setDraggable(true);
        driver_position_lat.value=location.lat();
        driver_position_lng.value=location.lng();
    }
    /*If marker dragged*/
    p1_driver_marker.addListener('dragend', function () {
        addDriverMarker(p1_driver_marker.getPosition());
    });
}

/*Currently Driver Position in Process Two*/
function getProcessTwoRoute(){
    var input_origin=document.getElementById('input_origin').value;
    var input_destination=document.getElementById('input_destination').value;
    var p2_map = new google.maps.Map(document.getElementById('processTwoMap'),mapOptions);
    var directionsService=new google.maps.DirectionsService();
    var directionsDisplay=new google.maps.DirectionsRenderer();
    var request={
        origin:input_origin,
        destination:input_destination,
        travelMode: google.maps.TravelMode.DRIVING

    };
    directionsService.route(request, function (response,status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setMap(p2_map);
            directionsDisplay.setOptions({
                suppressMarkers:true
            });
            directionsDisplay.setDirections(response);
            var position=response.routes[0].legs[0];

            p2_sender_marker.setMap(null);
            p2_sender_marker.setMap(p2_map);
            p2_sender_marker.setPosition(position.end_location);
            p2_sender_marker.setIcon(package_icon);
            p2_sender_marker.setDraggable(false);

            p2_driver_marker.setMap(null);
            p2_driver_marker.setMap(p2_map);
            p2_driver_marker.setPosition(position.start_location);
            p2_driver_marker.setIcon(p2_driver_icon);
            p2_driver_marker.setDraggable(p2_driver_marker_move);
        }
    })
}

/*P2 Driver Marker Changed Event*/
p2_driver_marker.addListener('dragend',function(e){
    console.log(e.latLng.lat());
    document.getElementById('input_origin').value= e.latLng.lat()+','+e.latLng.lng();
    document.getElementById('driver_position_lat').value= e.latLng.lat();
    document.getElementById('driver_position_lng').value= e.latLng.lng();
    getProcessTwoRoute();
});

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
}
