<?php
namespace App\Http\Repositories;


use App\Http\Repositories\Repository;
use App\Model\DetailCommande;

class DetailCommandeRepository extends Repository implements DetailCommandeInterface
{
    public function __construct(DetailCommande $detailCommande)
    {
        $this->model = $detailCommande;
    }

    
}
