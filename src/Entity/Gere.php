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
    private ?Personnel $id_personnel = null;

    #[ORM\ManyToOne(inversedBy: 'geres')]
    private ?Utilisateur $id_utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPersonnel(): ?Personnel
    {
        return $this->id_personnel;
    }

    public function setIdPersonnel(?Personnel $id_personnel): static
    {
        $this->id_personnel = $id_personnel;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }
}
