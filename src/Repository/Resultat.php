<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ResultatRepository;

#[ORM\Entity(repositoryClass: ResultatRepository::class)]
#[ORM\Table(name: 'resultats')]
class Resultat
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
    private ?int $user_id = null;

    public function getUser_id(): ?int
    {
        return $this->user_id;
    }

    public function setUser_id(int $user_id): self
    {
        $this->user_id = $user_id;
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
    private ?int $score_total = null;

    public function getScore_total(): ?int
    {
        return $this->score_total;
    }

    public function setScore_total(int $score_total): self
    {
        $this->score_total = $score_total;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_test = null;

    public function getDate_test(): ?\DateTimeInterface
    {
        return $this->date_test;
    }

    public function setDate_test(\DateTimeInterface $date_test): self
    {
        $this->date_test = $date_test;
        return $this;
    }

}
