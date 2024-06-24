<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, ComposerDe>
     */
    #[ORM\ManyToMany(targetEntity: ComposerDe::class, mappedBy: 'id_article')]
    private Collection $composerDes;

    /**
     * @var Collection<int, Fournit>
     */
    #[ORM\ManyToMany(targetEntity: Fournit::class, mappedBy: 'id_article')]
    private Collection $fournits;

    /**
     * @var Collection<int, Gere>
     */
    #[ORM\ManyToMany(targetEntity: Gere::class, mappedBy: 'id_aticle')]
    private Collection $geres;

    /**
     * @var Collection<int, LivraisonArticle>
     */
    #[ORM\ManyToMany(targetEntity: LivraisonArticle::class, mappedBy: 'id_article')]
    private Collection $livraisonArticles;

    public function __construct()
    {
        $this->composerDes = new ArrayCollection();
        $this->fournits = new ArrayCollection();
        $this->geres = new ArrayCollection();
        $this->livraisonArticles = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, ComposerDe>
     */
    public function getComposerDes(): Collection
    {
        return $this->composerDes;
    }

    public function addComposerDe(ComposerDe $composerDe): static
    {
        if (!$this->composerDes->contains($composerDe)) {
            $this->composerDes->add($composerDe);
            $composerDe->addIdArticle($this);
        }

        return $this;
    }

    public function removeComposerDe(ComposerDe $composerDe): static
    {
        if ($this->composerDes->removeElement($composerDe)) {
            $composerDe->removeIdArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Fournit>
     */
    public function getFournits(): Collection
    {
        return $this->fournits;
    }

    public function addFournit(Fournit $fournit): static
    {
        if (!$this->fournits->contains($fournit)) {
            $this->fournits->add($fournit);
            $fournit->addIdArticle($this);
        }

        return $this;
    }

    public function removeFournit(Fournit $fournit): static
    {
        if ($this->fournits->removeElement($fournit)) {
            $fournit->removeIdArticle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Gere>
     */
    public function getGeres(): Collection
    {
        return $this->geres;
    }

    public function addGere(Gere $gere): static
    {
        if (!$this->geres->contains($gere)) {
            $this->geres->add($gere);
            $gere->addIdAticle($this);
        }

        return $this;
    }

    public function removeGere(Gere $gere): static
    {
        if ($this->geres->removeElement($gere)) {
            $gere->removeIdAticle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, LivraisonArticle>
     */
    public function getLivraisonArticles(): Collection
    {
        return $this->livraisonArticles;
    }

    public function addLivraisonArticle(LivraisonArticle $livraisonArticle): static
    {
        if (!$this->livraisonArticles->contains($livraisonArticle)) {
            $this->livraisonArticles->add($livraisonArticle);
            $livraisonArticle->addIdArticle($this);
        }

        return $this;
    }

    public function removeLivraisonArticle(LivraisonArticle $livraisonArticle): static
    {
        if ($this->livraisonArticles->removeElement($livraisonArticle)) {
            $livraisonArticle->removeIdArticle($this);
        }

        return $this;
    }
}
