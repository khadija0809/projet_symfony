<?php

namespace App\Entity;

use App\Repository\LignePanierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LignePanierRepository::class)
 */
class LignePanier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="lignePaniers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="lignePaniers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\OneToOne(targetEntity=PanierCommande::class, mappedBy="ligne_panier", cascade={"persist", "remove"})
     */
    private $panierCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getPanierCommande(): ?PanierCommande
    {
        return $this->panierCommande;
    }

    public function setPanierCommande(PanierCommande $panierCommande): self
    {
        // set the owning side of the relation if necessary
        if ($panierCommande->getLignePanier() !== $this) {
            $panierCommande->setLignePanier($this);
        }

        $this->panierCommande = $panierCommande;

        return $this;
    }
}
