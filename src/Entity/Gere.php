<?php

namespace App\Entity;

use App\Repository\GereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GereRepository::class)]
class Gere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'geres')]
    private Collection $id_aticle;

    /**
     * @var Collection<int, Personnel>
     */
    #[ORM\ManyToMany(targetEntity: Personnel::class, inversedBy: 'geres')]
    private Collection $matricule_personnel;

    public function __construct()
    {
        $this->id_aticle = new ArrayCollection();
        $this->matricule_personnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getIdAticle(): Collection
    {
        return $this->id_aticle;
    }

    public function addIdAticle(Article $idAticle): static
    {
        if (!$this->id_aticle->contains($idAticle)) {
            $this->id_aticle->add($idAticle);
        }

        return $this;
    }

    public function removeIdAticle(Article $idAticle): static
    {
        $this->id_aticle->removeElement($idAticle);

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
