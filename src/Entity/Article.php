<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $libelle_court = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?float $prix_HT = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?SousRubrique $id_sous_rubrique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCourt(): ?string
    {
        return $this->libelle_court;
    }

    public function setLibelleCourt(string $libelle_court): static
    {
        $this->libelle_court = $libelle_court;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getPrixHT(): ?float
    {
        return $this->prix_HT;
    }

    public function setPrixHT(float $prix_HT): static
    {
        $this->prix_HT = $prix_HT;

        return $this;
    }

    public function getIdSousRubrique(): ?SousRubrique
    {
        return $this->id_sous_rubrique;
    }

    public function setIdSousRubrique(?SousRubrique $id_sous_rubrique): static
    {
        $this->id_sous_rubrique = $id_sous_rubrique;

        return $this;
    }
}
