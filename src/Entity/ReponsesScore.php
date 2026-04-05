<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ReponsesScoreRepository;

#[ORM\Entity(repositoryClass: ReponsesScoreRepository::class)]
#[ORM\Table(name: 'reponses_scores')]
class ReponsesScore
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
    private ?int $question_id = null;

    public function getQuestion_id(): ?int
    {
        return $this->question_id;
    }

    public function setQuestion_id(int $question_id): self
    {
        $this->question_id = $question_id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $lettre_reponse = null;

    public function getLettre_reponse(): ?string
    {
        return $this->lettre_reponse;
    }

    public function setLettre_reponse(string $lettre_reponse): self
    {
        $this->lettre_reponse = $lettre_reponse;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $points = null;

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;
        return $this;
    }

}
