<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $instrumentCours = null;

    #[ORM\Column(length: 50)]
    private ?string $jourCours = null;

    #[ORM\Column(length: 10)]
    private ?string $heureDebutCours = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $heureFinCours = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuCours = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $publicCours = null;

    #[ORM\Column(length: 255)]
    private ?string $villeCours = null;

    #[ORM\ManyToOne(inversedBy: 'cours')]
    private ?Prof $idProf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstrumentCours(): ?string
    {
        return $this->instrumentCours;
    }

    public function setInstrumentCours(string $instrumentCours): self
    {
        $this->instrumentCours = $instrumentCours;

        return $this;
    }

    public function getJourCours(): ?string
    {
        return $this->jourCours;
    }

    public function setJourCours(string $jourCours): self
    {
        $this->jourCours = $jourCours;

        return $this;
    }

    public function getHeureDebutCours(): ?string
    {
        return $this->heureDebutCours;
    }

    public function setHeureDebutCours(string $heureDebutCours): self
    {
        $this->heureDebutCours = $heureDebutCours;

        return $this;
    }

    public function getHeureFinCours(): ?string
    {
        return $this->heureFinCours;
    }

    public function setHeureFinCours(?string $heureFinCours): self
    {
        $this->heureFinCours = $heureFinCours;

        return $this;
    }

    public function getLieuCours(): ?string
    {
        return $this->lieuCours;
    }

    public function setLieuCours(string $lieuCours): self
    {
        $this->lieuCours = $lieuCours;

        return $this;
    }

    public function getPublicCours(): ?string
    {
        return $this->publicCours;
    }

    public function setPublicCours(?string $publicCours): self
    {
        $this->publicCours = $publicCours;

        return $this;
    }

    public function getVilleCours(): ?string
    {
        return $this->villeCours;
    }

    public function setVilleCours(string $villeCours): self
    {
        $this->villeCours = $villeCours;

        return $this;
    }

    public function getIdProf(): ?Prof
    {
        return $this->idProf;
    }

    public function setIdProf(?Prof $idProf): self
    {
        $this->idProf = $idProf;

        return $this;
    }
}
