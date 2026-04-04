<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\PlanificationRepository;

#[ORM\Entity(repositoryClass: PlanificationRepository::class)]
#[ORM\Table(name: 'planification')]
class Planification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_planification = null;

    public function getId_planification(): ?int
    {
        return $this->id_planification;
    }

    public function setId_planification(int $id_planification): self
    {
        $this->id_planification = $id_planification;
        return $this;
    }

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'planifications')]
    #[ORM\JoinColumn(name: 'id_event', referencedColumnName: 'id')]
    private ?Event $event = null;

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $duree = null;

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;
        return $this;
    }

}
