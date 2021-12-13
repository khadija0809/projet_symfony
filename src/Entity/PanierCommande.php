<?php

namespace App\Entity;

use App\Repository\PanierCommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierCommandeRepository::class)
 */
class PanierCommande
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
    private $numero_panier;

    /**
     * @ORM\OneToOne(targetEntity=LignePanier::class, inversedBy="panierCommande", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ligne_panier;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="panier")
     */
    private $commande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroPanier(): ?int
    {
        return $this->numero_panier;
    }

    public function setNumeroPanier(int $numero_panier): self
    {
        $this->numero_panier = $numero_panier;

        return $this;
    }

    public function getLignePanier(): ?LignePanier
    {
        return $this->ligne_panier;
    }

    public function setLignePanier(LignePanier $ligne_panier): self
    {
        $this->ligne_panier = $ligne_panier;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
