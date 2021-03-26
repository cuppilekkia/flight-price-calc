<?php

namespace App\Repository;

use App\Entity\Flight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Flight|null find($id, $lockMode = null, $lockVersion = null)
 * @method Flight|null findOneBy(array $criteria, array $orderBy = null)
 * @method Flight[]    findAll()
 * @method Flight[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FlightRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Flight::class);
    }

    /**
     * @return Flight[]
     */
    public function findDirectFlights($start, $end): array
    {
        return $this->findBy([
            'code_departure' => $start,
            'code_arrival' => $end,
          ]);
    }

    /**
     * @return Flight[]
     */
    public function findStartingFrom(string $start): array
    {
        return $this->findBy([
            'code_departure' => $start,
        ]);
    }
}
