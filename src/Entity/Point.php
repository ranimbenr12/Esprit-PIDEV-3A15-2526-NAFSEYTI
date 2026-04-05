<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\PointRepository;

#[ORM\Entity(repositoryClass: PointRepository::class)]
#[ORM\Table(name: 'points')]
class Point
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_point = null;

    public function getId_point(): ?int
    {
        return $this->id_point;
    }

    public function setId_point(int $id_point): self
    {
        $this->id_point = $id_point;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_utilisateur = null;

    public function getId_utilisateur(): ?int
    {
        return $this->id_utilisateur;
    }

    public function setId_utilisateur(int $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $id_objectif = null;

    public function getId_objectif(): ?int
    {
        return $this->id_objectif;
    }

    public function setId_objectif(?int $id_objectif): self
    {
        $this->id_objectif = $id_objectif;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $nombre_points = null;

    public function getNombre_points(): ?int
    {
        return $this->nombre_points;
    }

    public function setNombre_points(int $nombre_points): self
    {
        $this->nombre_points = $nombre_points;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_attribution = null;

    public function getDate_attribution(): ?\DateTimeInterface
    {
        return $this->date_attribution;
    }

    public function setDate_attribution(\DateTimeInterface $date_attribution): self
    {
        $this->date_attribution = $date_attribution;
        return $this;
    }

}
