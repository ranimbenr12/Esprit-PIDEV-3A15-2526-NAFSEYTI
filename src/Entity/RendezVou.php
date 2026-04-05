<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\RendezVouRepository;

#[ORM\Entity(repositoryClass: RendezVouRepository::class)]
#[ORM\Table(name: 'rendez_vous')]
class RendezVou
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
    private ?int $userId = null;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $medecinId = null;

    public function getMedecinId(): ?int
    {
        return $this->medecinId;
    }

    public function setMedecinId(int $medecinId): self
    {
        $this->medecinId = $medecinId;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $dateRendezVous = null;

    public function getDateRendezVous(): ?\DateTimeInterface
    {
        return $this->dateRendezVous;
    }

    public function setDateRendezVous(\DateTimeInterface $dateRendezVous): self
    {
        $this->dateRendezVous = $dateRendezVous;
        return $this;
    }

    #[ORM\Column(type: 'time', nullable: false)]
    private ?string $heureDebut = null;

    public function getHeureDebut(): ?string
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(string $heureDebut): self
    {
        $this->heureDebut = $heureDebut;
        return $this;
    }

    #[ORM\Column(type: 'time', nullable: false)]
    private ?string $heureFin = null;

    public function getHeureFin(): ?string
    {
        return $this->heureFin;
    }

    public function setHeureFin(string $heureFin): self
    {
        $this->heureFin = $heureFin;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $type_seance = null;

    public function getType_seance(): ?string
    {
        return $this->type_seance;
    }

    public function setType_seance(?string $type_seance): self
    {
        $this->type_seance = $type_seance;
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

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $google_event_id = null;

    public function getGoogle_event_id(): ?string
    {
        return $this->google_event_id;
    }

    public function setGoogle_event_id(?string $google_event_id): self
    {
        $this->google_event_id = $google_event_id;
        return $this;
    }

}
