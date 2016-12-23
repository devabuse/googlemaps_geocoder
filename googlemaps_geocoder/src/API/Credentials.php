<?php

namespace Drupal\googlemaps_geocoder\API;

use Drupal\Core\Site\Settings;

class Credentials {

    /**
     * @var Settings
     */
    private $settings;

    /**
     * Credentials constructor.
     * @param Settings $settings
     */
    public function __construct(Settings $settings) {
        $this->settings = $settings;
    }

    /**
     * Return URL string from settings file
     *
     * @return string
     */
    public function getUrl() {
        return $this->settings->get('googlemaps_geocoder.url');
    }

    /**
     * Return API KEY string from settings file
     *
     * @return string
     */
    public function getKey(){
        return $this->settings->get('googlemaps_geocoder.key');
    }

}