<?php

namespace App\Entity;

use App\Repository\SuppliesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuppliesRepository::class)]
class Supplies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $metal = null;

    #[ORM\Column]
    private ?int $cristal = null;

    #[ORM\Column]
    private ?int $deuterium = null;

    #[ORM\Column]
    private ?int $userId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetal(): ?int
    {
        return $this->metal;
    }

    public function setMetal(int $metal): self
    {
        $this->metal = $metal;

        return $this;
    }

    public function getCristal(): ?int
    {
        return $this->cristal;
    }

    public function setCristal(int $cristal): self
    {
        $this->cristal = $cristal;

        return $this;
    }

    public function getDeuterium(): ?int
    {
        return $this->deuterium;
    }

    public function setDeuterium(int $deuterium): self
    {
        $this->deuterium = $deuterium;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
