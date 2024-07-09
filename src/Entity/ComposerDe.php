<?php

namespace App\Entity;

use App\Repository\ComposerDeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposerDeRepository::class)]
class ComposerDe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'composerDes')]
    private ?Commande $commande = null;

    #[ORM\ManyToOne(inversedBy: 'composerDes')]
    private ?Article $article = null;

    #[ORM\Column]
    private ?int $nombre_article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setIdCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
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

    public function getNombreArticle(): ?int
    {
        return $this->nombre_article;
    }

    public function setNombreArticle(int $nombre_article): static
    {
        $this->nombre_article = $nombre_article;

        return $this;
    }
}
