<?php

namespace App\Entity;

use App\Repository\DemandePrestationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandePrestationRepository::class)]
class DemandePrestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomPrestation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePrestation = null;

    #[ORM\Column(length: 10)]
    private ?string $heureDebutPrestation = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $heureFinPrestation = null;

    #[ORM\Column(length: 255)]
    private ?string $typePrestation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $informationsPrestation = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbMinimumSonneursPrestation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailDemandeurPrestation = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $telephoneDemandeurPrestation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreationPrestation = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuPrestation = null;

    public function __construct()
    {
        $this->setDateCreationPrestation(new \DateTimeImmutable);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrestation(): ?string
    {
        return $this->nomPrestation;
    }

    public function setNomPrestation(?string $nomPrestation): self
    {
        $this->nomPrestation = $nomPrestation;

        return $this;
    }

    public function getDatePrestation(): ?\DateTimeInterface
    {
        return $this->datePrestation;
    }

    public function setDatePrestation(\DateTimeInterface $datePrestation): self
    {
        $this->datePrestation = $datePrestation;

        return $this;
    }

    public function getHeureDebutPrestation(): ?string
    {
        return $this->heureDebutPrestation;
    }

    public function setHeureDebutPrestation(string $heureDebutPrestation): self
    {
        $this->heureDebutPrestation = $heureDebutPrestation;

        return $this;
    }

    public function getHeureFinPrestation(): ?string
    {
        return $this->heureFinPrestation;
    }

    public function setHeureFinPrestation(?string $heureFinPrestation): self
    {
        $this->heureFinPrestation = $heureFinPrestation;

        return $this;
    }

    public function getTypePrestation(): ?string
    {
        return $this->typePrestation;
    }

    public function setTypePrestation(string $typePrestation): self
    {
        $this->typePrestation = $typePrestation;

        return $this;
    }

    public function getInformationsPrestation(): ?string
    {
        return $this->informationsPrestation;
    }

    public function setInformationsPrestation(?string $informationsPrestation): self
    {
        $this->informationsPrestation = $informationsPrestation;

        return $this;
    }

    public function getNbMinimumSonneursPrestation(): ?int
    {
        return $this->nbMinimumSonneursPrestation;
    }

    public function setNbMinimumSonneursPrestation(?int $nbMinimumSonneursPrestation): self
    {
        $this->nbMinimumSonneursPrestation = $nbMinimumSonneursPrestation;

        return $this;
    }

    public function getEmailDemandeurPrestation(): ?string
    {
        return $this->emailDemandeurPrestation;
    }

    public function setEmailDemandeurPrestation(?string $emailDemandeurPrestation): self
    {
        $this->emailDemandeurPrestation = $emailDemandeurPrestation;

        return $this;
    }

    public function getTelephoneDemandeurPrestation(): ?string
    {
        return $this->telephoneDemandeurPrestation;
    }

    public function setTelephoneDemandeurPrestation(?string $telephoneDemandeurPrestation): self
    {
        $this->telephoneDemandeurPrestation = $telephoneDemandeurPrestation;

        return $this;
    }

    public function getDateCreationPrestation(): ?\DateTimeInterface
    {
        return $this->dateCreationPrestation;
    }

    public function setDateCreationPrestation($dateCreationPrestation)
    {

        $this->dateCreationPrestation = $dateCreationPrestation;

        return $this;
    }

    public function getLieuPrestation(): ?string
    {
        return $this->lieuPrestation;
    }

    public function setLieuPrestation(string $lieuPrestation): self
    {
        $this->lieuPrestation = $lieuPrestation;

        return $this;
    }
}