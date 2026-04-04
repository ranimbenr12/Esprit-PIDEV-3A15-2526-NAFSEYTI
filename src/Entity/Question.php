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
        choices: ["qcm_unique", "qcm_multiple", "texte_libre", "likert", "numerique"],
        message: "Veuillez choisir un type de question valide"
    )]
    private ?string $typeQuestion = null;

    #[ORM\Column(name: 'reponses_possibles', type: 'text', nullable: true)]
    private ?string $reponsesPossibles = null;

    #[ORM\Column(name: 'points', type: 'integer', nullable: true)]
    #[Assert\Positive(message: "Les points doivent être un nombre positif")]
    #[Assert\LessThanOrEqual(
        value: 100,
        message: "Les points ne peuvent pas dépasser {{ compared_value }}"
    )]
    #[Assert\GreaterThanOrEqual(
        value: 1,
        message: "Les points doivent être au moins {{ compared_value }}"
    )]
    private ?int $points = 1;

    #[ORM\Column(name: 'ordre', type: 'integer', nullable: true)]
    #[Assert\PositiveOrZero(message: "L'ordre doit être un nombre positif ou zéro")]
    #[Assert\LessThanOrEqual(
        value: 999,
        message: "L'ordre ne peut pas dépasser {{ compared_value }}"
    )]
    private ?int $ordre = null;

    #[ORM\Column(name: 'obligatoire', type: 'boolean', nullable: true)]
    private ?bool $obligatoire = true;

    #[ORM\Column(name: 'status', type: 'string', length: 20, nullable: true)]
    #[Assert\Choice(
        choices: ["actif", "inactif"],
        message: "Le status doit être 'actif' ou 'inactif'"
    )]
    private ?string $status = 'actif';

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    // ✅ Clé : cette collection permet à ReponsesScore d'utiliser inversedBy: 'reponses'
    #[ORM\OneToMany(mappedBy: 'question', targetEntity: ReponsesScore::class)]
    private Collection $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * Validation personnalisée pour les réponses possibles
     */
    #[Assert\Callback]
    public function validateReponsesPossibles(ExecutionContextInterface $context): void
    {
        // Pour les QCM, les réponses possibles sont obligatoires
        if (($this->typeQuestion === 'qcm_unique' || $this->typeQuestion === 'qcm_multiple')) {
            
            // Vérifier que les réponses possibles ne sont pas vides
            if (empty($this->reponsesPossibles) || trim($this->reponsesPossibles) === '') {
                $context->buildViolation('Pour les questions QCM, vous devez spécifier les réponses possibles.')
                    ->atPath('reponsesPossibles')
                    ->addViolation();
                return;
            }
            
            // Vérifier le format des réponses possibles
            $reponses = array_map('trim', explode(',', $this->reponsesPossibles));
            
            // Filtrer les réponses vides
            $reponses = array_filter($reponses, function($reponse) {
                return !empty($reponse);
            });
            
            // Vérifier le nombre d'options
            if (count($reponses) < 2) {
                $context->buildViolation('Les questions QCM doivent avoir au moins 2 options de réponse.')
                    ->atPath('reponsesPossibles')
                    ->addViolation();
            }
            
            if (count($reponses) > 10) {
                $context->buildViolation('Les questions QCM ne peuvent pas avoir plus de 10 options.')
                    ->atPath('reponsesPossibles')
                    ->addViolation();
            }
            
            // Vérifier la longueur de chaque option
            foreach ($reponses as $index => $reponse) {
                if (strlen($reponse) > 255) {
                    $context->buildViolation("L'option " . ($index + 1) . " ne doit pas dépasser 255 caractères.")
                        ->atPath('reponsesPossibles')
                        ->addViolation();
                }
            }
        }
        
        // Pour les questions à choix unique, vérification supplémentaire
        if ($this->typeQuestion === 'qcm_unique' && !empty($this->reponsesPossibles)) {
            $reponses = array_map('trim', explode(',', $this->reponsesPossibles));
            $reponses = array_filter($reponses);
            
            // Vérifier qu'il n'y a pas de doublons
            if (count($reponses) !== count(array_unique($reponses))) {
                $context->buildViolation('Les options de réponse ne doivent pas être en double.')
                    ->atPath('reponsesPossibles')
                    ->addViolation();
            }
        }
    }

    public function getId(): ?int 
    { 
        return $this->id; 
    }

    public function getTest(): ?Test 
    { 
        return $this->test; 
    }
    
    public function setTest(?Test $test): self 
    { 
        $this->test = $test; 
        return $this; 
    }

    public function getTexte(): ?string 
    { 
        return $this->texte; 
    }
    
    public function setTexte(string $texte): self 
    { 
        $this->texte = $texte; 
        return $this; 
    }

    public function getTypeQuestion(): ?string 
    { 
        return $this->typeQuestion; 
    }
    
    public function setTypeQuestion(?string $typeQuestion): self 
    { 
        $this->typeQuestion = $typeQuestion; 
        return $this; 
    }

    public function getReponsesPossibles(): ?string 
    { 
        return $this->reponsesPossibles; 
    }
    
    public function setReponsesPossibles(?string $reponsesPossibles): self 
    { 
        $this->reponsesPossibles = $reponsesPossibles; 
        return $this; 
    }

    /**
     * Retourne un tableau des réponses possibles
     */
    public function getReponsesPossiblesArray(): array
    {
        if (empty($this->reponsesPossibles)) {
            return [];
        }
        
        $reponses = array_map('trim', explode(',', $this->reponsesPossibles));
        return array_filter($reponses);
    }

    public function getPoints(): ?int 
    { 
        return $this->points; 
    }
    
    public function setPoints(?int $points): self 
    { 
        $this->points = $points; 
        return $this; 
    }

    public function getOrdre(): ?int 
    { 
        return $this->ordre; 
    }
    
    public function setOrdre(?int $ordre): self 
    { 
        $this->ordre = $ordre; 
        return $this; 
    }

    public function getObligatoire(): ?bool 
    { 
        return $this->obligatoire; 
    }
    
    public function setObligatoire(?bool $obligatoire): self 
    { 
        $this->obligatoire = $obligatoire; 
        return $this; 
    }

    public function getStatus(): ?string 
    { 
        return $this->status; 
    }
    
    public function setStatus(?string $status): self 
    { 
        $this->status = $status; 
        return $this; 
    }

    public function getCreatedAt(): ?\DateTimeInterface 
    { 
        return $this->createdAt; 
    }
    
    public function setCreatedAt(\DateTimeInterface $createdAt): self 
    { 
        $this->createdAt = $createdAt; 
        return $this; 
    }

    public function getReponses(): Collection 
    { 
        return $this->reponses; 
    }

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