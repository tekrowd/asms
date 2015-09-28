<?php
function search_location() {
	$p = 0;
	
	if(isset($_POST['submit'])) {
		$p = 1;
	}
	
	$street = isset($_POST['street']) ? $_POST['street'] : '';
	$city = isset($_POST['city']) ? $_POST['city'] : '';
	$prov = isset($_POST['prov']) ? $_POST['prov'] : '';
	$zip = isset($_POST['zip']) ? $_POST['zip'] : '';
	$county = isset($_POST['county']) ? $_POST['county'] : '';
		
	$address = $street . " " . $city . " " . $prov . " " . $zip . " " . $county;
	
	$Lat	=	"43.858957";
	$Lon	=	"-79.5652928";
	
	$Address = urlencode($address);
	$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
	$xml = simplexml_load_file($request_url) or die("url not loading");
	$status = $xml->status;
	if ($status=="OK") {
		$Lat = $xml->result->geometry->location->lat;
		$Lon = $xml->result->geometry->location->lng;
		$LatLng = "$Lat,$Lon";
	}
	
	echo "<script> var lat = " . $Lat . "; var long = " . $Lon . "; post = " . $p . "; </script>";
}

function check_login() {
	
	//Check to see if login cookie is set
	if(isset($_SESSION['login'])) {
		return true;
	}
	
	//Return False if Not logged in
	return false;	
}
?>