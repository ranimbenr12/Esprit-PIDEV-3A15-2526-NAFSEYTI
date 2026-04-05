<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ReductionsUtilisateurRepository;

#[ORM\Entity(repositoryClass: ReductionsUtilisateurRepository::class)]
#[ORM\Table(name: 'reductions_utilisateur')]
class ReductionsUtilisateur
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

    #[ORM\Column(type: 'integer', nullable: false)]
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

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_obtention = null;

    public function getDate_obtention(): ?\DateTimeInterface
    {
        return $this->date_obtention;
    }

    public function setDate_obtention(\DateTimeInterface $date_obtention): self
    {
        $this->date_obtention = $date_obtention;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $utilise = null;

    public function isUtilise(): ?bool
    {
        return $this->utilise;
    }

    public function setUtilise(?bool $utilise): self
    {
        $this->utilise = $utilise;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $code_promo = null;

    public function getCode_promo(): ?string
    {
        return $this->code_promo;
    }

    public function setCode_promo(?string $code_promo): self
    {
        $this->code_promo = $code_promo;
        return $this;
    }

}
