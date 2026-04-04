<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\QuestionRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
#[ORM\Table(name: 'questions')]
#[ORM\HasLifecycleCallbacks]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Test::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(name: 'test_id', referencedColumnName: 'id', nullable: false)]
    #[Assert\NotNull(message: "Veuillez sélectionner un test")]
    private ?Test $test = null;

    #[ORM\Column(name: 'texte', type: 'text')]
    #[Assert\NotBlank(message: "Le texte de la question est obligatoire")]
    #[Assert\Length(
        min: 5,
        max: 5000,
        minMessage: "Le texte doit contenir au moins {{ limit }} caractères",
        maxMessage: "Le texte ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $texte = null;

    #[ORM\Column(name: 'type_question', type: 'string', length: 30, nullable: true)]
    #[Assert\NotBlank(message: "Le type de question est obligatoire")]
    #[Assert\Choice(
        choices: ["qcm_unique", "qcm_multiple", "texte_libre", "likert", "numerique", "vrai_faux"],
        message: "Veuillez choisir un type de question valide"
    )]
    private ?string $typeQuestion = null;

    #[ORM\Column(name: 'reponses_possibles', type: 'text', nullable: true)]
    private ?string $reponsesPossibles = null;

    #[ORM\Column(name: 'points', type: 'integer', nullable: true)]
    #[Assert\Positive(message: "Les points doivent être un nombre positif")]
    #[Assert\LessThanOrEqual(value: 100, message: "Les points ne peuvent pas dépasser {{ compared_value }}")]
    private ?int $points = 1;

    #[ORM\Column(name: 'ordre', type: 'integer', nullable: true)]
    #[Assert\PositiveOrZero(message: "L'ordre doit être un nombre positif ou zéro")]
    private ?int $ordre = null;

    #[ORM\Column(name: 'obligatoire', type: 'boolean', nullable: true)]
    private ?bool $obligatoire = true;

    #[ORM\Column(name: 'status', type: 'string', length: 20, nullable: true)]
    #[Assert\Choice(choices: ["actif", "inactif"], message: "Le status doit être 'actif' ou 'inactif'")]
    private ?string $status = 'actif';

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: ReponsesScore::class)]
    private Collection $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * Retourne un tableau des réponses possibles
     * Supporte les séparateurs: | (pipe) ou , (virgule)
     */
   /**
 * Retourne un tableau des réponses possibles
 * Supporte les séparateurs: | (pipe) ou , (virgule)
 * Gère automatiquement les types spéciaux
 */
public function getReponsesPossiblesArray(): array
{
    // Pour les questions vrai/faux, retourner les options par défaut
    if ($this->typeQuestion === 'vrai_faux') {
        return ['Vrai', 'Faux'];
    }
    
    
    
    // Pour les QCM, utiliser les valeurs de la base
    if (empty($this->reponsesPossibles)) {
        return [];
    }
    
    // Détecter le séparateur (| ou ,)
    if (strpos($this->reponsesPossibles, '|') !== false) {
        $reponses = array_map('trim', explode('|', $this->reponsesPossibles));
    } else {
        $reponses = array_map('trim', explode(',', $this->reponsesPossibles));
    }
    
    return array_filter($reponses);
}

    /**
     * Retourne le type de champ à afficher
     */
    public function getInputType(): string
    {
        $types = [
            'texte_libre' => 'textarea',
            'numerique' => 'number',
            'qcm_unique' => 'radio',
            'qcm_multiple' => 'checkbox',
            'likert' => 'select',
            'vrai_faux' => 'radio'
        ];
        
        return $types[$this->typeQuestion] ?? 'text';
    }

    /**
     * Retourne le message d'aide
     */
    public function getInputHelpMessage(): string
    {
        $messages = [
            'texte_libre' => '📝 Saisissez votre réponse en texte libre',
            'numerique' => '🔢 Saisissez un nombre',
            'qcm_unique' => '🔘 Sélectionnez une seule option',
            'qcm_multiple' => '☑️ Vous pouvez sélectionner plusieurs options',
            'likert' => '⭐ Sélectionnez votre niveau d\'accord (1-5)',
            'vrai_faux' => '✅ Sélectionnez Vrai ou Faux'
        ];
        
        return $messages[$this->typeQuestion] ?? 'Saisissez votre réponse';
    }

    // Getters et Setters
    public function getId(): ?int { return $this->id; }

    public function getTest(): ?Test { return $this->test; }
    public function setTest(?Test $test): self { $this->test = $test; return $this; }

    public function getTexte(): ?string { return $this->texte; }
    public function setTexte(string $texte): self { $this->texte = $texte; return $this; }

    public function getTypeQuestion(): ?string { return $this->typeQuestion; }
   public function setTypeQuestion(?string $typeQuestion): self 
{ 
    // Normaliser les types
    if ($typeQuestion === 'qcm') {
        $typeQuestion = 'qcm_unique';
    }
    if ($typeQuestion === 'vrai/faux') {
        $typeQuestion = 'vrai_faux';
    }
    $this->typeQuestion = $typeQuestion; 
    return $this; 
}
    public function getReponsesPossibles(): ?string { return $this->reponsesPossibles; }
    public function setReponsesPossibles(?string $reponsesPossibles): self 
    { 
        $this->reponsesPossibles = $reponsesPossibles; 
        return $this; 
    }

    public function getPoints(): ?int { return $this->points; }
    public function setPoints(?int $points): self { $this->points = $points; return $this; }

    public function getOrdre(): ?int { return $this->ordre; }
    public function setOrdre(?int $ordre): self { $this->ordre = $ordre; return $this; }

    public function getObligatoire(): ?bool { return $this->obligatoire; }
    public function setObligatoire(?bool $obligatoire): self { $this->obligatoire = $obligatoire; return $this; }

    public function getStatus(): ?string { return $this->status; }
    public function setStatus(?string $status): self { $this->status = $status; return $this; }

    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }

    public function getReponses(): Collection { return $this->reponses; }

    public function addReponse(ReponsesScore $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setQuestion($this);
        }
        return $this;
    }

    public function removeReponse(ReponsesScore $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            if ($reponse->getQuestion() === $this) {
                $reponse->setQuestion(null);
            }
        }
        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = new \DateTime();
        }
    }
}