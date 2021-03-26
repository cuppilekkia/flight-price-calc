<?php

namespace App\Adapter;

use App\Entity\Flight;
use App\Repository\AirportRepository;

class SearchPriceAdapter
{
  private AirportRepository $airportRepository;

  public function __construct(
    AirportRepository $airportRepository
  ) {
    $this->airportRepository = $airportRepository;
  }

  public function fromFlightListToResults(array $list)
  {
    $result = array_map(function (array $flights) {
      $totalPrice = $this->calculatePrice($flights);

      $decoratedFlights = $this->decorateFlights($flights);

      return [
        'totalPrice' => $totalPrice,
        'stopover' => count($flights) - 1,
        'flights' => $decoratedFlights,
      ];
    }, $list);

    return $result;
  }
  

  private function calculatePrice(array $flights): int
  {
    return array_reduce($flights, function($price, Flight $flight){
      $price += $flight->getPrice();

      return $price;
    }, 0);

  }

  private function decorateFlights(array $flights): array
  {
    return array_map(function (Flight $flight) {
      $nameDeparture = $this->airportRepository->findOneBy(['code' => $flight->getCodeDeparture()])->getName();
      $nameArrival = $this->airportRepository->findOneBy(['code' => $flight->getCodeArrival()])->getName();

      return [
        'codeDeparture' => $flight->getCodeDeparture(),
        'codeArrival' => $flight->getCodeArrival(),
        'price' => $flight->getPrice(),
        'nameDeparture' => $nameDeparture,
        'nameArrival' => $nameArrival,
      ];
    }, $flights);
  }
}
