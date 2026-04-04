<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReponsesScoreRepository;

#[ORM\Entity(repositoryClass: ReponsesScoreRepository::class)]
#[ORM\Table(name: 'reponses_scores')]
class ReponsesScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    // ✅ inversedBy: 'reponses' correspond à la collection $reponses dans Question
    #[ORM\ManyToOne(targetEntity: Question::class, inversedBy: 'reponses')]
    #[ORM\JoinColumn(name: 'question_id', referencedColumnName: 'id', nullable: false)]
    private ?Question $question = null;

    #[ORM\Column(name: 'lettre_reponse', type: 'string', length: 10)]
    private ?string $lettreReponse = null;

    #[ORM\Column(name: 'points', type: 'integer')]
    private ?int $points = 0;

    public function getId(): ?int { return $this->id; }

    public function getQuestion(): ?Question { return $this->question; }
    public function setQuestion(?Question $question): self { $this->question = $question; return $this; }

    public function getLettreReponse(): ?string { return $this->lettreReponse; }
    public function setLettreReponse(string $lettreReponse): self { $this->lettreReponse = $lettreReponse; return $this; }

    public function getPoints(): ?int { return $this->points; }
    public function setPoints(int $points): self { $this->points = $points; return $this; }
}