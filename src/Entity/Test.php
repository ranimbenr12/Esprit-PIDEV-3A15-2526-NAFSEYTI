<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TestRepository::class)]
#[ORM\Table(name: 'tests')]
#[ORM\HasLifecycleCallbacks]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: false)]
    #[Assert\NotBlank(message: "Le titre est obligatoire")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "Le titre doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le titre ne doit pas dépasser {{ limit }} caractères"
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z0-9\s\p{L}'-]+$/u",
        message: "Le titre ne peut contenir que des lettres, chiffres, espaces, apostrophes et tirets"
    )]
    private ?string $titre = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\NotBlank(message: "La description est obligatoire")]
    #[Assert\Length(
        min: 10,
        max: 1000,
        minMessage: "La description doit contenir au moins {{ limit }} caractères",
        maxMessage: "La description ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $description = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Assert\NotBlank(message: "La catégorie est obligatoire")]
    #[Assert\Choice(
        choices: ["personnalite", "intelligence", "competences", "aptitudes", "comportement", "autre"],
        message: "Veuillez choisir une catégorie valide"
    )]
    private ?string $categorie = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Assert\NotBlank(message: "Le niveau est obligatoire")]
    #[Assert\Choice(
        choices: ["debutant", "intermediaire", "avance", "expert"],
        message: "Veuillez choisir un niveau valide"
    )]
    private ?string $niveau = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\Positive(message: "La durée doit être un nombre positif")]
    #[Assert\LessThanOrEqual(
        value: 360,
        message: "La durée ne peut pas dépasser {{ compared_value }} minutes (6 heures)"
    )]
    #[Assert\GreaterThanOrEqual(
        value: 1,
        message: "La durée doit être d'au moins {{ compared_value }} minute"
    )]
    private ?int $duree = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\Positive(message: "Le score maximum doit être un nombre positif")]
    #[Assert\LessThanOrEqual(
        value: 1000,
        message: "Le score maximum ne peut pas dépasser {{ compared_value }}"
    )]
    private ?int $scoreMax = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tests')]
    #[ORM\JoinColumn(name: 'created_by', referencedColumnName: 'id', nullable: true)]
    private ?User $user = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Assert\Choice(
        choices: ["actif", "inactif"],
        message: "Le status doit être 'actif' ou 'inactif'"
    )]
    private ?string $status = null;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $updatedAt = null;

  #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'test', cascade: ["remove"])]
private Collection $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }
    public function getId(): ?int { return $this->id; }

    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCategorie(): ?string { return $this->categorie; }
    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getNiveau(): ?string { return $this->niveau; }
    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getDuree(): ?int { return $this->duree; }
    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;
        return $this;
    }

    public function getScoreMax(): ?int { return $this->scoreMax; }
    public function setScoreMax(?int $scoreMax): self
    {
        $this->scoreMax = $scoreMax;
        return $this;
    }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getStatus(): ?string { return $this->status; }
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface { return $this->updatedAt; }
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
        }
        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        $this->questions->removeElement($question);
        return $this;
    }
}