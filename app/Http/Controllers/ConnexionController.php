<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ClientInterface;
use App\Http\Requests\LoginRequest;
use MercurySeries\Flashy\Flashy;

class ConnexionController extends Controller
{
    private $clientRepository;
    public function __construct(ClientInterface $clientInterface)
    {
        $this->clientRepository = $clientInterface;
    }
    public function index()
    {
        return view('front.login');
    }

    public function store(LoginRequest $loginRequest)
    { 
        $client = $this->clientRepository->connexion($loginRequest->all());
        if($client != null){
            session()->put('client' , $client);
            Flashy::message('Vous etes connecte !!!');
            return redirect()->route('home');
        }else {
            Flashy::message('Email ou mot de pass incorrect !!!');
            return redirect()->route('connexion.get');
        }
    }

    public function logout()
    {
        session()->forget('client');
        return redirect()->route('home');
    }
}
