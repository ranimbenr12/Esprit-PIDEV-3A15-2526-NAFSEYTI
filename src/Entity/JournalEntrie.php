<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\JournalEntrieRepository;

#[ORM\Entity(repositoryClass: JournalEntrieRepository::class)]
#[ORM\Table(name: 'journal_entries')]
class JournalEntrie
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

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $date = null;

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $humeur = null;

    public function getHumeur(): ?string
    {
        return $this->humeur;
    }

    public function setHumeur(string $humeur): self
    {
        $this->humeur = $humeur;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $emotions = null;

    public function getEmotions(): ?string
    {
        return $this->emotions;
    }

    public function setEmotions(?string $emotions): self
    {
        $this->emotions = $emotions;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $note_texte = null;

    public function getNote_texte(): ?string
    {
        return $this->note_texte;
    }

    public function setNote_texte(?string $note_texte): self
    {
        $this->note_texte = $note_texte;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $energie = null;

    public function getEnergie(): ?int
    {
        return $this->energie;
    }

    public function setEnergie(int $energie): self
    {
        $this->energie = $energie;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $sommeil_qualite = null;

    public function getSommeil_qualite(): ?int
    {
        return $this->sommeil_qualite;
    }

    public function setSommeil_qualite(int $sommeil_qualite): self
    {
        $this->sommeil_qualite = $sommeil_qualite;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    public function getCreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $updated_at = null;

    public function getUpdated_at(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdated_at(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

}
