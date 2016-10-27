<?php
// address to map
  $map_address = "Los Angeles, CA";
$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($map_address);
$lat_long = get_object_vars(json_decode(file_get_contents($url)));
// pick out what we need (lat,lng)
$toRet = array($lat_long['results'][0]->geometry->location->lat, $lat_long['results'][0]->geometry->location->lng);
  print_r( $toRet);
?>
