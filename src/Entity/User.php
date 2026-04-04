<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $profilePhoto = null;

    #[ORM\Column(type: 'string')]
    private ?string $firstname = null;

    #[ORM\Column(type: 'string')]
    private ?string $lastname = null;

    #[ORM\Column(type: 'string')]
    private ?string $email = null;

    #[ORM\Column(type: 'string')]
    private ?string $password = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $address = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $location = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $role = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $status = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Event::class)]
    private Collection $events;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: RendezVous::class)]
    private Collection $rendezVous;

    #[ORM\OneToMany(mappedBy: 'medecin', targetEntity: RendezVous::class)]
    private Collection $rendezVousComeMedecin;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Suivi::class)]
    private Collection $suivis;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Test::class)]
    private Collection $tests;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: JournalEntry::class)]
    private Collection $journalEntries;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->rendezVous = new ArrayCollection();
        $this->rendezVousComeMedecin = new ArrayCollection();
        $this->suivis = new ArrayCollection();
        $this->tests = new ArrayCollection();
        $this->journalEntries = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getProfilePhoto(): ?string { return $this->profilePhoto; }
    public function setProfilePhoto(?string $profilePhoto): self
    {
        $this->profilePhoto = $profilePhoto;
        return $this;
    }

    public function getFirstname(): ?string { return $this->firstname; }
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string { return $this->lastname; }
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string { return $this->password; }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getAddress(): ?string { return $this->address; }
    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getLocation(): ?string { return $this->location; }
    public function setLocation(?string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getPhoneNumber(): ?string { return $this->phoneNumber; }
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getRole(): ?string { return $this->role; }
    public function setRole(?string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getStatus(): ?string { return $this->status; }
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getEvents(): Collection { return $this->events; }
    public function getRendezVous(): Collection { return $this->rendezVous; }
    public function getRendezVousComeMedecin(): Collection { return $this->rendezVousComeMedecin; }
    public function getSuivis(): Collection { return $this->suivis; }
    public function getTests(): Collection { return $this->tests; }
    public function getJournalEntries(): Collection { return $this->journalEntries; }
}