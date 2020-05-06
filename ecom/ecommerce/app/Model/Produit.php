<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable= ['categories_id','name','quantite','prixUnitaire','image'];

    public function categorie()
    {
        return $this->belongsTo('App\Model\Categorie');
    }

    public function detailCommandes()
    {
        return $this->hasMany('App\Model\DetailCommande');
    }


}
