<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
#[ORM\Table(name: 'rendez_vous')]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'dateRendezVous', type: 'date')]
    private ?\DateTimeInterface $dateRendezVous = null;

    #[ORM\Column(name: 'heureDebut', type: 'string', length: 10, nullable: true)]
    private ?string $heureDebut = null;

    #[ORM\Column(name: 'heureFin', type: 'string', length: 10, nullable: true)]
    private ?string $heureFin = null;

    #[ORM\Column(name: 'type_seance', type: 'string', length: 50, nullable: true)]
    private ?string $typeSeance = null;

    #[ORM\Column(name: 'statut', type: 'string', length: 20, nullable: true)]
    private ?string $statut = 'en_attente';

    #[ORM\Column(name: 'google_event_id', type: 'string', length: 255, nullable: true)]
    private ?string $googleEventId = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'rendezVous')]
    #[ORM\JoinColumn(name: 'userId', referencedColumnName: 'id', nullable: true)]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'rendezVousComeMedecin')]
    #[ORM\JoinColumn(name: 'medecinId', referencedColumnName: 'id', nullable: false)]
    private ?User $medecin = null;

    #[ORM\OneToOne(mappedBy: 'rendezVous', targetEntity: FicheConsultation::class)]
    private ?FicheConsultation $ficheConsultation = null;

    public function getId(): ?int { return $this->id; }

    public function getDateRendezVous(): ?\DateTimeInterface { return $this->dateRendezVous; }
    public function setDateRendezVous(\DateTimeInterface $dateRendezVous): self { $this->dateRendezVous = $dateRendezVous; return $this; }

    public function getHeureDebut(): ?string { return $this->heureDebut; }
    public function setHeureDebut(?string $heureDebut): self { $this->heureDebut = $heureDebut; return $this; }

    public function getHeureFin(): ?string { return $this->heureFin; }
    public function setHeureFin(?string $heureFin): self { $this->heureFin = $heureFin; return $this; }

    public function getTypeSeance(): ?string { return $this->typeSeance; }
    public function setTypeSeance(?string $typeSeance): self { $this->typeSeance = $typeSeance; return $this; }

    public function getStatut(): ?string { return $this->statut; }
    public function setStatut(?string $statut): self { $this->statut = $statut; return $this; }

    public function getGoogleEventId(): ?string { return $this->googleEventId; }
    public function setGoogleEventId(?string $googleEventId): self { $this->googleEventId = $googleEventId; return $this; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): self { $this->user = $user; return $this; }

    public function getMedecin(): ?User { return $this->medecin; }
    public function setMedecin(?User $medecin): self { $this->medecin = $medecin; return $this; }

    public function getFicheConsultation(): ?FicheConsultation { return $this->ficheConsultation; }
    public function setFicheConsultation(?FicheConsultation $ficheConsultation): self { $this->ficheConsultation = $ficheConsultation; return $this; }
}