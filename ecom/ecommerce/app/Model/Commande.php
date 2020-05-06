<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable= ['clients_id','dateCommande','montant','dateLivraison','statut'];



    public function client()
    {
        return $this->belongsTo('App\Model\Commande');
    }

    public function detailCommandes()
    {
        return $this->hasMany('App\Model\DetailCommande');
    }
}
