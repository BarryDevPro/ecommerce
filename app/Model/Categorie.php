<?php

namespace App\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['libelle'];

    public $timestamps = false;


    public function produits()
    {
        return $this->hasMany('App\Model\Produit');
    }


}
