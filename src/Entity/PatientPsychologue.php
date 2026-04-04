<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\PatientPsychologueRepository;

#[ORM\Entity(repositoryClass: PatientPsychologueRepository::class)]
#[ORM\Table(name: 'patient_psychologue')]
class PatientPsychologue
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

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $patient_id = null;

    public function getPatient_id(): ?int
    {
        return $this->patient_id;
    }

    public function setPatient_id(int $patient_id): self
    {
        $this->patient_id = $patient_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $psychologue_id = null;

    public function getPsychologue_id(): ?int
    {
        return $this->psychologue_id;
    }

    public function setPsychologue_id(int $psychologue_id): self
    {
        $this->psychologue_id = $psychologue_id;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    public function getDate_debut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDate_debut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    public function getDate_fin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDate_fin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $statut = null;

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

}
