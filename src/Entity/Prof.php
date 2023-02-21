<?php

namespace App\Entity;

use App\Repository\ProfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfRepository::class)]
class Prof
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomProf = null;

    #[ORM\Column(length: 50)]
    private ?string $prenomProf = null;

    #[ORM\Column(length: 255)]
    private ?string $pupitreProf = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $experienceProf = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoProf = null;

    #[ORM\OneToMany(mappedBy: 'idProf', targetEntity: Cours::class)]
    private Collection $cours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProf(): ?string
    {
        return $this->nomProf;
    }

    public function setNomProf(string $nomProf): self
    {
        $this->nomProf = $nomProf;

        return $this;
    }

    public function getPrenomProf(): ?string
    {
        return $this->prenomProf;
    }

    public function setPrenomProf(string $prenomProf): self
    {
        $this->prenomProf = $prenomProf;

        return $this;
    }

    public function getPupitreProf(): ?string
    {
        return $this->pupitreProf;
    }

    public function setPupitreProf(string $pupitreProf): self
    {
        $this->pupitreProf = $pupitreProf;

        return $this;
    }

    public function getExperienceProf(): ?string
    {
        return $this->experienceProf;
    }

    public function setExperienceProf(?string $experienceProf): self
    {
        $this->experienceProf = $experienceProf;

        return $this;
    }

    public function getPhotoProf(): ?string
    {
        return $this->photoProf;
    }

    public function setPhotoProf(?string $photoProf): self
    {
        $this->photoProf = $photoProf;

        return $this;
    }

    /**
     * @return Collection<int, Cours>
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours->add($cour);
            $cour->setIdProf($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getIdProf() === $this) {
                $cour->setIdProf(null);
            }
        }

        return $this;
    }
}
