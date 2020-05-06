<?php

namespace App\Http\Repositories;
use App\Http\Repositories\Repository;
use App\Model\Produit;

class ProduitRepository extends Repository implements ProduitInterface
{
        public function __construct(Produit $produit)
        {
            $this->model = $produit;
        }
}