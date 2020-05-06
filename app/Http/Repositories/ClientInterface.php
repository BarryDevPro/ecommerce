<?php 
namespace App\Http\Repositories;

interface ClientInterface extends RepositoryInterface {
    public function connexion($array);
}