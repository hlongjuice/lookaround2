/**
 * Created by Jubilus on 3/16/2017 AD.
 */

/*Look Around*/
var startLocation=document.getElementById('txtSource');
/*End Look Around*/
var source, destination;
var directionsDisplay= new google.maps.DirectionsRenderer();

var directionsService = new google.maps.DirectionsService();
var lat_start=document.getElementById('txtLatStart');
var lng_start=document.getElementById('txtLngStart');
/*Marker Object*/
var newBuildingMarker=new google.maps.Marker;
var driver_marker=new google.maps.Marker;

/*Icon*/
var home_icon=null;

/**********Set Maps ***********/
/*Main Map*/
var psu = new google.maps.LatLng(7.0062865, 100.4964378);
var mapOptions = {
    zoom: 14,
    center: psu,
    //Remove Business Landmark
    styles:[
        {
            "featureType": "poi.business",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels.text",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        }
    ]
};
/****Create a map and center it on Bangkok*****/
var map;
if(document.getElementById('dvMap')!=null){
    map= new google.maps.Map(document.getElementById('dvMap'), mapOptions);
}
/******End Set Map*******/

/*Location Search Auto Complete*/
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('txtSource'));
    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
});

/*Set Start Location*/
function setStartLocation(){
    var geoCoder=new google.maps.Geocoder();
    var hint=document.getElementById('hint');
    // hint.style.display='block';
    /*Convert Location String to LatLng*/
    geoCoder.geocode({'address':startLocation.value},function(result,status){
        map.setCenter(result[0].geometry.location);//Set Start Location
        map.setZoom(15);
    });
    /*Map Click Event*/
    google.maps.event.addListener(map, 'click', function(event) {
        addBuildingMarker(event.latLng);
    });

}


/*Add Building Marker*/
function addBuildingMarker(location){
    var newBuildingLat=document.getElementById('newBuildingLat');
    var newBuildingLng=document.getElementById('newBuildingLng');
    newBuildingMarker.setMap(null);//remove old marker
    newBuildingMarker.setMap(map);
    newBuildingMarker.setPosition(location);
    newBuildingMarker.setDraggable(true);
    /*Set Lat Lng to Html Input*/
    newBuildingLat.value=location.lat();
    newBuildingLng.value=location.lng();
}

/*If marker dragged*/
newBuildingMarker.addListener('dragend', function () {
    addBuildingMarker(newBuildingMarker.getPosition());
});

/*Show All Building Maker*/
function showAllBuildingMarker(buildings){

    buildings.forEach(function(building){
        var location=new google.maps.LatLng(building.lat,building.lng);
        if(building.image==null){
            building.image="";
        }
        /*Set Building Marker Description*/
        var infoWindow = new google.maps.InfoWindow({
            content: building.description+'<br><img style="margin-top:10px;" src="'+building.image+'">'
        });
        /*Set Marker*/
        console.log(location);
        var marker = new google.maps.Marker({
            position:location,
            map:map
        });
        /*Show Building Description When Clicked */
        marker.addListener('click',function(){
            infoWindow.open(map,marker);
        });
        marker.addListener('dblclick',function () {
            map.setCenter(marker.position);
            map.setZoom(14);
        })
    })
}
/*** GeoLocation ****/
/*Get Current Position by GeoLocation*/
function getCurrentPosition(callback){
    var current_position={};
    document.getElementById('position_loading').style.display='';
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position){
            current_position={
                lat:position.coords.latitude,
                lng:position.coords.longitude
            };
            callback(current_position);
        },onError);
    }
    else{
        alert('ไม่สามารถใช้งานฟังชันนี้ได้')
    }
}
/*Get Source Position*/
function getCurrentSource(){
    getCurrentPosition(function(result){
        if(result){
            document.getElementById('txtSource').value=result.lat+','+result.lng;
            document.getElementById('position_loading').style.display='none';
        }
    });
}

function onError(){
    alert('ไม่สามารถใช้งานฟังชันนี้ได้')
}
/*** End GeoLocation ***/

