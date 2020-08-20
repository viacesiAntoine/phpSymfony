<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte;

    /**
     * @ORM\ManyToOne(targetEntity=Magasin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $PourMagasin;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="stock")
     */
    private $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getPourMagasin(): ?Magasin
    {
        return $this->PourMagasin;
    }

    public function setPourMagasin(?Magasin $PourMagasin): self
    {
        $this->PourMagasin = $PourMagasin;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Produit $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setStock($this);
        }

        return $this;
    }

    public function removeRelation(Produit $relation): self
    {
        if ($this->relation->contains($relation)) {
            $this->relation->removeElement($relation);
            // set the owning side to null (unless already changed)
            if ($relation->getStock() === $this) {
                $relation->setStock(null);
            }
        }

        return $this;
    }
}
