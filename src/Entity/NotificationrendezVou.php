<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NotificationrendezVouRepository;

#[ORM\Entity(repositoryClass: NotificationrendezVouRepository::class)]
#[ORM\Table(name: 'notificationrendez_vous')]
class NotificationrendezVou
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'destinataire_id', referencedColumnName: 'id',
                     nullable: false, onDelete: 'CASCADE')]
    private ?User $destinataire = null;

    #[ORM\ManyToOne(targetEntity: ReservationrendezVou::class)]
    #[ORM\JoinColumn(name: 'reservation_id', referencedColumnName: 'id',
                     nullable: true, onDelete: 'CASCADE')]
    private ?ReservationrendezVou $reservation = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $message = '';

    #[ORM\Column(type: 'string', length: 50)]
    private string $type = 'rdv';

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $lu = false;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private \DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getDestinataire(): ?User { return $this->destinataire; }
    public function setDestinataire(?User $u): self { $this->destinataire = $u; return $this; }

    public function getReservation(): ?ReservationrendezVou { return $this->reservation; }
    public function setReservation(?ReservationrendezVou $r): self { $this->reservation = $r; return $this; }

    public function getMessage(): string { return $this->message; }
    public function setMessage(string $m): self { $this->message = $m; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $t): self { $this->type = $t; return $this; }

    public function isLu(): bool { return $this->lu; }
    public function setLu(bool $lu): self { $this->lu = $lu; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $d): self { $this->createdAt = $d; return $this; }
}