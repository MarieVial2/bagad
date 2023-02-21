<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEvenement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEvenement = null;

    #[ORM\Column(length: 10)]
    private ?string $heureDebutEvenement = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $heureFinEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoEvenement = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptionEvenement = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    private ?User $idUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nomEvenement;
    }

    public function setNomEvenement(string $nomEvenement): self
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(\DateTimeInterface $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getHeureDebutEvenement(): ?string
    {
        return $this->heureDebutEvenement;
    }

    public function setHeureDebutEvenement(string $heureDebutEvenement): self
    {
        $this->heureDebutEvenement = $heureDebutEvenement;

        return $this;
    }

    public function getHeureFinEvenement(): ?string
    {
        return $this->heureFinEvenement;
    }

    public function setHeureFinEvenement(?string $heureFinEvenement): self
    {
        $this->heureFinEvenement = $heureFinEvenement;

        return $this;
    }

    public function getLieuEvenement(): ?string
    {
        return $this->lieuEvenement;
    }

    public function setLieuEvenement(string $lieuEvenement): self
    {
        $this->lieuEvenement = $lieuEvenement;

        return $this;
    }

    public function getPhotoEvenement(): ?string
    {
        return $this->photoEvenement;
    }

    public function setPhotoEvenement(?string $photoEvenement): self
    {
        $this->photoEvenement = $photoEvenement;

        return $this;
    }

    public function getDescriptionEvenement(): ?string
    {
        return $this->descriptionEvenement;
    }

    public function setDescriptionEvenement(?string $descriptionEvenement): self
    {
        $this->descriptionEvenement = $descriptionEvenement;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
