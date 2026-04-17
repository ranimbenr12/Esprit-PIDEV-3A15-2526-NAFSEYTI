<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReservationrendezVouRepository;
use App\Entity\RendezVou;   // ← sans s
use App\Entity\User;

#[ORM\Entity(repositoryClass: ReservationrendezVouRepository::class)]
#[ORM\Table(name: 'reservationrendez_vous')]
class ReservationrendezVou
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'medecin_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?User $medecin = null;

    #[ORM\ManyToOne(targetEntity: RendezVou::class)]   // ← sans s
    #[ORM\JoinColumn(name: 'rendez_vous_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?RendezVou $rendezVous = null;              // ← sans s

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date_reservation = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date_rdv = null;

    #[ORM\Column(type: 'string', length: 20, options: ['default' => 'en_attente'])]
    private string $statut = 'en_attente';

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

    public function getRendezVous(): ?RendezVou          // ← sans s
    {
        return $this->rendezVous;
    }

    public function setRendezVous(?RendezVou $rendezVous): self   // ← sans s
    {
        $this->rendezVous = $rendezVous;
        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;
        return $this;
    }
    public function getDateRdv(): ?\DateTimeInterface
    {
        return $this->date_rdv;
    }

    public function setDateRdv(\DateTimeInterface $date_rdv): self
    {
        $this->date_rdv = $date_rdv;
        return $this;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

}