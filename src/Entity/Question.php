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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $test_id = null;

    public function getTest_id(): ?int
    {
        return $this->test_id;
    }

    public function setTest_id(int $test_id): self
    {
        $this->test_id = $test_id;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $texte = null;

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $type_question = null;

    public function getType_question(): ?string
    {
        return $this->type_question;
    }

    public function setType_question(?string $type_question): self
    {
        $this->type_question = $type_question;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $reponses_possibles = null;

    public function getReponses_possibles(): ?string
    {
        return $this->reponses_possibles;
    }

    public function setReponses_possibles(?string $reponses_possibles): self
    {
        $this->reponses_possibles = $reponses_possibles;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $points = null;

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $ordre = null;

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $obligatoire = null;

    public function isObligatoire(): ?bool
    {
        return $this->obligatoire;
    }

    public function setObligatoire(?bool $obligatoire): self
    {
        $this->obligatoire = $obligatoire;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $status = null;

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    public function getCreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

}
