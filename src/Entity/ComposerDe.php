<?php

namespace App\Entity;

use App\Repository\ComposerDeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposerDeRepository::class)]
class ComposerDe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'composerDes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $id_commande = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'composerDes')]
    private Collection $id_article;

    #[ORM\Column]
    private ?int $nombre_article = null;

    public function __construct()
    {
        $this->id_article = new ArrayCollection();
    }

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
