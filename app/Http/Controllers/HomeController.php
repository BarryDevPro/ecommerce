<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProduitInterface;

class HomeController extends Controller
{
    private $produitRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProduitInterface $produitInterface)
    {
        // $this->middleware('auth');
        $this->produitRepository = $produitInterface;
    }

   
    public function index()
    {
        $produits = $this->produitRepository->getPaginate(4);
        $links = $produits->render();
        return view('front.index' , compact('produits' , 'links') );
    }
}
