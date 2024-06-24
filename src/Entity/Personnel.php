<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class Personnel implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 30)]
    private ?string $matricule_personnel = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $téléphone = null;

    #[ORM\Column(length: 20)]
    private ?string $service = null;

    #[ORM\Column(length: 20)]
    private ?string $code_postal = null;

    /**
     * @var Collection<int, Encadre>
     */
    #[ORM\ManyToMany(targetEntity: Encadre::class, mappedBy: 'matricule_personnel')]
    private Collection $encadres;

    /**
     * @var Collection<int, Gere>
     */
    #[ORM\ManyToMany(targetEntity: Gere::class, mappedBy: 'matricule_personnel')]
    private Collection $geres;

    public function __construct()
    {
        $this->encadres = new ArrayCollection();
        $this->geres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getMatriculePersonnel(): ?string
    {
        return $this->matricule_personnel;
    }

    public function setMatriculePersonnel(string $matricule_personnel): static
    {
        $this->matricule_personnel = $matricule_personnel;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

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

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTéléphone(): ?string
    {
        return $this->téléphone;
    }

    public function setTéléphone(?string $téléphone): static
    {
        $this->téléphone = $téléphone;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): static
    {
        $this->service = $service;

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
     * @return Collection<int, Encadre>
     */
    public function getEncadres(): Collection
    {
        return $this->encadres;
    }

    public function addEncadre(Encadre $encadre): static
    {
        if (!$this->encadres->contains($encadre)) {
            $this->encadres->add($encadre);
            $encadre->addMatriculePersonnel($this);
        }

        return $this;
    }

    public function removeEncadre(Encadre $encadre): static
    {
        if ($this->encadres->removeElement($encadre)) {
            $encadre->removeMatriculePersonnel($this);
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
            $gere->addMatriculePersonnel($this);
        }

        return $this;
    }

    public function removeGere(Gere $gere): static
    {
        if ($this->geres->removeElement($gere)) {
            $gere->removeMatriculePersonnel($this);
        }

        return $this;
    }
}
