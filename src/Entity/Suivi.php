<?php
namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
#[ORM\Table(name: 'suivis')]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_suivi')]
    private ?int $idsuivi = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?User $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'id_psychologue', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?User $psychologue = null;

    #[ORM\Column(name: 'titre', length: 255)]
    private ?string $titre = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column(name: 'date_modification', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $date_modification = null;

    #[ORM\Column(name: 'type_suivi', length: 50)]
    private ?string $type_suivi = null;

    #[ORM\OneToMany(mappedBy: 'suivi', targetEntity: Objectif::class, cascade: ['persist', 'remove'])]
    private Collection $objectifs;

    public function __construct()
    {
        $this->objectifs = new ArrayCollection();
        $this->date_creation = new \DateTime();
        $this->date_modification = new \DateTime();
    }

    public function getIdsuivi(): ?int { return $this->idsuivi; }

    public function getUtilisateur(): ?User { return $this->utilisateur; }
    public function setUtilisateur(?User $utilisateur): self { $this->utilisateur = $utilisateur; return $this; }

    // Compat backward : retourne l'ID brut si besoin
    public function getIdutilisateur(): ?int { return $this->utilisateur?->getId(); }
    public function setIdutilisateur(int $id): self { return $this; } // no-op, utiliser setUtilisateur()

    public function getPsychologue(): ?User { return $this->psychologue; }
    public function setPsychologue(?User $psychologue): self { $this->psychologue = $psychologue; return $this; }

    public function getIdpsychologue(): ?int { return $this->psychologue?->getId(); }
    public function setIdpsychologue(int $id): self { return $this; } // no-op

    public function getTitre(): ?string { return $this->titre; }
    public function setTitre(string $titre): self { $this->titre = $titre; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }

    public function getDateCreation(): ?\DateTimeInterface { return $this->date_creation; }
    public function setDateCreation(\DateTimeInterface $date_creation): self { $this->date_creation = $date_creation; return $this; }

    public function getDateModification(): ?\DateTimeInterface { return $this->date_modification; }
    public function setDateModification(\DateTimeInterface $date_modification): self { $this->date_modification = $date_modification; return $this; }

    public function getTypeSuivi(): ?string { return $this->type_suivi; }
    public function setTypeSuivi(string $type_suivi): self { $this->type_suivi = $type_suivi; return $this; }

    public function getObjectifs(): Collection { return $this->objectifs; }

    public function addObjectif(Objectif $objectif): self
    {
        if (!$this->objectifs->contains($objectif)) {
            $this->objectifs->add($objectif);
            $objectif->setSuivi($this);
        }
        return $this;
    }

    public function removeObjectif(Objectif $objectif): self
    {
        if ($this->objectifs->removeElement($objectif)) {
            if ($objectif->getSuivi() === $this) {
                $objectif->setSuivi(null);
            }
        }
        return $this;
    }

    public function __toString(): string
    {
        return $this->titre ?? 'Suivi #' . $this->idsuivi;
    }
}
