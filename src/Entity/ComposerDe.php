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
    private ?Commande $id_commande = null;

    #[ORM\ManyToOne(inversedBy: 'composerDes')]
    private ?Article $id_article = null;

    #[ORM\Column]
    private ?int $nombre_article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->id_commande;
    }

    public function setIdCommande(?Commande $id_commande): static
    {
        $this->id_commande = $id_commande;

        return $this;
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
