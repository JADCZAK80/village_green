<?php

namespace App\Entity;

use App\Repository\LivraisonArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonArticleRepository::class)]
class LivraisonArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'livraisonArticles')]
    private Collection $id_article;

    /**
     * @var Collection<int, Livre>
     */
    #[ORM\ManyToMany(targetEntity: Livre::class, inversedBy: 'livraisonArticles')]
    private Collection $id_livraison;

    #[ORM\Column(nullable: true)]
    private ?int $quantité_livré = null;

    public function __construct()
    {
        $this->id_article = new ArrayCollection();
        $this->id_livraison = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Livre>
     */
    public function getIdLivraison(): Collection
    {
        return $this->id_livraison;
    }

    public function addIdLivraison(Livre $idLivraison): static
    {
        if (!$this->id_livraison->contains($idLivraison)) {
            $this->id_livraison->add($idLivraison);
        }

        return $this;
    }

    public function removeIdLivraison(Livre $idLivraison): static
    {
        $this->id_livraison->removeElement($idLivraison);

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
