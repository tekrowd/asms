//<![CDATA[
var map;
var markers = [];
var a = 0;
// Center Map on Client

var center = new google.maps.LatLng(lat,long);

var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
 
function init() {
		 
	if (post == 1) {
		var mapOptions = {
			zoom: 10,		
			center: center,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
	} else {
		var mapOptions = {
			zoom: 10,		
			center: center,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
	}
	 
	map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
	
	if(post == 1) {
		
		var street = document.getElementById("street").value;
		var street2 = document.getElementById("street_2").value;
		var city = document.getElementById("city").value;
		var prov = document.getElementById("province").value;
		var postal = document.getElementById("postal_code").value;
		var country = document.getElementById("country").value;
		
		var address = street + " " + street2 + "<br>" + city + ", " + prov + "<br>" + postal + " " + country;
		
		var loc = {lat:lat,lng:long,address:address};
		displaySearched(loc);
	}
	getMarkers();
}

function getMarkers() {
	makeRequest('includes/get_locations.php', function(data) {
	 
		var data = JSON.parse(data.responseText);
		 
		for (var i = 0; i < data.length; i++) {
			displayLocation(data[i]);
		}
		
		updateDistance();
		
		document.getElementById("itp_found").innerHTML = data.length;
	});
}

function makeRequest(url, callback) {
    var request;

    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
			callback(request);
        }
    }

    request.open("GET", url, true);
    request.send();
}

function displayLocation(location) {
	
	if (location.status == 'AVAILABLE') {
		var image = "http://maps.google.com/mapfiles/ms/micons/green-dot.png";
	} else {
		var image = "http://maps.google.com/mapfiles/ms/micons/red-dot.png";
	}
	    
	var content =   '<div class="infoWindow"><strong>'+location.name+'</strong>'
					+ '<br/>Status: <strong>'+location.status+'</strong>'
                    + '<br/>'+location.address
                    + '<br/>'+location.type 
					+ '<br/><a href="#" onclick="javascript:getTechDetails('+location.id+');" class="get_tech_details">Technician Details</a>'
					+ '</div>';
     
	if (parseInt(location.lat) == 0) {
        geocoder.geocode( { 'address': location.address }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                 
                var marker = new google.maps.Marker({
                    map: map, 
                    position: results[0].geometry.location,
                    title: location.name,
					icon: image,
					id: location.id
                });
                 
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                });
            }
        });
    } else {

        var position = new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.lng));
        var marker = new google.maps.Marker({
            map: map, 
            position: position,
            title: location.name,
			icon: image,
			id: location.id
        });
         
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(content);
            infowindow.open(map,marker);
        });
    }
	markers[a] = marker;
	a++;
}
function displaySearched(location) {
	
	var image = "http://maps.google.com/mapfiles/ms/micons/flag.png";
		
	var content =   '<div class="infoWindow">' + location.address + '</div>';

	var position = new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.lng));
	var marker = new google.maps.Marker({
		map: map, 
		position: position,
		title: location.name,
		icon: image,
	});
		 
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent(content);
		infowindow.open(map,marker);
	});
	clientLocation = marker;
}
function updateMarkers() {
	
	//var oldCount = document.getElementById("itp_found").innerHTML;
	
	//alert(oldCount);
	
	for(var i=0; i < markers.length; i++){
        markers[i].setMap(null);
    }
	a = 0;
	getMarkers();
	updateDistance();	
}

function updateDistance ()  {

	var service = new google.maps.DistanceMatrixService();
	cloc = new google.maps.LatLng(clientLocation.position['A'], clientLocation.position['F']);	
	var destination = [];
	
	for(var i=0; i < markers.length; i++){
		destination.push(new google.maps.LatLng(markers[i].position['A'], markers[i].position['F']));
	}
			
	service.getDistanceMatrix({
		origins: [cloc],
		destinations: destination,
		travelMode: google.maps.TravelMode.DRIVING,
	unitSystem: google.maps.UnitSystem.METRIC,
	avoidHighways: false,
	avoidTolls: false
	}, callback);
}

function callback(response, status) {
	if (status != google.maps.DistanceMatrixStatus.OK) {
		console.log('Error was: ' + status);
	} else {

		var origins = response.originAddresses;
	    var destinations = response.destinationAddresses;
		for (var i = 0; i < origins.length; i++) {
			var results = response.rows[i].elements;
			for (var j = 0; j < results.length; j++) {
				document.getElementById('distance-from-'+markers[j].id).innerHTML = results[j].distance.text;
				document.getElementById('time-from-'+markers[j].id).innerHTML = results[j].duration.text;
			}
		}
	}
}

//]]>