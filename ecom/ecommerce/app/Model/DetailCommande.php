<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    protected $fillable= ['produits_id','commandes_id','prixTotal','quantite'];
}
