<?php
namespace App\Http\Repositories;

use App\Http\Repositories\Repository;
use App\Model\Categorie;

class CategorieRepository extends Repository implements CategorieInterface
{
    public function __construct(Categorie $categorie)
    {
        $this->model = $categorie;

    }
}
