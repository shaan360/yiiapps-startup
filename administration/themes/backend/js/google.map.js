var initialLocation;
var browserSupportFlag =  new Boolean();
var map;
var geocoder;
var markersArray = [];

function init()
{
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    geocoder = new google.maps.Geocoder();
	
    google.maps.event.addListener(map, 'click', function( event ) {
        drawMarker( event.latLng , 1);
    })
}

function detectUserLocation()
{
    // Try W3C Geolocation (Preferred)
    if(navigator.geolocation) {
        browserSupportFlag = true;
        navigator.geolocation.getCurrentPosition(function(position) {
            initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
            map.setCenter(initialLocation);
		  
            drawMarker( initialLocation );
	      
        }, function() {
            //handleNoGeolocation(browserSupportFlag);
            });
    // Try Google Gears Geolocation
    } else if (google.gears) {
        browserSupportFlag = true;
        var geo = google.gears.factory.create('beta.geolocation');
        geo.getCurrentPosition(function(position) {
            initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
            map.setCenter(initialLocation);
        }, function() {
            //handleNoGeoLocation(browserSupportFlag);
            });
    // Browser doesn't support Geolocation
    } else {
    //browserSupportFlag = false;
    //handleNoGeolocation(browserSupportFlag);
    }	
}

function drawMarker( _location , _fill ){
    deleteAllMarkers();
    marker = new google.maps.Marker({
        map: map,
        draggable:true,
        position: _location
    });
    markersArray.push(marker);
    if(_fill){
        geocoder.geocode( {
            'location':_location
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $('#address').val( results[0].formatted_address );
                $('#lat').val(results[0].geometry.location.lat());
                $('#lon').val(results[0].geometry.location.lng());
                for (i=0;i<results[0].address_components.length;i++){
                    for (j=0;j<results[0].address_components[i].types.length;j++){
                        if(results[0].address_components[i].types[j]=="country")
                            $('#country').val(results[0].address_components[i].long_name);
                    }
                }
                for (i=0;i<results[0].address_components.length;i++){
                    for (j=0;j<results[0].address_components[i].types.length;j++){
                        if(results[0].address_components[i].types[j]=="locality")
                            $('#city').val(results[0].address_components[i].long_name);
                    }
                }
                for (i=0;i<results[0].address_components.length;i++){
                    for (j=0;j<results[0].address_components[i].types.length;j++){
                        if(results[0].address_components[i].types[j]=="administrative_area_level_1")
                            $('#state').val(results[0].address_components[i].long_name);
                    }
                }
                for (i=0;i<results[0].address_components.length;i++){
                        if(results[0].address_components[i].postal_code)
                            $('#zip').val(results[0].address_components[i].long_name);
                }
            } else {
            //ups something is wrong do nothing
            }
        });	
    }
}

function deleteAllMarkers(){
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }
}

function drawAddressInfo( _address )
{
    geocoder.geocode( {
        'address': _address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            drawMarker( results[0].geometry.location, 1 );
        } else {
        //ups something is wrong do nothing
        }
    });
}

$(document).ready(function(){
    init();
    if(window.opener){
		
        location_name = window.opener.$('#Ad_location_id option:selected').text().trim();
        location_id = window.opener.$('#Ad_location_id').val();
        if(location_name && location_id != 0){
            drawAddressInfo( location_name );
        } else {
            detectUserLocation();
        }

        $('#location_find').click(function(){
            location_address = $("#address").val().trim();
            if(location_address){
                drawAddressInfo(location_address);
            }
            return false;
        });
		
        $('#location_ok').click(function(){
            selected_address = $('#address').val().trim();
            selected_address_lat = $('#lat').val().trim();
            selected_address_lon = $('#lon').val().trim();
            selected_country = $('#country').val().trim();
            selected_city = $('#city').val().trim();
            selected_state = $('#state').val().trim();
            selected_zip = $('#zip').val().trim();
            if(selected_address && selected_address_lat){
                window.opener.$('#address').val(selected_address);
                window.opener.$('#lat').val(selected_address_lat);
                window.opener.$('#lon').val(selected_address_lon);
                window.opener.$('#country').val(selected_country);
                window.opener.$('#city').val(selected_city);
                window.opener.$('#state').val(selected_state);
                window.opener.$('#zip').val(selected_zip);
             
                

                window.close();
            }
        });
    }
	
});