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
}
