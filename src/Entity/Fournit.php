<?php

namespace App\Entity;

use App\Repository\FournitRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: FournitRepository::class)]
class Fournit
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Fournisseur::class)]
    #[ORM\JoinColumn(name: "numéro_fournisseur", referencedColumnName: "numéro_fournisseur")]
    private ?Fournisseur $numéro_fournisseur = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'fournits')]
    private ?Article $article = null;


    public function getNuméroFournisseur(): ?Fournisseur
    {
        return $this->numéro_fournisseur;
    }

    public function setNuméroFournisseur(?Fournisseur $numéro_fournisseur): static
    {
        $this->numéro_fournisseur = $numéro_fournisseur;

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
}
