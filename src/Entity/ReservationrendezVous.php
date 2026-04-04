<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ReservationrendezVousRepository;

#[ORM\Entity(repositoryClass: ReservationrendezVousRepository::class)]
#[ORM\Table(name: 'reservationrendez_vous')]
class ReservationrendezVous
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
    private ?int $user_id = null;

    public function getUser_id(): ?int
    {
        return $this->user_id;
    }

    public function setUser_id(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $medecin_id = null;

    public function getMedecin_id(): ?int
    {
        return $this->medecin_id;
    }

    public function setMedecin_id(int $medecin_id): self
    {
        $this->medecin_id = $medecin_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $rendez_vous_id = null;

    public function getRendez_vous_id(): ?int
    {
        return $this->rendez_vous_id;
    }

    public function setRendez_vous_id(int $rendez_vous_id): self
    {
        $this->rendez_vous_id = $rendez_vous_id;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_reservation = null;

    public function getDate_reservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDate_reservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;
        return $this;
    }

}
