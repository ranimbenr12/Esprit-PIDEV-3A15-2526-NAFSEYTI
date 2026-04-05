<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\MediasObjectifRepository;

#[ORM\Entity(repositoryClass: MediasObjectifRepository::class)]
#[ORM\Table(name: 'medias_objectifs')]
class MediasObjectif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_media = null;

    public function getId_media(): ?int
    {
        return $this->id_media;
    }

    public function setId_media(int $id_media): self
    {
        $this->id_media = $id_media;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_objectif = null;

    public function getId_objectif(): ?int
    {
        return $this->id_objectif;
    }

    public function setId_objectif(int $id_objectif): self
    {
        $this->id_objectif = $id_objectif;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $type_media = null;

    public function getType_media(): ?string
    {
        return $this->type_media;
    }

    public function setType_media(string $type_media): self
    {
        $this->type_media = $type_media;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $chemin_fichier = null;

    public function getChemin_fichier(): ?string
    {
        return $this->chemin_fichier;
    }

    public function setChemin_fichier(string $chemin_fichier): self
    {
        $this->chemin_fichier = $chemin_fichier;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_ajout = null;

    public function getDate_ajout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDate_ajout(?\DateTimeInterface $date_ajout): self
    {
        $this->date_ajout = $date_ajout;
        return $this;
    }

}
