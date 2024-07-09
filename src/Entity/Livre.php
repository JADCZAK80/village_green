<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_livraison = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $URL_transporteur = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom_transporteur = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    private ?Commande $commande = null;

    /**
     * @var Collection<int, LivraisonArticle>
     */
    #[ORM\OneToMany(targetEntity: LivraisonArticle::class, mappedBy: 'id_livraison')]
    private Collection $livraisonArticles;

    public function __construct()
    {
        $this->livraisonArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(?\DateTimeInterface $date_livraison): static
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getURLTransporteur(): ?string
    {
        return $this->URL_transporteur;
    }

    public function setURLTransporteur(?string $URL_transporteur): static
    {
        $this->URL_transporteur = $URL_transporteur;

        return $this;
    }

    public function getNomTransporteur(): ?string
    {
        return $this->nom_transporteur;
    }

    public function setNomTransporteur(?string $nom_transporteur): static
    {
        $this->nom_transporteur = $nom_transporteur;

        return $this;
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
            $livraisonArticle->setIdLivraison($this);
        }

        return $this;
    }

    public function removeLivraisonArticle(LivraisonArticle $livraisonArticle): static
    {
        if ($this->livraisonArticles->removeElement($livraisonArticle)) {
            // set the owning side to null (unless already changed)
            if ($livraisonArticle->getIdLivraison() === $this) {
                $livraisonArticle->setIdLivraison(null);
            }
        }

        return $this;
    }
}
