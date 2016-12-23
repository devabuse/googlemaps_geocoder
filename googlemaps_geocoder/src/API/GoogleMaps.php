<?php

namespace Drupal\googlemaps_geocoder\API;

use Drupal\googlemaps_geocoder\API\Credentials;
use GuzzleHttp\Client;

class GoogleMaps {

    /**
     * @var Credentials
     */
    private $credentials;
    /**
     * @var Client
     */
    private $client;

    /**
     * GoogleMaps constructor.
     *
     * @param Credentials $credentials
     * @param Client $client
     */
    public function __construct(Credentials $credentials, Client $client) {
        $this->credentials = $credentials;
        $this->client = $client;
    }

    /**
     * Perform request to google geocoder api
     *
     * @param string $address
     *
     * @return mixed
     */
    public function doRequest($address)
    {
        $params = [
            'address' => $address,
            'key' => $this->credentials->getKey(),
            'region' => 'nl',
        ];

        $url = $this->credentials->getUrl() . '?' . http_build_query($params);

        $request = $this->client->get($url);

        return json_decode($request->getBody());
    }
}