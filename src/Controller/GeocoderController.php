<?php

namespace Drupal\googlemaps_geocoder\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\googlemaps_geocoder\Geocoder\Geocoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GeocoderController extends ControllerBase {
    /**
     * @var Geocoder
     */
    private $geocoder;

    public function __construct(Geocoder $geocoder) {
        $this->geocoder = $geocoder;
    }

    public function getAction(RouteMatchInterface $routeMatch, Request $request) {
        $address = $request->get('address');

        $coords = $this->geocoder->geocode($address);

        if($coords !== false) {
            return new JsonResponse([
                'latitude' => $coords->getLatitude(),
                'longitude' => $coords->getLongitude()
            ], 200);
        }

        return new JsonResponse(['message' => $this->t('Could not get coords from this address.')->render()], 404);
    }

    public static function create(ContainerInterface $container) {
        return new static(
            $container->get('googlemaps_geocoder.geocoder')
        );
    }
}