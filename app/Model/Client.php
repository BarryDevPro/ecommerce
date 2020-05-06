<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Client extends Model
{
    protected $fillable= ['nom','prenom','email','telephone','adresse','password'];


    public function commandes()
    {
        return $this->hasMany('App\Model\Commande');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
