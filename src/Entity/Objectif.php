<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ObjectifRepository;

#[ORM\Entity(repositoryClass: ObjectifRepository::class)]
#[ORM\Table(name: 'objectifs')]
class Objectif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_objectif = null;

    public function getId_objectif(): ?int
    {
        return $this->id_objectif;
    }

    public function setId_objectif(int $id_objectif): self
    {
        $this->id_objectif = $id_objectif;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_suivi = null;

    public function getId_suivi(): ?int
    {
        return $this->id_suivi;
    }

    public function setId_suivi(int $id_suivi): self
    {
        $this->id_suivi = $id_suivi;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $titre = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_creation = null;

    public function getDate_creation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDate_creation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $date_echeance = null;

    public function getDate_echeance(): ?\DateTimeInterface
    {
        return $this->date_echeance;
    }

    public function setDate_echeance(\DateTimeInterface $date_echeance): self
    {
        $this->date_echeance = $date_echeance;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: false)]
    private ?bool $valide = null;

    public function isValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): self
    {
        $this->valide = $valide;
        return $this;
    }

}
