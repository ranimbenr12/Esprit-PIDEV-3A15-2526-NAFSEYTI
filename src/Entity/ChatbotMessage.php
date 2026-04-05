<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Repository\ChatbotMessageRepository;

#[ORM\Entity(repositoryClass: ChatbotMessageRepository::class)]
#[ORM\Table(name: 'chatbot_messages')]
class ChatbotMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id_message = null;

    public function getId_message(): ?int
    {
        return $this->id_message;
    }

    public function setId_message(int $id_message): self
    {
        $this->id_message = $id_message;
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
    private ?string $message_utilisateur = null;

    public function getMessage_utilisateur(): ?string
    {
        return $this->message_utilisateur;
    }

    public function setMessage_utilisateur(string $message_utilisateur): self
    {
        $this->message_utilisateur = $message_utilisateur;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $reponse_chatbot = null;

    public function getReponse_chatbot(): ?string
    {
        return $this->reponse_chatbot;
    }

    public function setReponse_chatbot(string $reponse_chatbot): self
    {
        $this->reponse_chatbot = $reponse_chatbot;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_envoi = null;

    public function getDate_envoi(): ?\DateTimeInterface
    {
        return $this->date_envoi;
    }

    public function setDate_envoi(\DateTimeInterface $date_envoi): self
    {
        $this->date_envoi = $date_envoi;
        return $this;
    }

}
