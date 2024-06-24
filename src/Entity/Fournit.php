<?php

namespace App\Entity;

use App\Repository\FournitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournitRepository::class)]
class Fournit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fournits')]
    private ?Fournisseur $numéro_fournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'fournits')]
    private ?Article $id_article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

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
        return $this->id_article;
    }

    public function setIdArticle(?Article $id_article): static
    {
        $this->id_article = $id_article;

        return $this;
    }
}
