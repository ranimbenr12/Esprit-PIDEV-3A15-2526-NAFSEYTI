<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\SuiviRepository;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
#[ORM\Table(name: 'suivis')]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_suivi = null;

    public function getId_suivi(): ?int
    {
        return $this->id_suivi;
    }

    public function setId_suivi(int $id_suivi): self
    {
        $this->id_suivi = $id_suivi;
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
    private ?int $id_psychologue = null;

    public function getId_psychologue(): ?int
    {
        return $this->id_psychologue;
    }

    public function setId_psychologue(int $id_psychologue): self
    {
        $this->id_psychologue = $id_psychologue;
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

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_modification = null;

    public function getDate_modification(): ?\DateTimeInterface
    {
        return $this->date_modification;
    }

    public function setDate_modification(?\DateTimeInterface $date_modification): self
    {
        $this->date_modification = $date_modification;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $type_suivi = null;

    public function getType_suivi(): ?string
    {
        return $this->type_suivi;
    }

    public function setType_suivi(string $type_suivi): self
    {
        $this->type_suivi = $type_suivi;
        return $this;
    }

}
