<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\JournalEntryRepository;

#[ORM\Entity(repositoryClass: JournalEntryRepository::class)]
#[ORM\Table(name: 'journal_entries')]
class JournalEntry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'journalEntries')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: 'string')]
    private ?string $humeur = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $emotions = null;

    #[ORM\Column(name: 'note_texte', type: 'text', nullable: true)]
    private ?string $noteTexte = null;

    #[ORM\Column(type: 'integer')]
    private ?int $energie = null;

    #[ORM\Column(name: 'sommeil_qualite', type: 'integer')]
    private ?int $sommeilQualite = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name: 'updated_at', type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }

    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): self { $this->user = $user; return $this; }

    public function getDate(): ?\DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): self { $this->date = $date; return $this; }

    public function getHumeur(): ?string { return $this->humeur; }
    public function setHumeur(string $humeur): self { $this->humeur = $humeur; return $this; }

    public function getEmotions(): ?string { return $this->emotions; }
    public function setEmotions(?string $emotions): self { $this->emotions = $emotions; return $this; }

    public function getNoteTexte(): ?string { return $this->noteTexte; }
    public function setNoteTexte(?string $noteTexte): self { $this->noteTexte = $noteTexte; return $this; }

    public function getEnergie(): ?int { return $this->energie; }
    public function setEnergie(int $energie): self { $this->energie = $energie; return $this; }

    public function getSommeilQualite(): ?int { return $this->sommeilQualite; }
    public function setSommeilQualite(int $sommeilQualite): self { $this->sommeilQualite = $sommeilQualite; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }

    public function getUpdatedAt(): ?\DateTimeInterface { return $this->updatedAt; }
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self { $this->updatedAt = $updatedAt; return $this; }
}