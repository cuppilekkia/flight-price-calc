<?php

namespace App\Controller;

use App\Repository\FlightRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FlightController extends AbstractController
{
    /**
     * @Route("/flights", name="flights")
     */
    public function index(FlightRepository $flightRepository): Response
    {
        $data = $flightRepository->findAll();

        return $this->json($data);
    }
}
