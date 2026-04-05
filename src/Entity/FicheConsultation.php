<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FicheConsultationRepository;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: FicheConsultationRepository::class)]
#[ORM\Table(name: 'fiche_consultation')]
class FicheConsultation
{
     #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: RendezVou::class)]
    #[ORM\JoinColumn(
        name: 'rendez_vous_id',
        referencedColumnName: 'id',
        unique: true,
        nullable: false,
        onDelete: 'CASCADE'
    )]
    #[Assert\NotNull(message: "Le rendez-vous est obligatoire.")]
    private ?RendezVou $rendezVous = null;

    #[ORM\Column(type: 'text', nullable: false)]
    #[Assert\NotBlank(message: "Les notes sont obligatoires.")]
    private ?string $notes = null;

    #[ORM\Column(type: 'text', nullable: false)]
    #[Assert\NotBlank(message: "Le problème principal est obligatoire.")]
    private ?string $probleme_principal = null;

    #[ORM\Column(type: 'text', nullable: false)]
    #[Assert\NotBlank(message: "Le diagnostic est obligatoire.")]
    private ?string $diagnostic = null;

    #[ORM\Column(type: 'text', nullable: false)]
    #[Assert\NotBlank(message: "Les recommandations sont obligatoires.")]
    private ?string $recommandations = null;

    #[ORM\Column(type: 'text', nullable: false)]
    #[Assert\NotBlank(message: "Le traitement est obligatoire.")]
    private ?string $traitement = null;

    #[ORM\Column(type: 'datetime', nullable: false)]
    #[Assert\NotNull(message: "La date de création est obligatoire.")]
    private ?\DateTimeInterface $created_at = null;

    // GETTERS / SETTERS

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRendezVous(): ?RendezVou
    {
        return $this->rendezVous;
    }

    public function setRendezVous(?RendezVou $rendezVous): self
    {
        $this->rendezVous = $rendezVous;
        return $this;
    }

    public function getNotes(): ?string { return $this->notes; }
    public function setNotes(?string $notes): self { $this->notes = $notes; return $this; }

    public function getProblemePrincipal(): ?string { return $this->probleme_principal; }
    public function setProblemePrincipal(?string $probleme_principal): self
    {
        $this->probleme_principal = $probleme_principal;
        return $this;
    }

    public function getDiagnostic(): ?string { return $this->diagnostic; }
    public function setDiagnostic(?string $diagnostic): self { $this->diagnostic = $diagnostic; return $this; }

    public function getRecommandations(): ?string { return $this->recommandations; }
    public function setRecommandations(?string $recommandations): self { $this->recommandations = $recommandations; return $this; }

    public function getTraitement(): ?string { return $this->traitement; }
    public function setTraitement(?string $traitement): self { $this->traitement = $traitement; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(\DateTimeInterface $created_at): self { $this->created_at = $created_at; return $this; }
}