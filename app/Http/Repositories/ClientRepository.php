<?php

namespace App\Http\Repositories;
use App\Http\Repositories\Repository;
use App\Model\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientRepository extends Repository implements ClientInterface{
    public function __construct(Client $client)
    {
        $this->model = $client;
    }

    public function connexion($array)
    {
        $client = DB::table('clients')->where('email',$array['email'])->get();
        if (count($client) > 0) {
            $client = $client[0];
            if(Hash::check($array['password'], $client->password)){
                return $client;
            }else {
                return null;
            }
        }else {
            return null;
        }
        
    }
}