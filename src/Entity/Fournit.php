<?php

namespace App\Entity;

use App\Repository\FournitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournitRepository::class)]
class Fournit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Fournisseur>
     */
    #[ORM\ManyToMany(targetEntity: Fournisseur::class, inversedBy: 'fournits')]
    private Collection $numéro_fournisseur;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'fournits')]
    private Collection $id_article;

    public function __construct()
    {
        $this->numéro_fournisseur = new ArrayCollection();
        $this->id_article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Fournisseur>
     */
    public function getNuméroFournisseur(): Collection
    {
        return $this->numéro_fournisseur;
    }

    public function addNumRoFournisseur(Fournisseur $numRoFournisseur): static
    {
        if (!$this->numéro_fournisseur->contains($numRoFournisseur)) {
            $this->numéro_fournisseur->add($numRoFournisseur);
        }

        return $this;
    }

    public function removeNumRoFournisseur(Fournisseur $numRoFournisseur): static
    {
        $this->numéro_fournisseur->removeElement($numRoFournisseur);

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getIdArticle(): Collection
    {
        return $this->id_article;
    }

    public function addIdArticle(Article $idArticle): static
    {
        if (!$this->id_article->contains($idArticle)) {
            $this->id_article->add($idArticle);
        }

        return $this;
    }

    public function removeIdArticle(Article $idArticle): static
    {
        $this->id_article->removeElement($idArticle);

        return $this;
    }
}
