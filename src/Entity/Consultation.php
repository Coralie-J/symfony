<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeure;

    /**
     * @ORM\ManyToOne(targetEntity=Medecin::class, inversedBy="consultations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matricule;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="consultations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $NumSS;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTimeInterface $dateHeure): self
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getMatricule(): ?Medecin
    {
        return $this->matricule;
    }

    public function setMatricule(?Medecin $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNumSS(): ?Patient
    {
        return $this->NumSS;
    }

    public function setNumSS(?Patient $NumSS): self
    {
        $this->NumSS = $NumSS;

        return $this;
    }
}
