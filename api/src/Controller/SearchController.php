<?php

namespace App\Controller;

use App\Adapter\SearchPriceAdapter;
use App\Service\SearchFlightsService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    private SearchFlightsService $searchFlightsService;

    private SearchPriceAdapter $searchPriceAdapter;
    
    public function __construct(
        SearchFlightsService $searchFlightsService,
        SearchPriceAdapter $searchPriceAdapter
    ) {
        $this->searchFlightsService = $searchFlightsService;
        $this->searchPriceAdapter = $searchPriceAdapter;
    }
    /**
     * @Route("/search/{start}/{end}", name="search")
     */
    public function index(string $start, string $end): Response
    {
        $list = $this->searchFlightsService->findRoutes($start, $end);
        
        $data = $this->searchPriceAdapter->fromFlightListToResults($list);

        return $this->json($data);
    }
}
