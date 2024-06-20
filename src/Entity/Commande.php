<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_commande = null;

    #[ORM\Column]
    private ?float $montant_commande_HT = null;

    #[ORM\Column]
    private ?float $montant_commande_TTC = null;

    #[ORM\Column(nullable: true)]
    private ?float $TVA = null;

    #[ORM\Column]
    private ?int $id_facture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_facture = null;

    #[ORM\Column(length: 20)]
    private ?string $moyen_paiement = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse_facturation = null;

    #[ORM\Column(length: 20)]
    private ?string $etat_facturation = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse_livraison = null;

    #[ORM\Column(length: 20)]
    private ?string $etat_livraison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): static
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getMontantCommandeHT(): ?float
    {
        return $this->montant_commande_HT;
    }

    public function setMontantCommandeHT(float $montant_commande_HT): static
    {
        $this->montant_commande_HT = $montant_commande_HT;

        return $this;
    }

    public function getMontantCommandeTTC(): ?float
    {
        return $this->montant_commande_TTC;
    }

    public function setMontantCommandeTTC(float $montant_commande_TTC): static
    {
        $this->montant_commande_TTC = $montant_commande_TTC;

        return $this;
    }

    public function getTVA(): ?float
    {
        return $this->TVA;
    }

    public function setTVA(?float $TVA): static
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getIdFacture(): ?int
    {
        return $this->id_facture;
    }

    public function setIdFacture(int $id_facture): static
    {
        $this->id_facture = $id_facture;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): static
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getMoyenPaiement(): ?string
    {
        return $this->moyen_paiement;
    }

    public function setMoyenPaiement(string $moyen_paiement): static
    {
        $this->moyen_paiement = $moyen_paiement;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(string $adresse_facturation): static
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function getEtatFacturation(): ?string
    {
        return $this->etat_facturation;
    }

    public function setEtatFacturation(string $etat_facturation): static
    {
        $this->etat_facturation = $etat_facturation;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(string $adresse_livraison): static
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getEtatLivraison(): ?string
    {
        return $this->etat_livraison;
    }

    public function setEtatLivraison(string $etat_livraison): static
    {
        $this->etat_livraison = $etat_livraison;

        return $this;
    }
}
