<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\Column(length: 20)]
    private ?string $numéro_fournisseur = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 200)]
    private ?string $adresse = null;

    #[ORM\Column(length: 30)]
    private ?string $pays = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 20)]
    private ?string $téléphone = null;

    #[ORM\Column(length: 20)]
    private ?string $code_postal = null;

    /**
     * @var Collection<int, Fournit>
     */
    #[ORM\OneToMany(targetEntity: Fournit::class, mappedBy: 'numéro_fournisseur')]
    private Collection $fournits;

    public function __construct()
    {
        $this->fournits = new ArrayCollection();
    }

    public function getNuméroFournisseur(): ?string
    {
        return $this->numéro_fournisseur;
    }

    public function setNuméroFournisseur(string $numéro_fournisseur): static
    {
        $this->numéro_fournisseur = $numéro_fournisseur;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTéléphone(): ?string
    {
        return $this->téléphone;
    }

    public function setTéléphone(string $téléphone): static
    {
        $this->téléphone = $téléphone;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

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
            $fournit->setNuméroFournisseur($this);
        }

        return $this;
    }

    public function removeFournit(Fournit $fournit): static
    {
        if ($this->fournits->removeElement($fournit)) {
            // set the owning side to null (unless already changed)
            if ($fournit->getNuméroFournisseur() === $this) {
                $fournit->setNuméroFournisseur(null);
            }
        }

        return $this;
    }
}
