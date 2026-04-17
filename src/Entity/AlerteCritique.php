<?php

namespace App\Entity;

use App\Repository\AlerteCritiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlerteCritiqueRepository::class)]
#[ORM\Table(name: 'alertes_critiques')]
class AlerteCritique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "utilisateur_id", referencedColumnName: "id", onDelete: "SET NULL")]
    private ?User $utilisateur = null;

    #[ORM\ManyToOne]
#[ORM\JoinColumn(name: "test_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
private ?Test $test = null;

    #[ORM\Column(length: 20)]
    private ?string $statut = 'nouveau';

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notesAdmin = null;

    #[ORM\Column(type: 'text')]
    private ?string $reponsesResume = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTime $traiteLe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $traitePar = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // Getters et setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): self
    {
        $this->test = $test;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function getNotesAdmin(): ?string
    {
        return $this->notesAdmin;
    }

    public function setNotesAdmin(?string $notesAdmin): self
    {
        $this->notesAdmin = $notesAdmin;
        return $this;
    }

    public function getReponsesResume(): ?string
    {
        return $this->reponsesResume;
    }

    public function setReponsesResume(string $reponsesResume): self
    {
        $this->reponsesResume = $reponsesResume;
        return $this;
    }

    public function getCreatedAt(): \DateTime  // ← Changé de DateTimeImmutable à DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self  // ← Changé
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getTraiteLe(): ?\DateTime  // ← Changé
    {
        return $this->traiteLe;
    }

    public function setTraiteLe(?\DateTime $traiteLe): self  // ← Changé
    {
        $this->traiteLe = $traiteLe;
        return $this;
    }

    public function getTraitePar(): ?string
    {
        return $this->traitePar;
    }

    public function setTraitePar(?string $traitePar): self
    {
        $this->traitePar = $traitePar;
        return $this;
    }
}