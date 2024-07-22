<?php

namespace App\Entity;

use App\Repository\LivraisonArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: LivraisonArticleRepository::class)]
class LivraisonArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livraisonArticles')]
    private ?Article $article = null;

    #[ORM\ManyToOne(inversedBy: 'livraisonArticles')]
    private ?Livre $livraison = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantité_livré = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?Article
    {
        return $this->article;
    }

    public function setIdArticle(?Article $article): static
    {
        $this->article = $article;

        return $this;
    }

    public function getIdLivraison(): ?Livre
    {
        return $this->livraison;
    }

    public function setIdLivraison(?Livre $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getQuantitéLivré(): ?int
    {
        return $this->quantité_livré;
    }

    public function setQuantitéLivré(?int $quantité_livré): static
    {
        $this->quantité_livré = $quantité_livré;

        return $this;
    }
}
