<?php

namespace App\Service;

use App\Repository\FlightRepository;

class SearchFlightsService
{
  private FlightRepository $flightRepository;

  public function __construct(
    FlightRepository $flightRepository
  ) {
    $this->flightRepository = $flightRepository;
  }

  public function findRoutes(string $start, string $end): array
  {
    $list = [];
    
    $directs = $this->flightRepository->findDirectFlights($start, $end);

    if (!empty($directs)) {
      $list[] = $directs;
    }

    $fromStart = $this->flightRepository->findStartingFrom($start);
    
    foreach ($fromStart as $firstFlight) {
      $secondFlights = $this->flightRepository->findDirectFlights($firstFlight->getCodeArrival(), $end);

      if (!empty($secondFlights)) {
        foreach ($secondFlights as $secondFlight) {
          $list[] = [
            $firstFlight,
            $secondFlight
          ];
        }
      }
    }

    return $list;
  }
}
