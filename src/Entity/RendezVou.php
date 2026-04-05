<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RendezVouRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface; 

#[ORM\Entity(repositoryClass: RendezVouRepository::class)]
#[ORM\Table(name: 'rendez_vous')]
class RendezVou
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "userId", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "medecinId", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    #[Assert\NotNull(message: "Le médecin est obligatoire.")]
    private ?User $medecin = null;

    #[ORM\Column(name: "dateRendezVous", type: "date")]
    #[Assert\NotNull(message: "La date est obligatoire.")]
    #[Assert\GreaterThanOrEqual(
        value: "today",
        message: "La date du rendez-vous ne peut pas être dans le passé."
    )]
    private ?\DateTimeInterface $dateRendezVous = null;

    #[ORM\Column(name: "heureDebut", type: "time")]
    #[Assert\NotNull(message: "L'heure de début est obligatoire.")]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(name: "heureFin", type: "time")]
    #[Assert\NotNull(message: "L'heure de fin est obligatoire.")]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\NotBlank(message: "Le type de séance est obligatoire.")]
    #[Assert\Choice(
        choices: ["Présentiel", "en_ligne"],
        message: "Le type de séance doit être 'Présentiel' ou 'En ligne'."
    )]
    private ?string $type_seance = null;

    #[ORM\Column(length: 20, options: ["default" => "en_attente"])]
    #[Assert\NotBlank(message: "Le statut est obligatoire.")]
    #[Assert\Choice(
        choices: ["En attente", "Confirmé", "Pas encore pris"],
        message: "Le statut choisi n'est pas valide."
    )]
    private ?string $statut = 'En attente';

    #[ORM\Column(nullable: true)]
    private ?string $google_event_id = null;


    // GETTERS / SETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getMedecin(): ?User
    {
        return $this->medecin;
    }

    public function setMedecin(?User $medecin): self
    {
        $this->medecin = $medecin;
        return $this;
    }

    public function getDateRendezVous(): ?\DateTimeInterface
    {
        return $this->dateRendezVous;
    }

    public function setDateRendezVous(?\DateTimeInterface $dateRendezVous): self
    {
        $this->dateRendezVous = $dateRendezVous;
        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(?\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;
        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(?\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;
        return $this;
    }

    public function getTypeSeance(): ?string
    {
        return $this->type_seance;
    }

    public function setTypeSeance(?string $type_seance): self
    {
        $this->type_seance = $type_seance;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }
    #[Assert\Callback]
    public function validateHeures(ExecutionContextInterface $context): void
    {
        if ($this->heureDebut !== null && $this->heureFin !== null) {
            if ($this->heureDebut >= $this->heureFin) {
                $context->buildViolation("L'heure de début doit être inférieure à l'heure de fin.")
                    ->atPath('heureDebut')
                    ->addViolation();
            }
        }
    }
}