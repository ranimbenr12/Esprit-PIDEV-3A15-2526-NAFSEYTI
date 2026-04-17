<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReponsesScoreRepository;

#[ORM\Entity(repositoryClass: ReponsesScoreRepository::class)]
#[ORM\Table(name: 'reponses_score')]
class ReponsesScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: true)]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Test::class)]
    #[ORM\JoinColumn(name: 'test_id', referencedColumnName: 'id')]
    private ?Test $test = null;

    #[ORM\ManyToOne(targetEntity: Question::class, inversedBy: 'reponses')]
    #[ORM\JoinColumn(name: 'question_id', referencedColumnName: 'id')]
    private ?Question $question = null;

    #[ORM\Column(name: 'reponse', type: 'text', nullable: true)]
    private ?string $reponse = null;

    #[ORM\Column(name: 'score', type: 'integer', nullable: true)]
    private ?int $score = null;

    #[ORM\Column(name: 'session_id', type: 'string', length: 255, nullable: true)]
    private ?string $sessionId = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    // Getters et Setters
    public function getId(): ?int { return $this->id; }
    
    public function getUser(): ?User { return $this->user; }
    public function setUser(?User $user): self { $this->user = $user; return $this; }
    
    public function getTest(): ?Test { return $this->test; }
    public function setTest(?Test $test): self { $this->test = $test; return $this; }
    
    public function getQuestion(): ?Question { return $this->question; }
    public function setQuestion(?Question $question): self { $this->question = $question; return $this; }
    
    public function getReponse(): ?string { return $this->reponse; }
    public function setReponse(?string $reponse): self { $this->reponse = $reponse; return $this; }
    
    public function getScore(): ?int { return $this->score; }
    public function setScore(?int $score): self { $this->score = $score; return $this; }
    
    public function getSessionId(): ?string { return $this->sessionId; }
    public function setSessionId(?string $sessionId): self { $this->sessionId = $sessionId; return $this; }
    
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
}