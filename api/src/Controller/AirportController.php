<?php

namespace App\Controller;

use App\Repository\AirportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AirportController extends AbstractController
{
  /**
   * @Route("/airports", name="airports")
   */
  public function index(AirportRepository $airportRepository): Response
  {
    $data = $airportRepository->findAll();

    return $this->json($data);
  }
}
