<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\PostRepository;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\Table(name: 'post')]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $titre = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
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

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $like_count = null;

    public function getLike_count(): ?int
    {
        return $this->like_count;
    }

    public function setLike_count(?int $like_count): self
    {
        $this->like_count = $like_count;
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

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $forum_id = null;

    public function getForum_id(): ?int
    {
        return $this->forum_id;
    }

    public function setForum_id(?int $forum_id): self
    {
        $this->forum_id = $forum_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $dislike_count = null;

    public function getDislike_count(): ?int
    {
        return $this->dislike_count;
    }

    public function setDislike_count(?int $dislike_count): self
    {
        $this->dislike_count = $dislike_count;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $theme = null;

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;
        return $this;
    }

}
