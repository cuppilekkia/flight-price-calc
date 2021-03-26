<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $code_departure;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $code_arrival;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeDeparture(): ?string
    {
        return $this->code_departure;
    }

    public function setCodeDeparture(string $code_departure): self
    {
        $this->code_departure = $code_departure;

        return $this;
    }

    public function getCodeArrival(): ?string
    {
        return $this->code_arrival;
    }

    public function setCodeArrival(string $code_arrival): self
    {
        $this->code_arrival = $code_arrival;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
