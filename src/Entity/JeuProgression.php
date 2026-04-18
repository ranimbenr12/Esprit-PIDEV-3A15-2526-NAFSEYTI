<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'jeu_progression')]
class JeuProgression
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private int $id_utilisateur;

    #[ORM\Column(type: 'string', length: 50)]
    private string $categorie;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $defis_reussis = 0;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $points_gagnes = 0;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $derniere_activite;

    public function getId(): ?int { return $this->id; }
    public function getIdUtilisateur(): int { return $this->id_utilisateur; }
    public function setIdUtilisateur(int $id): self { $this->id_utilisateur = $id; return $this; }
    public function getCategorie(): string { return $this->categorie; }
    public function setCategorie(string $cat): self { $this->categorie = $cat; return $this; }
    public function getDefisReussis(): int { return $this->defis_reussis; }
    public function setDefisReussis(int $nb): self { $this->defis_reussis = $nb; return $this; }
    public function getPointsGagnes(): int { return $this->points_gagnes; }
    public function setPointsGagnes(int $pts): self { $this->points_gagnes = $pts; return $this; }
    public function getDerniereActivite(): \DateTime { return $this->derniere_activite; }
    public function setDerniereActivite(\DateTime $date): self { $this->derniere_activite = $date; return $this; }
}
