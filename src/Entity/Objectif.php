<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ObjectifRepository;

#[ORM\Entity(repositoryClass: ObjectifRepository::class)]
#[ORM\Table(name: 'objectifs')]
class Objectif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_objectif', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'titre', type: 'string', length: 200)]
    private ?string $titre = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'statut', type: 'string', length: 20, nullable: true)]
    private ?string $statut = 'en_cours';

    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(name: 'date_echeance', type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateEcheance = null;

    #[ORM\Column(name: 'valide', type: 'boolean', nullable: true)]
    private ?bool $valide = false;

    // FK suivi_id → suivis.id_suivi (PK de Suivi mappée sur le champ $id via name: 'id_suivi')
    #[ORM\ManyToOne(targetEntity: Suivi::class, inversedBy: 'objectifs')]
    #[ORM\JoinColumn(name: 'suivi_id', referencedColumnName: 'id_suivi', nullable: false)]
    private ?Suivi $suivi = null;

    public function getId(): ?int { return $this->id; }

    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $titre): self { $this->titre = $titre; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }

    public function getStatut(): ?string { return $this->statut; }
    public function setStatut(?string $statut): self { $this->statut = $statut; return $this; }

    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
    public function setDateCreation(?\DateTimeInterface $dateCreation): self { $this->dateCreation = $dateCreation; return $this; }

    public function getDateEcheance(): ?\DateTimeInterface { return $this->dateEcheance; }
    public function setDateEcheance(?\DateTimeInterface $dateEcheance): self { $this->dateEcheance = $dateEcheance; return $this; }

    public function getValide(): ?bool { return $this->valide; }
    public function setValide(?bool $valide): self { $this->valide = $valide; return $this; }

    public function getSuivi(): ?Suivi { return $this->suivi; }
    public function setSuivi(?Suivi $suivi): self { $this->suivi = $suivi; return $this; }
}