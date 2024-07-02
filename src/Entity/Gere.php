<?php

namespace App\Entity;

use App\Repository\GereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GereRepository::class)]
class Gere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'geres')]
    private ?Article $article = null;

    #[ORM\ManyToOne(inversedBy: 'geres')]
    private ?Personnel $personnel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): static
    {
        $this->article = $article;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }
}
