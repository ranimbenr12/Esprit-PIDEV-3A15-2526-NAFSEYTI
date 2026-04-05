<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

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
    #[Assert\NotBlank(message: "Forum name is required")]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: "Forum name must be at least {{ limit }} characters long",
        maxMessage: "Forum name cannot exceed {{ limit }} characters"
    )]
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
    #[Assert\Length(
        max: 1000,
        maxMessage: "Description cannot exceed {{ limit }} characters"
    )]
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
    #[Assert\Type(\DateTimeInterface::class, message: "Invalid date format")]
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
    #[Assert\Choice(
        choices: ['active', 'inactive', 'archived'],
        message: "Status must be one of: active, inactive, archived"
    )]
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