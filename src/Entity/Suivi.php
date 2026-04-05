<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
#[ORM\Table(name: 'suivis')]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_suivi')]  // ← CORRIGÉ
    private ?int $idsuivi = null;

    #[ORM\Column(name: 'id_utilisateur')]  // ← CORRIGÉ
    private ?int $idutilisateur = null;

    #[ORM\Column(name: 'id_psychologue')]  // ← CORRIGÉ
    private ?int $idpsychologue = null;

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

    // ===================== GETTERS =====================
    public function getIdsuivi(): ?int 
    { 
        return $this->idsuivi; 
    }
    
    public function getIdutilisateur(): ?int 
    { 
        return $this->idutilisateur; 
    }
    
    public function getIdpsychologue(): ?int 
    { 
        return $this->idpsychologue; 
    }
    
    public function getTitre(): ?string 
    { 
        return $this->titre; 
    }
    
    public function getDescription(): ?string 
    { 
        return $this->description; 
    }
    
    public function getDateCreation(): ?\DateTimeInterface 
    { 
        return $this->date_creation; 
    }
    
    public function getDateModification(): ?\DateTimeInterface 
    { 
        return $this->date_modification; 
    }
    
    public function getTypeSuivi(): ?string 
    { 
        return $this->type_suivi; 
    }
    
    public function getObjectifs(): Collection 
    { 
        return $this->objectifs; 
    }

    // ===================== SETTERS =====================
    public function setIdsuivi(int $idsuivi): self 
    { 
        $this->idsuivi = $idsuivi; 
        return $this; 
    }
    
    public function setIdutilisateur(int $idutilisateur): self 
    { 
        $this->idutilisateur = $idutilisateur; 
        return $this; 
    }
    
    public function setIdpsychologue(int $idpsychologue): self 
    { 
        $this->idpsychologue = $idpsychologue; 
        return $this; 
    }
    
    public function setTitre(string $titre): self 
    { 
        $this->titre = $titre; 
        return $this; 
    }
    
    public function setDescription(?string $description): self 
    { 
        $this->description = $description; 
        return $this; 
    }
    
    public function setDateCreation(\DateTimeInterface $date_creation): self 
    { 
        $this->date_creation = $date_creation; 
        return $this; 
    }
    
    public function setDateModification(\DateTimeInterface $date_modification): self 
    { 
        $this->date_modification = $date_modification; 
        return $this; 
    }
    
    public function setTypeSuivi(string $type_suivi): self 
    { 
        $this->type_suivi = $type_suivi; 
        return $this; 
    }
    
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