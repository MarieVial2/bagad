<?php

namespace App\Entity;

use App\Repository\ParametreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ParametreRepository::class)]
class Parametre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $anneeScolaireEnCoursParametre = null;

    #[ORM\Column(length: 255)]
    private ?string $momentRepetitionParametre = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuRepetitionParametre = null;

    #[ORM\Column(length: 50)]
    private ?string $categorieBagadParametre = null;

    #[Assert\Type(
        type: 'integer',
        message: 'La valeur {{ value }} n\'est pas valide. Il doit d\'agir d\'un nombre simple, sans symbole ou lettre.',
    )]
    #[ORM\Column(length: 50)]
    private ?string $prixCoursParametre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prixAdhesionParametre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contactsDemandePrestationParametre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contactsContactParametre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeScolaireEnCoursParametre(): ?string
    {
        return $this->anneeScolaireEnCoursParametre;
    }

    public function setAnneeScolaireEnCoursParametre(string $anneeScolaireEnCoursParametre): self
    {
        $this->anneeScolaireEnCoursParametre = $anneeScolaireEnCoursParametre;

        return $this;
    }

    public function getMomentRepetitionParametre(): ?string
    {
        return $this->momentRepetitionParametre;
    }

    public function setMomentRepetitionParametre(string $momentRepetitionParametre): self
    {
        $this->momentRepetitionParametre = $momentRepetitionParametre;

        return $this;
    }

    public function getLieuRepetitionParametre(): ?string
    {
        return $this->lieuRepetitionParametre;
    }

    public function setLieuRepetitionParametre(string $lieuRepetitionParametre): self
    {
        $this->lieuRepetitionParametre = $lieuRepetitionParametre;

        return $this;
    }

    public function getCategorieBagadParametre(): ?string
    {
        return $this->categorieBagadParametre;
    }

    public function setCategorieBagadParametre(string $categorieBagadParametre): self
    {
        $this->categorieBagadParametre = $categorieBagadParametre;

        return $this;
    }

    public function getPrixCoursParametre(): ?string
    {
        return $this->prixCoursParametre;
    }

    public function setPrixCoursParametre(string $prixCoursParametre): self
    {
        $this->prixCoursParametre = $prixCoursParametre;

        return $this;
    }

    public function getPrixAdhesionParametre(): ?string
    {
        return $this->prixAdhesionParametre;
    }

    public function setPrixAdhesionParametre(string $prixAdhesionParametre): self
    {
        $this->prixAdhesionParametre = $prixAdhesionParametre;

        return $this;
    }

    public function getContactsDemandePrestationParametre(): ?string
    {
        return $this->contactsDemandePrestationParametre;
    }

    public function setContactsDemandePrestationParametre(string $contactsDemandePrestationParametre): self
    {
        $this->contactsDemandePrestationParametre = $contactsDemandePrestationParametre;

        return $this;
    }

    public function getContactsContactParametre(): ?string
    {
        return $this->contactsContactParametre;
    }

    public function setContactsContactParametre(string $contactsContactParametre): self
    {
        $this->contactsContactParametre = $contactsContactParametre;

        return $this;
    }
}