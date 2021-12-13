<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_produit;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description_produit;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_unite;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $composants;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_2;

    /**
     * @ORM\Column(type="datetime")
     */
    private $delai;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qte_minimum;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte_maximum;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=LignePanier::class, mappedBy="produit", orphanRemoval=true)
     */
    private $lignePaniers;

    public function __construct()
    {
        $this->lignePaniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nom_produit;
    }

    public function setNomProduit(string $nom_produit): self
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->description_produit;
    }

    public function setDescriptionProduit(string $description_produit): self
    {
        $this->description_produit = $description_produit;

        return $this;
    }

    public function getPrixUnite(): ?float
    {
        return $this->prix_unite;
    }

    public function setPrixUnite(float $prix_unite): self
    {
        $this->prix_unite = $prix_unite;

        return $this;
    }

    public function getComposants(): ?string
    {
        return $this->composants;
    }

    public function setComposants(string $composants): self
    {
        $this->composants = $composants;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image_1;
    }

    public function setImage1(string $image_1): self
    {
        $this->image_1 = $image_1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image_2;
    }

    public function setImage2(?string $image_2): self
    {
        $this->image_2 = $image_2;

        return $this;
    }

    public function getDelai(): ?\DateTimeInterface
    {
        return $this->delai;
    }

    public function setDelai(\DateTimeInterface $delai): self
    {
        $this->delai = $delai;

        return $this;
    }

    public function getQteMinimum(): ?int
    {
        return $this->qte_minimum;
    }

    public function setQteMinimum(?int $qte_minimum): self
    {
        $this->qte_minimum = $qte_minimum;

        return $this;
    }

    public function getQteMaximum(): ?int
    {
        return $this->qte_maximum;
    }

    public function setQteMaximum(int $qte_maximum): self
    {
        $this->qte_maximum = $qte_maximum;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|LignePanier[]
     */
    public function getLignePaniers(): Collection
    {
        return $this->lignePaniers;
    }

    public function addLignePanier(LignePanier $lignePanier): self
    {
        if (!$this->lignePaniers->contains($lignePanier)) {
            $this->lignePaniers[] = $lignePanier;
            $lignePanier->setProduit($this);
        }

        return $this;
    }

    public function removeLignePanier(LignePanier $lignePanier): self
    {
        if ($this->lignePaniers->removeElement($lignePanier)) {
            // set the owning side to null (unless already changed)
            if ($lignePanier->getProduit() === $this) {
                $lignePanier->setProduit(null);
            }
        }

        return $this;
    }
}
