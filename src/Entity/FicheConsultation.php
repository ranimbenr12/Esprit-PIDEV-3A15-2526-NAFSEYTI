<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\FicheConsultationRepository;

#[ORM\Entity(repositoryClass: FicheConsultationRepository::class)]
#[ORM\Table(name: 'fiche_consultation')]
class FicheConsultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $rendez_vous_id = null;

    public function getRendez_vous_id(): ?int
    {
        return $this->rendez_vous_id;
    }

    public function setRendez_vous_id(?int $rendez_vous_id): self
    {
        $this->rendez_vous_id = $rendez_vous_id;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $probleme_principal = null;

    public function getProbleme_principal(): ?string
    {
        return $this->probleme_principal;
    }

    public function setProbleme_principal(?string $probleme_principal): self
    {
        $this->probleme_principal = $probleme_principal;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $diagnostic = null;

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(?string $diagnostic): self
    {
        $this->diagnostic = $diagnostic;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $recommandations = null;

    public function getRecommandations(): ?string
    {
        return $this->recommandations;
    }

    public function setRecommandations(?string $recommandations): self
    {
        $this->recommandations = $recommandations;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $traitement = null;

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): self
    {
        $this->traitement = $traitement;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    public function getCreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

}
