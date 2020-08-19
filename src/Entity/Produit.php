<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{

    Const COULEUR=[
        1=>'Blanc',
        2=>'Noir',
        3=>'Rose',
        4=>'Bleu',
        5=>'Vert',
        6=>'Jaune',
        7=>'Marron',
        8=>'Viollet',
        9=>'Rouge',
        10=>'Cyan',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var
     * @ORM\Column (type="string",length=248,unique=true,nullable=true)
     * @Gedmo\Slug (fields={"Titre","DateCreation"},updatable=false,dateFormat="d/m/y")
     */
    private $slug;

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTTC;

    /**
     * @ORM\Column(type="float")
     */
    private $Poids;

    /**
     * @ORM\Column(type="integer")
     */
    private $Couleur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateCreation;

    /**
     * @ORM\Column(type="integer")
     */
    private $StockQte;

    /**
     * @ORM\Column(type="boolean",options={"default":false})
     */
    private $Actif;

    public function __construct()
    {
        $this->Actif=false;
        $this->setDateCreation(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrixTTC(): ?float
    {
        return $this->prixTTC;
    }

    public function setPrixTTC(float $prixTTC): self
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->Poids;
    }

    public function setPoids(float $Poids): self
    {
        $this->Poids = $Poids;

        return $this;
    }

    public function getCouleur(): ?int
    {
        return $this->Couleur;
    }

    public function setCouleur(int $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getStockQte(): ?int
    {
        return $this->StockQte;
    }

    public function setStockQte(int $StockQte): self
    {
        $this->StockQte = $StockQte;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->Actif;
    }

    public function setActif(bool $Actif): self
    {
        $this->Actif = $Actif;

        return $this;
    }

    public function getCouleurType()
    {
        return self::COULEUR[$this->getCouleur()];
    }

}
