<?php
namespace App\Model;

use App\Model\Produit;

class ProduitQte
{
    private $produit;
    private $quantite;

    public function __construct(Produit $produit , int $qte)
    {
        $this->produit = $produit;
        $this->quantite = $qte;
    }

    public function getProduit()
    {
        return $this->produit;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($qte)
    {
        $this->quantite = $qte;
    }

}
