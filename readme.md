# Usage

This module creates services for use in other modules to connect with the google geocoder API. It also enables a route and permission that returns coords.

## installation
git clone https://github.com/devabuse/googlemaps_geocoder
 
 ## settings.local.php
 
 You need to set the following:
 
 ```
// url of the geocoder service
$settings['googlemaps_geocoder.url'] = 'https://maps.googleapis.com/maps/api/geocode/json';
 
// a valid API key
$settings['googlemaps_geocoder.key'] = ''; 
 ```