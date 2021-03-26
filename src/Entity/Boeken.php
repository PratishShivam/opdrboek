<?php

namespace App\Entity;

use App\Repository\BoekenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BoekenRepository::class)
 */
class Boeken
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titel;

    /**
     * @ORM\Column(type="integer")
     */
    private $Voorraad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Filiaal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->Titel;
    }

    public function setTitel(string $Titel): self
    {
        $this->Titel = $Titel;

        return $this;
    }

    public function getVoorraad(): ?int
    {
        return $this->Voorraad;
    }

    public function setVoorraad(int $Voorraad): self
    {
        $this->Voorraad = $Voorraad;

        return $this;
    }

    public function getFiliaal(): ?string
    {
        return $this->Filiaal;
    }

    public function setFiliaal(string $Filiaal): self
    {
        $this->Filiaal = $Filiaal;

        return $this;
    }
}
