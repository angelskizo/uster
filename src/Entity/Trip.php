<?php

namespace App\Entity;

use App\Repository\TripRepository;
use Doctrine\DBAL\Types\DateType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: TripRepository::class)]
class Trip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;
    #[ORM\ManyToOne(targetEntity:"Vehicles")]
    #[ORM\JoinColumn(name:"vehicle", referencedColumnName:"id")]
    private ?Vehicles $vehicle;
    #[ORM\ManyToOne(targetEntity:"Drivers")]
    #[ORM\JoinColumn(name:"driver", referencedColumnName:"id")]
    private ?Drivers $driver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicle():?Vehicles
    {
        return $this->vehicle;
    }

    public function setVehicle(?Vehicles $vehicle)
    {
        $this->vehicle = $vehicle;
        
        return $this;
    }

    public function getDriver():?Drivers
    {
        return $this->driver;
    }

    public function setDriver(?Drivers $driver)
    {
        $this->driver = $driver;
        
        return $this;
    }

}
