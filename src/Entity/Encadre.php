<?php

namespace App\Entity;

use App\Repository\EncadreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EncadreRepository::class)]
class Encadre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\ManyToMany(targetEntity: Utilisateur::class, inversedBy: 'encadres')]
    private Collection $id_utilisateur;

    /**
     * @var Collection<int, Personnel>
     */
    #[ORM\ManyToMany(targetEntity: Personnel::class, inversedBy: 'encadres')]
    private Collection $matricule_personnel;

    public function __construct()
    {
        $this->id_utilisateur = new ArrayCollection();
        $this->matricule_personnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->id_utilisateur;
    }

    public function addIdUtilisateur(Utilisateur $idUtilisateur): static
    {
        if (!$this->id_utilisateur->contains($idUtilisateur)) {
            $this->id_utilisateur->add($idUtilisateur);
        }

        return $this;
    }

    public function removeIdUtilisateur(Utilisateur $idUtilisateur): static
    {
        $this->id_utilisateur->removeElement($idUtilisateur);

        return $this;
    }

    /**
     * @return Collection<int, Personnel>
     */
    public function getMatriculePersonnel(): Collection
    {
        return $this->matricule_personnel;
    }

    public function addMatriculePersonnel(Personnel $matriculePersonnel): static
    {
        if (!$this->matricule_personnel->contains($matriculePersonnel)) {
            $this->matricule_personnel->add($matriculePersonnel);
        }

        return $this;
    }

    public function removeMatriculePersonnel(Personnel $matriculePersonnel): static
    {
        $this->matricule_personnel->removeElement($matriculePersonnel);

        return $this;
    }
}
