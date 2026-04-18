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

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->event_date;
    }

    public function setEventDate(\DateTimeInterface $event_date): self
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    // ========== CREATOR PROPERTIES ==========
    
    #[ORM\Column(type: 'integer', nullable: true, options: ['default' => 1])]
    private ?int $creator_id = null;

    public function getCreatorId(): ?int
    {
        return $this->creator_id;
    }

    public function setCreatorId(?int $creator_id): self
    {
        $this->creator_id = $creator_id;
        return $this;
    }

    #[ORM\Column(type: 'string', length: 50, nullable: true, options: ['default' => 'admin'])]
    private ?string $creator_type = null;

    public function getCreatorType(): ?string
    {
        return $this->creator_type;
    }

    public function setCreatorType(?string $creator_type): self
    {
        $this->creator_type = $creator_type;
        return $this;
    }

    public function isCreatorAdmin(): bool
    {
        return $this->creator_type === 'admin';
    }

    public function isCreatorPsychologue(): bool
    {
        return $this->creator_type === 'psychologue';
    }

    public function isCreator(int $userId): bool
    {
        return $this->creator_id === $userId;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $max_participants = null;

    public function getMaxParticipants(): ?int
    {
        return $this->max_participants;
    }

    public function setMaxParticipants(int $max_participants): self
    {
        $this->max_participants = $max_participants;
        return $this;
    }

    // ========== STATUS PROPERTY AND METHODS ==========

    #[ORM\Column(type: 'string', length: 50, options: ['default' => 'upcoming'])]
    private ?string $status = 'upcoming';

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function isUpcoming(): bool
    {
        return $this->status === 'upcoming';
    }

    public function isOngoing(): bool
    {
        return $this->status === 'ongoing';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    public function getStatusLabel(): string
    {
        $labels = [
            'upcoming' => '📅 À venir',
            'ongoing' => '🟢 En cours',
            'completed' => '✅ Terminé',
            'cancelled' => '❌ Annulé'
        ];
        return $labels[$this->status] ?? '📅 À venir';
    }

    public function getStatusColor(): string
    {
        $colors = [
            'upcoming' => '#4A90E2',
            'ongoing' => '#4CAF50',
            'completed' => '#9E9E9E',
            'cancelled' => '#f44336'
        ];
        return $colors[$this->status] ?? '#4A90E2';
    }

    public function getStatusIcon(): string
    {
        $icons = [
            'upcoming' => '📅',
            'ongoing' => '🟢',
            'completed' => '✅',
            'cancelled' => '❌'
        ];
        return $icons[$this->status] ?? '📅';
    }

    public function canParticipate(): bool
    {
        return $this->status !== 'cancelled' && $this->status !== 'completed';
    }

    public function canEdit(): bool
    {
        return $this->status !== 'completed' && $this->status !== 'cancelled';
    }

    /**
     * Auto-update status based on event date
     * Only for non-cancelled events
     */
    public function autoUpdateStatus(): void
    {
        $now = new \DateTime();
        $eventDate = $this->event_date;
        
        if ($this->status === 'cancelled') {
            return; // Don't auto-update cancelled events
        }
        
        if ($eventDate < $now) {
            $this->status = 'completed';
        } elseif ($eventDate->format('Y-m-d') === $now->format('Y-m-d')) {
            $this->status = 'ongoing';
        } else {
            $this->status = 'upcoming';
        }
    }

    // ========== RELATIONSHIPS ==========

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

    #[ORM\OneToMany(targetEntity: Planification::class, mappedBy: 'event', cascade: ['persist', 'remove'])]
    private Collection $planifications;

    public function __construct()
    {
        $this->planifications = new ArrayCollection();
        $this->created_at = new \DateTime();
        $this->status = 'upcoming';
    }

    /**
     * @return Collection<int, Planification>
     */
    public function getPlanifications(): Collection
    {
        return $this->planifications;
    }

    public function addPlanification(Planification $planification): self
    {
        if (!$this->planifications->contains($planification)) {
            $this->planifications->add($planification);
            $planification->setEvent($this);
        }
        return $this;
    }

    public function removePlanification(Planification $planification): self
    {
        if ($this->planifications->removeElement($planification)) {
            if ($planification->getEvent() === $this) {
                $planification->setEvent(null);
            }
        }
        return $this;
    }

    // ========== HELPER METHODS ==========

    /**
     * Get current number of participants
     */
    public function getCurrentParticipantsCount(EntityManagerInterface $em): int
    {
        $conn = $em->getConnection();
        return (int)$conn->executeQuery(
            "SELECT COUNT(*) FROM participations WHERE event_id = :id",
            ['id' => $this->id]
        )->fetchOne();
    }

    /**
     * Check if event is full
     */
    public function isFull(EntityManagerInterface $em): bool
    {
        return $this->getCurrentParticipantsCount($em) >= $this->max_participants;
    }

    /**
     * Get participation rate percentage
     */
    public function getParticipationRate(EntityManagerInterface $em): float
    {
        if ($this->max_participants <= 0) {
            return 0;
        }
        return round(($this->getCurrentParticipantsCount($em) / $this->max_participants) * 100, 1);
    }

    /**
     * Check if event is new (created within last 7 days)
     */
    public function isNew(): bool
    {
        if (!$this->created_at) {
            return false;
        }
        $now = new \DateTime();
        $diff = $now->diff($this->created_at);
        return $diff->days <= 7;
    }

    /**
     * Get days left until event
     */
    public function getDaysLeft(): ?int
    {
        if (!$this->event_date) {
            return null;
        }
        $now = new \DateTime();
        if ($this->event_date < $now) {
            return null;
        }
        $diff = $now->diff($this->event_date);
        return (int)$diff->days;
    }

    /**
     * Check if event is urgent (less than 3 days left)
     */
    public function isUrgent(): bool
    {
        $daysLeft = $this->getDaysLeft();
        return $daysLeft !== null && $daysLeft <= 3 && $daysLeft >= 0;
    }
}