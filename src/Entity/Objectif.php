<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ObjectifRepository::class)]
#[ORM\Table(name: 'objectifs')]
class Objectif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_objectif')]  // ← CORRIGÉ
    private ?int $idobjectif = null;

    #[ORM\ManyToOne(inversedBy: 'objectifs')]
    #[ORM\JoinColumn(name: 'id_suivi', referencedColumnName: 'id_suivi', nullable: false)]  // ← CORRIGÉ
    private ?Suivi $suivi = null;

    #[ORM\Column(name: 'titre', length: 255)]
    private ?string $titre = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'date_creation', type: 'datetime')]
    private ?\DateTimeInterface $date_creation = null;

    #[ORM\Column(name: 'date_echeance', type: 'date', nullable: true)]
    private ?\DateTimeInterface $date_echeance = null;

    #[ORM\Column(name: 'valide', type: 'boolean', options: ['default' => false])]
    private ?bool $valide = false;

    #[ORM\OneToMany(mappedBy: 'objectif', targetEntity: MediasObjectif::class, cascade: ['persist', 'remove'])]
    private Collection $medias;

    public function __construct()
    {
        $this->date_creation = new \DateTime();
        $this->medias = new ArrayCollection();
    }

    // ===================== GETTERS =====================
    public function getIdobjectif(): ?int 
    { 
        return $this->idobjectif; 
    }
    
    public function getSuivi(): ?Suivi 
    { 
        return $this->suivi; 
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
    
    public function getDateEcheance(): ?\DateTimeInterface 
    { 
        return $this->date_echeance; 
    }
    
    public function isValide(): ?bool 
    { 
        return $this->valide; 
    }
    
    public function getMedias(): Collection 
    { 
        return $this->medias; 
    }

    // ===================== SETTERS =====================
    public function setIdobjectif(int $idobjectif): self 
    { 
        $this->idobjectif = $idobjectif; 
        return $this; 
    }
    
    public function setSuivi(?Suivi $suivi): self 
    { 
        $this->suivi = $suivi; 
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
    
    public function setDateEcheance(?\DateTimeInterface $date_echeance): self 
    { 
        $this->date_echeance = $date_echeance; 
        return $this; 
    }
    
    public function setValide(bool $valide): self 
    { 
        $this->valide = $valide; 
        return $this; 
    }
    
    public function addMedia(MediasObjectif $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
            $media->setObjectif($this);
        }
        return $this;
    }
    
    public function removeMedia(MediasObjectif $media): self
    {
        if ($this->medias->removeElement($media)) {
            if ($media->getObjectif() === $this) {
                $media->setObjectif(null);
            }
        }
        return $this;
    }

    public function __toString(): string 
    {
        return $this->titre ?? 'Objectif #' . $this->idobjectif;
    }
}