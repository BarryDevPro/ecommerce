<?php
namespace App\Http\Repositories;

use App\Http\Repositories\CommandeInterface;
use App\Http\Repositories\Repository;
use App\Model\Commande;

class CommandeRepository extends Repository implements CommandeInterface
{
    public function __construct(Commande $commande)
    {
        $this->model = $commande;
    }



}
