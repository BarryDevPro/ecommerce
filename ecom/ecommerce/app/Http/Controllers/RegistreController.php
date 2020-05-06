<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ClientInterface;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class RegistreController extends Controller
{
    private $clientRepository;
    public function __construct(ClientInterface $clientInterface)
    {
        $this->clientRepository = $clientInterface;
    }
    public function index()
    {
        return view('front.registre');
    }

    public function store(ClientRequest $clientRequest)
    {
        $this->clientRepository->store($clientRequest->all());

        Flashy::message('Vous etes bien  enregistré ');
        return redirect()->route('connexion.get');
    }
}
