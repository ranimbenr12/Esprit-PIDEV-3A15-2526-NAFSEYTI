<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediasObjectifRepository::class)]
#[ORM\Table(name: 'medias_objectifs')]
class MediasObjectif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_media')]
    private ?int $id_media = null;

    #[ORM\ManyToOne(inversedBy: 'medias')]
    #[ORM\JoinColumn(name: 'id_objectif', referencedColumnName: 'id_objectif', nullable: false)]
    private ?Objectif $objectif = null;

    #[ORM\Column(name: 'type_media', length: 50)]
    private ?string $type_media = null;

    #[ORM\Column(name: 'chemin_fichier', length: 500)]
    private ?string $chemin_fichier = null;

    #[ORM\Column(name: 'date_ajout', type: 'datetime')]
    private ?\DateTimeInterface $date_ajout = null;

    public function __construct()
    {
        $this->date_ajout = new \DateTime();
    }

    // Getters
    public function getIdMedia(): ?int { return $this->id_media; }
    public function getObjectif(): ?Objectif { return $this->objectif; }
    public function getTypeMedia(): ?string { return $this->type_media; }
    public function getCheminFichier(): ?string { return $this->chemin_fichier; }
    public function getDateAjout(): ?\DateTimeInterface { return $this->date_ajout; }
    
    public function getNomFichier(): string 
    {
        if (!$this->chemin_fichier) return '';
        return basename($this->chemin_fichier);
    }

    // Setters
    public function setIdMedia(int $id_media): self { $this->id_media = $id_media; return $this; }
    public function setObjectif(?Objectif $objectif): self { $this->objectif = $objectif; return $this; }
    public function setTypeMedia(string $type_media): self { $this->type_media = $type_media; return $this; }
    public function setCheminFichier(string $chemin_fichier): self { $this->chemin_fichier = $chemin_fichier; return $this; }
    public function setDateAjout(\DateTimeInterface $date_ajout): self { $this->date_ajout = $date_ajout; return $this; }
}