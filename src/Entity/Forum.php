<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ForumRepository;

#[ORM\Entity(repositoryClass: ForumRepository::class)]
#[ORM\Table(name: 'forum')]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_forum = null;

    public function getId_forum(): ?int
    {
        return $this->id_forum;
    }

    public function setId_forum(int $id_forum): self
    {
        $this->id_forum = $id_forum;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nom_forum = null;

    public function getNom_forum(): ?string
    {
        return $this->nom_forum;
    }

    public function setNom_forum(string $nom_forum): self
    {
        $this->nom_forum = $nom_forum;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
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

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_creation = null;

    public function getDate_creation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDate_creation(?\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $statut = null;

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

}
