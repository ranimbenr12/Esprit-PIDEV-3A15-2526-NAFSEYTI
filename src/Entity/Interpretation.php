<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\InterpretationRepository;

#[ORM\Entity(repositoryClass: InterpretationRepository::class)]
#[ORM\Table(name: 'interpretations')]
class Interpretation
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

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $score_min = null;

    public function getScore_min(): ?int
    {
        return $this->score_min;
    }

    public function setScore_min(int $score_min): self
    {
        $this->score_min = $score_min;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $score_max = null;

    public function getScore_max(): ?int
    {
        return $this->score_max;
    }

    public function setScore_max(int $score_max): self
    {
        $this->score_max = $score_max;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $titre = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $conseils = null;

    public function getConseils(): ?string
    {
        return $this->conseils;
    }

    public function setConseils(?string $conseils): self
    {
        $this->conseils = $conseils;
        return $this;
    }

}
