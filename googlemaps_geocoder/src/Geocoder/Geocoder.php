<?php

namespace Drupal\googlemaps_geocoder\Geocoder;

use Drupal\googlemaps_geocoder\Model\Coordinates;
use Drupal\googlemaps_geocoder\API\GoogleMaps;


class Geocoder {

    /**
     * @var GoogleMaps
     */
    private $googleMaps;

    /**
     * Geocoder constructor.
     * @param GoogleMaps $googleMaps
     */
    public function __construct(GoogleMaps $googleMaps)
    {
        $this->googleMaps = $googleMaps;
    }

    /**
     * @param $address
     * @return Coordinates|null
     */
    public function geocode($address)
    {

        $result = $this->googleMaps->doRequest($address);

        if(!empty($result->results) && !empty($result->results[0])) {
            $latitude = $result->results[0]->geometry->location->lat;
            $longitude = $result->results[0]->geometry->location->lng;

            return new Coordinates($latitude, $longitude);
        }


        return false;
    }

}