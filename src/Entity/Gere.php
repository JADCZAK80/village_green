<?php

namespace App\Entity;

use App\Repository\GereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GereRepository::class)]
class Gere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'geres')]
    private ?Personnel $personnel = null;

    #[ORM\ManyToOne(inversedBy: 'geres')]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setIdPersonnel(?Personnel $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
