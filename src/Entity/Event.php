<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\EventRepository;

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Table(name: 'events')]
class Event
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $title = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $event_date = null;

    public function getEvent_date(): ?\DateTimeInterface
    {
        return $this->event_date;
    }

    public function setEvent_date(\DateTimeInterface $event_date): self
    {
        $this->event_date = $event_date;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $location = null;

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $link = null;

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $created_at = null;

    public function getCreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $creator_id = null;

    public function getCreator_id(): ?int
    {
        return $this->creator_id;
    }

    public function setCreator_id(?int $creator_id): self
    {
        $this->creator_id = $creator_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $max_participants = null;

    public function getMax_participants(): ?int
    {
        return $this->max_participants;
    }

    public function setMax_participants(int $max_participants): self
    {
        $this->max_participants = $max_participants;
        return $this;
    }

    #[ORM\OneToOne(targetEntity: Participation::class, mappedBy: 'event')]
    private ?Participation $participation = null;

    public function getParticipation(): ?Participation
    {
        return $this->participation;
    }

    public function setParticipation(?Participation $participation): self
    {
        $this->participation = $participation;
        return $this;
    }

    #[ORM\OneToMany(targetEntity: Planification::class, mappedBy: 'event')]
    private Collection $planifications;

    /**
     * @return Collection<int, Planification>
     */
    public function getPlanifications(): Collection
    {
        if (!$this->planifications instanceof Collection) {
            $this->planifications = new ArrayCollection();
        }
        return $this->planifications;
    }

    public function addPlanification(Planification $planification): self
    {
        if (!$this->getPlanifications()->contains($planification)) {
            $this->getPlanifications()->add($planification);
        }
        return $this;
    }

    public function removePlanification(Planification $planification): self
    {
        $this->getPlanifications()->removeElement($planification);
        return $this;
    }

}
