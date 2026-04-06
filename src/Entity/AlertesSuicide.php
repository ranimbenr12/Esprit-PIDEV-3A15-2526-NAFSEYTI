<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\AlertesSuicideRepository;

#[ORM\Entity(repositoryClass: AlertesSuicideRepository::class)]
#[ORM\Table(name: 'alertes_suicide')]
class AlertesSuicide
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_alerte = null;

    public function getId_alerte(): ?int
    {
        return $this->id_alerte;
    }

    public function setId_alerte(int $id_alerte): self
    {
        $this->id_alerte = $id_alerte;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'alertesSuicides')]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id')]
    private ?User $user = null;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $message = null;

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $mots_detectes = null;

    public function getMots_detectes(): ?string
    {
        return $this->mots_detectes;
    }

    public function setMots_detectes(?string $mots_detectes): self
    {
        $this->mots_detectes = $mots_detectes;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_alerte = null;

    public function getDate_alerte(): ?\DateTimeInterface
    {
        return $this->date_alerte;
    }

    public function setDate_alerte(\DateTimeInterface $date_alerte): self
    {
        $this->date_alerte = $date_alerte;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $traite = null;

    public function isTraite(): ?bool
    {
        return $this->traite;
    }

    public function setTraite(?bool $traite): self
    {
        $this->traite = $traite;
        return $this;
    }

}
