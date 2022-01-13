<?php

namespace App\Entity;

use App\Repository\LignePrescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LignePrescriptionRepository::class)
 */
class LignePrescription
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
    private $posologie;

    /**
     * @ORM\ManyToOne(targetEntity=Ordonnance::class, inversedBy="lignePrescriptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $numeroOrdre;

    /**
     * @ORM\ManyToOne(targetEntity=Medicament::class, inversedBy="lignePrescriptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $denomination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getNumeroOrdre(): ?Ordonnance
    {
        return $this->numeroOrdre;
    }

    public function setNumeroOrdre(?Ordonnance $numeroOrdre): self
    {
        $this->numeroOrdre = $numeroOrdre;

        return $this;
    }

    public function getDenomination(): ?Medicament
    {
        return $this->denomination;
    }

    public function setDenomination(?Medicament $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }
}
