<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FicheConsultationRepository;

#[ORM\Entity(repositoryClass: FicheConsultationRepository::class)]
#[ORM\Table(name: 'fiche_consultation')]
class FicheConsultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToOne(targetEntity: RendezVous::class, inversedBy: 'ficheConsultation')]
    #[ORM\JoinColumn(name: 'rendez_vous_id', referencedColumnName: 'id', nullable: true, unique: true)]
    private ?RendezVous $rendezVous = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(name: 'probleme_principal', type: 'text', nullable: true)]
    private ?string $problemePrincipal = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $diagnostic = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $recommandations = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $traitement = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getRendezVous(): ?RendezVous { return $this->rendezVous; }
    public function setRendezVous(?RendezVous $rendezVous): self { $this->rendezVous = $rendezVous; return $this; }

    public function getNotes(): ?string { return $this->notes; }
    public function setNotes(?string $notes): self { $this->notes = $notes; return $this; }

    public function getProblemePrincipal(): ?string { return $this->problemePrincipal; }
    public function setProblemePrincipal(?string $problemePrincipal): self { $this->problemePrincipal = $problemePrincipal; return $this; }

    public function getDiagnostic(): ?string { return $this->diagnostic; }
    public function setDiagnostic(?string $diagnostic): self { $this->diagnostic = $diagnostic; return $this; }

    public function getRecommandations(): ?string { return $this->recommandations; }
    public function setRecommandations(?string $recommandations): self { $this->recommandations = $recommandations; return $this; }

    public function getTraitement(): ?string { return $this->traitement; }
    public function setTraitement(?string $traitement): self { $this->traitement = $traitement; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
}