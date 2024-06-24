<?php

namespace App\Entity;

use App\Repository\EncadreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EncadreRepository::class)]
class Encadre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'encadres')]
    private ?Personnel $matricule_personnel = null;

    #[ORM\ManyToOne(inversedBy: 'encadres')]
    private ?Utilisateur $id_utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatriculePersonnel(): ?Personnel
    {
        return $this->matricule_personnel;
    }

    public function setMatriculePersonnel(?Personnel $matricule_personnel): static
    {
        $this->matricule_personnel = $matricule_personnel;

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
