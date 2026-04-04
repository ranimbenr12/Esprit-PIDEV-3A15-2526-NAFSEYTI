<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ReductionRepository;

#[ORM\Entity(repositoryClass: ReductionRepository::class)]
#[ORM\Table(name: 'reductions')]
class Reduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_reduction = null;

    public function getId_reduction(): ?int
    {
        return $this->id_reduction;
    }

    public function setId_reduction(int $id_reduction): self
    {
        $this->id_reduction = $id_reduction;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nom_marque = null;

    public function getNom_marque(): ?string
    {
        return $this->nom_marque;
    }

    public function setNom_marque(string $nom_marque): self
    {
        $this->nom_marque = $nom_marque;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $points_requis = null;

    public function getPoints_requis(): ?int
    {
        return $this->points_requis;
    }

    public function setPoints_requis(int $points_requis): self
    {
        $this->points_requis = $points_requis;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $pourcentage_reduction = null;

    public function getPourcentage_reduction(): ?int
    {
        return $this->pourcentage_reduction;
    }

    public function setPourcentage_reduction(int $pourcentage_reduction): self
    {
        $this->pourcentage_reduction = $pourcentage_reduction;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: false)]
    private ?\DateTimeInterface $date_expiration = null;

    public function getDate_expiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDate_expiration(\DateTimeInterface $date_expiration): self
    {
        $this->date_expiration = $date_expiration;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image_url = null;

    public function getImage_url(): ?string
    {
        return $this->image_url;
    }

    public function setImage_url(?string $image_url): self
    {
        $this->image_url = $image_url;
        return $this;
    }

}
