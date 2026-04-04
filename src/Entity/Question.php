<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\QuestionRepository;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
#[ORM\Table(name: 'questions')]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Test::class, inversedBy: 'questions')]
    #[ORM\JoinColumn(name: 'test_id', referencedColumnName: 'id', nullable: false)]
    private ?Test $test = null;

    #[ORM\Column(name: 'texte', type: 'text')]
    private ?string $texte = null;

    #[ORM\Column(name: 'type_question', type: 'string', length: 30, nullable: true)]
    private ?string $typeQuestion = null;

    #[ORM\Column(name: 'reponses_possibles', type: 'text', nullable: true)]
    private ?string $reponsesPossibles = null;

    #[ORM\Column(name: 'points', type: 'integer', nullable: true)]
    private ?int $points = 1;

    #[ORM\Column(name: 'ordre', type: 'integer', nullable: true)]
    private ?int $ordre = null;

    #[ORM\Column(name: 'obligatoire', type: 'boolean', nullable: true)]
    private ?bool $obligatoire = true;

    #[ORM\Column(name: 'status', type: 'string', length: 20, nullable: true)]
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

    public function getId(): ?int { return $this->id; }

    public function getTest(): ?Test { return $this->test; }
    public function setTest(?Test $test): self { $this->test = $test; return $this; }

    public function getTexte(): ?string { return $this->texte; }
    public function setTexte(string $texte): self { $this->texte = $texte; return $this; }

    public function getTypeQuestion(): ?string { return $this->typeQuestion; }
    public function setTypeQuestion(?string $typeQuestion): self { $this->typeQuestion = $typeQuestion; return $this; }

    public function getReponsesPossibles(): ?string { return $this->reponsesPossibles; }
    public function setReponsesPossibles(?string $reponsesPossibles): self { $this->reponsesPossibles = $reponsesPossibles; return $this; }

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
}