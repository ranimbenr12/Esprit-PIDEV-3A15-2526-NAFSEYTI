<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentaireRepository;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
#[ORM\Table(name: 'commentaire')]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: 'integer')]
    private ?int $id_commentaire = null;

    public function getId_commentaire(): ?int
    {
        return $this->id_commentaire;
    }

    public function setId_commentaire(int $id_commentaire): self
    {
        $this->id_commentaire = $id_commentaire;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $contenu = null;

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_commentaire = null;

    public function getDate_commentaire(): ?\DateTimeInterface
    {
        return $this->date_commentaire;
    }

    public function setDate_commentaire(?\DateTimeInterface $date_commentaire): self
    {
        $this->date_commentaire = $date_commentaire;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_post = null;

    public function getId_post(): ?int
    {
        return $this->id_post;
    }

    public function setId_post(int $id_post): self
    {
        $this->id_post = $id_post;
        return $this;
    }
}