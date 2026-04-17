<?php

namespace App\Entity;

use App\Repository\CongeMaladieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CongeMaladieRepository::class)]
#[ORM\Table(name: 'conge_maladie')]
#[ORM\HasLifecycleCallbacks]
class CongeMaladie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /** Patient qui fait la demande */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $patient = null;

    /** Psychologue / coach qui valide */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $medecin = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: 'text')]
    private ?string $motif = null;

    /**
     * Valeurs possibles :
     *   en_attente | valide | refuse | annule_patient | termine
     */
    #[ORM\Column(type: 'string', length: 30, options: ['default' => 'en_attente'])]
    private string $statut = 'en_attente';

    /** Commentaire facultatif du psy lors de sa décision */
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $reponsePsy = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    /** Date à laquelle le psy a rendu sa décision */
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $traiteAt = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $signaturePsy = null;

    // ── Getters / Setters ──────────────────────────────────────────────────────

    public function getId(): ?int { return $this->id; }

    public function getPatient(): ?User { return $this->patient; }
    public function setPatient(?User $patient): static { $this->patient = $patient; return $this; }

    public function getMedecin(): ?User { return $this->medecin; }
    public function setMedecin(?User $medecin): static { $this->medecin = $medecin; return $this; }

    public function getDateDebut(): ?\DateTimeInterface { return $this->dateDebut; }
    public function setDateDebut(\DateTimeInterface $dateDebut): static { $this->dateDebut = $dateDebut; return $this; }

    public function getDateFin(): ?\DateTimeInterface { return $this->dateFin; }
    public function setDateFin(\DateTimeInterface $dateFin): static { $this->dateFin = $dateFin; return $this; }

    public function getMotif(): ?string { return $this->motif; }
    public function setMotif(string $motif): static { $this->motif = $motif; return $this; }

    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $statut): static { $this->statut = $statut; return $this; }

    public function getReponsePsy(): ?string { return $this->reponsePsy; }
    public function setReponsePsy(?string $reponsePsy): static { $this->reponsePsy = $reponsePsy; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): static { $this->createdAt = $createdAt; return $this; }

    public function getTraiteAt(): ?\DateTimeInterface { return $this->traiteAt; }
    public function setTraiteAt(?\DateTimeInterface $traiteAt): static { $this->traiteAt = $traiteAt; return $this; }

    // ── Helpers ───────────────────────────────────────────────────────────────

    public function getDureeJours(): int
    {
        if (!$this->dateDebut || !$this->dateFin) {
            return 0;
        }
        return (int) $this->dateDebut->diff($this->dateFin)->days + 1;
    }

    public function isExpired(): bool
    {
        return $this->statut === 'valide'
            && $this->dateFin < new \DateTime('today');
    }

    public function getSignaturePsy(): ?string
    {
        return $this->signaturePsy;
    }

    public function setSignaturePsy(?string $signaturePsy): static
    {
        $this->signaturePsy = $signaturePsy;

        return $this;
    }
}