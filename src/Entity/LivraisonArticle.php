<?php

namespace App\Entity;

use App\Repository\LivraisonArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonArticleRepository::class)]
class LivraisonArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'livraisonArticles')]
    private ?Article $id_article = null;

    #[ORM\ManyToOne(inversedBy: 'livraisonArticles')]
    private ?Livre $id_livraison = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantité_livré = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?Article
    {
        return $this->id_article;
    }

    public function setIdArticle(?Article $id_article): static
    {
        $this->id_article = $id_article;

        return $this;
    }

    public function getIdLivraison(): ?Livre
    {
        return $this->id_livraison;
    }

    public function setIdLivraison(?Livre $id_livraison): static
    {
        $this->id_livraison = $id_livraison;

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
