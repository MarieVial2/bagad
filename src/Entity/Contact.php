<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $sujetContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailContact = null;

    #[ORM\Column(length: 25, nullable: true)]
    private ?string $telephoneContact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $messageContact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreationContact = null;

    public function __construct()
    {
        $this->setDateCreationContact(new \DateTimeImmutable);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getSujetContact(): ?string
    {
        return $this->sujetContact;
    }

    public function setSujetContact(string $sujetContact): self
    {
        $this->sujetContact = $sujetContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getTelephoneContact(): ?string
    {
        return $this->telephoneContact;
    }

    public function setTelephoneContact(?string $telephoneContact): self
    {
        $this->telephoneContact = $telephoneContact;

        return $this;
    }

    public function getMessageContact(): ?string
    {
        return $this->messageContact;
    }

    public function setMessageContact(string $messageContact): self
    {
        $this->messageContact = $messageContact;

        return $this;
    }

    public function getDateCreationContact(): ?\DateTimeInterface
    {
        return $this->dateCreationContact;
    }

    public function setDateCreationContact($dateCreationContact)
    {
        $this->dateCreationContact = $dateCreationContact;


        return $this;
    }
}