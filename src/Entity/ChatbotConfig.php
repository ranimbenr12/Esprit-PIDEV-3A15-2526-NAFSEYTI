<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ChatbotConfigRepository;

#[ORM\Entity(repositoryClass: ChatbotConfigRepository::class)]
#[ORM\Table(name: 'chatbot_config')]
class ChatbotConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_config = null;

    public function getId_config(): ?int
    {
        return $this->id_config;
    }

    public function setId_config(int $id_config): self
    {
        $this->id_config = $id_config;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_psychologue = null;

    public function getId_psychologue(): ?int
    {
        return $this->id_psychologue;
    }

    public function setId_psychologue(int $id_psychologue): self
    {
        $this->id_psychologue = $id_psychologue;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $id_utilisateur = null;

    public function getId_utilisateur(): ?int
    {
        return $this->id_utilisateur;
    }

    public function setId_utilisateur(int $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $suggestion_personnalisee = null;

    public function getSuggestion_personnalisee(): ?string
    {
        return $this->suggestion_personnalisee;
    }

    public function setSuggestion_personnalisee(string $suggestion_personnalisee): self
    {
        $this->suggestion_personnalisee = $suggestion_personnalisee;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $frequence_rappel = null;

    public function getFrequence_rappel(): ?int
    {
        return $this->frequence_rappel;
    }

    public function setFrequence_rappel(int $frequence_rappel): self
    {
        $this->frequence_rappel = $frequence_rappel;
        return $this;
    }

}
